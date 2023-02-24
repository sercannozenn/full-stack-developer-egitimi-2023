<?php
namespace app\Core;
class Route
{
    private static array $routes = [];

    private static bool $isRoute = false;

    private static string $defaultWhere = "([0-9a-zA-Z]+)";

    private static string $prefix = '';

    private static function getUri(): string
    {
        return $_SERVER["REQUEST_URI"];
    }

    private static function getMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    private static function checkMethod(): void
    {
        $uri = self::getUri();
        $method = self::getMethod();
        $routes = self::$routes;

        $check  = array_key_exists($method, $routes);

        $supportedMethods = array_filter($routes, function($item) use ($uri){

            return array_key_exists($uri, $item);
        });

        if (!$check)
        {
            $supportedMethods = strtoupper(implode(" | ", array_keys($supportedMethods)));

            echo json_encode([
                "message" => "Method desteklenmiyor. Desteklenen methodlar: $supportedMethods"
            ]);
            exit();
        }

    }

    public static function get(string $url,\Closure|string $action): Route
    {
        self::$routes["get"][self::$prefix . $url] = ["action" => $action];

        return new self();
    }

    public static function put(string $url,\Closure|string $action): Route
    {
        self::$routes["put"][self::$prefix .$url] = ["action" => $action];

        return new self();
    }

    public static function post(string $url,\Closure|string $action): Route
    {
        self::$routes["post"][self::$prefix . $url] = ["action" => $action];

        return new self();
    }

    public static function where(array | string $where = null): Route
    {
        $method = self::getMethod();
        $routes = self::$routes[$method];
        $lastRoute = array_key_last($routes);

        self::$routes[$method][$lastRoute]['where']['*'] = self::$defaultWhere;

        if (!empty($where))
        {
            self::$routes[$method][$lastRoute]['where']['custom'] = $where;
        }

        return new self();
    }

    public static function name(string $routeName): Route
    {
        $method = self::getMethod();
        $routes = self::$routes["get"];
//        dd($method);
        $lastRoute = array_key_last($routes);

        self::$routes["get"][$lastRoute]['name'] = $routeName;

        return new self();
    }

    public static function prefix(string $prefix):Route
    {
        self::$prefix = $prefix;

        return new self();
    }

    public static function group(\Closure $closure): void
    {
        $closure();
        self::$prefix = '';
    }

    private static function assetInclude(array $explodeExtension,int $extensionIndex, string $filePath): void
    {
        $contentType = $explodeExtension[$extensionIndex] == "css" ? "text/css" : "application/javascript";
        header("Content-type: $contentType");
        include $filePath;
        exit();
    }
    public static function checkRoute()
    {
        if (!self::$isRoute)
        {
            $filePath  = dirname($_SERVER['DOCUMENT_ROOT']) . self::getUri();
            $explodeFile = explode("/", self::getUri());
            if (count($explodeFile) > 1 && $explodeFile[1] == "public" && file_exists($filePath))
            {
                $explodeExtension = explode(".", self::getUri());
                $countExtension = count($explodeExtension);
                if ($countExtension > 1 && $countExtension < 5)
                {
                    if ($countExtension < 3 && ($explodeExtension[1] == "css" || $explodeExtension[1] == "js"))
                    {
                        self::assetInclude($explodeExtension,1, $filePath);
                        exit();
                    }else if ($countExtension > 2 && ($explodeExtension[2] == "css" || $explodeExtension[2] == "js"))
                    {
                        self::assetInclude($explodeExtension,2, $filePath);
                        exit();
                    }else if ($countExtension > 3 && ($explodeExtension[3] == "css" || $explodeExtension[3] == "js"))
                    {
                        self::assetInclude($explodeExtension,3, $filePath);
                        exit();
                    }
                }
            }
            viewError(404, ['message' => "Aradığınız içerik bulunmuyor."]);
        }
    }

    public static function checkActionIsCallable(\Closure | string $action,array $parameters = []): void
    {
        if (is_callable($action))
        {
            call_user_func_array($action, $parameters);
            exit();
        }
    }

    public static function checkController(\Closure | string $action,array $parameters = []): void
    {
        $explodeController = explode("@", $action);
        $controllerClass = $explodeController[0];
        $controllerMethod = $explodeController[1];

        $controllerFile = dirname($_SERVER['DOCUMENT_ROOT']). "/app/Controllers/". $controllerClass . ".php";
        if (file_exists($controllerFile))
        {
            require_once $controllerFile;
            call_user_func_array([new ("app\Controllers\\" . $controllerClass), $controllerMethod], $parameters);
            exit();
        }
    }

    public static function urlParameterReplace(string $url): string
    {
        $method = self::getMethod();
        $routes = self::$routes;
        $where = $routes[$method][$url]['where'] ?? ['*' => self::$defaultWhere];

        preg_match_all("@\{.*?}@", $url, $parameters);

        if (count($parameters))
        {
            if (isset($where['custom']))
            {
                foreach ($where['custom'] as $key => $value)
                {
                    $url = str_replace("{" . $key . "}", $value,$url);
                }
            }

            foreach ($parameters as $key => $value)
            {
                $url = str_replace($value, $where["*"], $url);
            }
        }
        return $url;
    }
    public static function dispatch(): void
    {
        $uri = self::getUri();
        $method = self::getMethod();
        $routes = self::$routes;

        self::checkMethod();
        foreach ($routes[$method] as $url => $item)
        {
            $url = self::urlParameterReplace($url);
            $pattern = "@^" . $url . "$@";
            if (preg_match($pattern, $uri, $parameters))
            {
                array_shift($parameters);
                self::$isRoute = true;
                $action = $item['action'];
                self::checkActionIsCallable($action, $parameters);
                self::checkController($action, $parameters);
            }
        }
        self::checkRoute();
    }

    public static function goRouteName(string $routeName, array $parameters = [])
    {
        $method = self::getMethod();
        $routes = self::$routes;
//        dd($routeName);
//        dd($routes);

        $url = array_filter($routes["get"], function($route) use ($routeName)
        {
            return isset($route['name']) && $route['name'] == $routeName;
        });


        $url = array_key_last($url);
        $url = str_replace(array_keys($parameters), array_values($parameters), $url);
        header("Location:$url");
    }
}
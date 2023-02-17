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

//        if (!$check || !in_array($method, array_keys($supportedMethods)))
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
//        dd(self::$routes);
    }

    public static function put(string $url,\Closure|string $action): Route
    {
        self::$routes["put"][self::$prefix .$url] = ["action" => $action];

        return new self();
//        dd(self::$routes);
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
        $routes = self::$routes[$method];
        $lastRoute = array_key_last($routes);

        self::$routes[$method][$lastRoute]['name'] = $routeName;

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

    public static function checkRoute(): void
    {
        if (!self::$isRoute)
        {
            viewError(404, [
                'message' => "Aradığınız içerik"
            ]);
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
//                dd($where['custom']);
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
//                unset($parameters[0]);
//                $parameters = array_values($parameters);
                array_shift($parameters);
//                dd($parameters);
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

        $url = array_filter($routes[$method], function($route) use ($routeName)
        {
            return isset($route['name']) && $route['name'] == $routeName;
        });

//        dd([$url, $parameters]);
        $url = array_key_last($url);
//        dd([$parameters, $url]);
        $url = str_replace(array_keys($parameters), array_values($parameters), $url);
//        dd($url);
        header("Location:$url");
//        dd($url);
    }
}
<?php

if (!function_exists("dd"))
{
    function dd(mixed $data): void
    {
        print_r($data);
        die();
    }
}

if (!function_exists("viewError"))
{
    function viewError(string $phpFileName, array $data= [])
    {
        $filePath = dirname($_SERVER['DOCUMENT_ROOT']) . "/resources/views/errors/". $phpFileName . ".php";

        if (file_exists($filePath))
        {
            extract($data);
            return require_once $filePath;
        }
        extract($data);
        return require_once dirname($_SERVER['DOCUMENT_ROOT']) . "/resources/views/errors/404.php";
    }
}

if (!function_exists("view"))
{
    function view(string $phpFileName, array $data= [])
    {
        $filePath = dirname($_SERVER['DOCUMENT_ROOT']) . "/resources/views/". $phpFileName . ".php";

        if (file_exists($filePath))
        {
            extract($data);
            return require_once $filePath;
        }
        extract($data);
        return require_once dirname($_SERVER['DOCUMENT_ROOT']) . "/resources/views/errors/404.php";
    }
}

if (!function_exists("route"))
{
    function route(string $routeName, array $parameters = []): void
    {
        \app\Core\Route::goRouteName($routeName, $parameters);
    }
}

if (!function_exists("request"))
{
    function request(): array
    {
        return $_REQUEST;
    }
}
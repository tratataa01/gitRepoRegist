<?php

namespace libs;

class Bootstrap  {
    public function __construct()
    {
        $url = $_SERVER["REQUEST_URI"];

        $router = [
            '/' => [
                "ClassName" => "controllers\\Index",
                "MethodName" => "Start",
                "namespace" => 'controllers/Index.php'
            ],
            '/registration' => [
                "ClassName" => "controllers\\Registration",
                "MethodName" => "showRegForm",
                "namespace" => 'controllers/Registration.php'
            ],
            '/register_user' => [
                "ClassName" => "controllers\\Registration",
                "MethodName" => "createUsers",
                "namespace" => 'controllers/Registration.php'
            ],
            '/loginForm' => [
                "ClassName" => "controllers\\login",
                "MethodName" => "loginUserForm",
                "namespace" => 'controllers/Login.php'
            ],
            '/loginUserForm' => [
                "ClassName" => "controllers\\login",
                "MethodName" => "loginDb",
                "namespace" => 'controllers/Login.php'
            ],
        ];

        if (isset($router[$url])){
            $controller = new $router[$url]["ClassName"];
            $controller->{$router[$url]["MethodName"]}();
        }else {
             header("HTTP/1.0 404 Not Found");
             exit;
        }
    }
}
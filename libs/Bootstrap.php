<?php

namespace libs;

class Bootstrap  {

    public function __construct()
    {
        $url = $_SERVER["REQUEST_URI"];
        $url = strtok($url, '?');
        $router = [
            '/' => [
                "ClassName" => "controllers\\StartPage",
                "MethodName" => "Start",
            ],
            '/AddNewComent' => [
                "ClassName" => "controllers\\StartPage",
                "MethodName" => "AddUserComent",
            ],
            '/registration' => [
                "ClassName" => "controllers\\Registration",
                "MethodName" => "showRegForm",
            ],
            '/register_user' => [
                "ClassName" => "controllers\\Registration",
                "MethodName" => "createUsers",
            ],
            '/loginForm' => [
                "ClassName" => "controllers\\login",
                "MethodName" => "loginUserForm",
            ],
            '/loginUserForm' => [
                "ClassName" => "controllers\\login",
                "MethodName" => "loginDb",
            ],
            '/loginOut' => [
                "ClassName" => "controllers\\login",
                "MethodName" => "loginOut",
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
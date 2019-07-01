<?php
class Bootstrap  {
    public function __construct()
    {
        $url = $_SERVER["REQUEST_URI"];

        $router = [
            '/' => [
                "ClassName" => "Index",
                "MethodName" => "Start",
                "namespace" => 'controllers/index.php'
            ],

            "/help" => [
                "ClassName" => "Help",
                "MethodName" => "test",
                "namespace" => 'controllers/help.php'
            ],
            '/help/qweqweqwe' => [
                "ClassName" => "Help",
                "MethodName" => "qwe",
                "namespace" => 'controllers/help.php'
            ],
            '/registration' => [
                "ClassName" => "Registration",
                "MethodName" => "showRegForm",
                "namespace" => 'controllers/Registration.php'
            ],
            '/register_user' => [
                "ClassName" => "Registration",
                "MethodName" => "createUsers",
                "namespace" => 'controllers/Registration.php'
            ],
            '/loginForm' => [
                "ClassName" => "login",
                "MethodName" => "loginUserForm",
                "namespace" => 'controllers/Login.php'
            ],
            '/loginUserForm' => [
                "ClassName" => "login",
                "MethodName" => "loginDb",
                "namespace" => 'controllers/Login.php'
            ],
        ];

        if (isset($router[$url])){
            $file = $router[$url]["namespace"];
            if(file_exists($file)) {
                require $file;
            } else {
                require 'controllers/Error.php';
                $controller = new Error();
                return false;
            }
            $controller = new $router[$url]["ClassName"];
            $controller->{$router[$url]["MethodName"]}();

        }else {
            header("HTTP/1.0 404 Not Found");
            exit;
        }

    }
}
?>
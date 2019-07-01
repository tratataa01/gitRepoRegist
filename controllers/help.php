<?php

class Help extends Controller
{
    public function __construct()
    {
        parent::__construct();
        echo "Мы в контроллере HELP";
    }

    public  function test(){
        echo "qwertyui qwertyu";
    }
    public function qwe(){
        echo "test";
    }
}


//class Help
//{
//    public function __construct()
//    {
//        echo "Мы в контроллере HELP";
//    }
//
//    public function other($arg = false)
//    {
//        echo "Мы в методе other контроллера Help";
//        echo "Параметры: " . $arg;
//    }
//}

<?php

require_once ('view.php'); //TODO use

class Controller
{
    public $view;
    public function __construct()
    {
        $this->view = new View();

    }
}

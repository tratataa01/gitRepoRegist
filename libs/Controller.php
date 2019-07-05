<?php

namespace libs;
session_start();

    class Controller
{
        public $view;
            public function __construct()
    {
        $this->view = new View();
    }
}

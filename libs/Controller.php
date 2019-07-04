<?php

namespace libs;
use libs\View;
session_start();
    class Controller
{
        public $view;
            public function __construct()
    {
        $this->view = new View();
    }
}

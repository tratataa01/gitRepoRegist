<?php
namespace controllers;
use libs\Controller;

class Index extends Controller {

    public  function Start()
    {
        $this->view->generate('StartPage.php','TemplateView.php');
    }
}
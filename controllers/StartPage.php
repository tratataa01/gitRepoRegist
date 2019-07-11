<?php

namespace controllers;
use libs\Controller;
use models\UserComentModel;

class StartPage extends Controller {

        public $UserComentModel;

        public function __construct()
        {
            parent::__construct();

            $this->UserComentModel = new UserComentModel ();
        }
        public  function Start()
        {
            $this->UserComentModel->viewComents();
            $this->view->generate('StartPage.php','TemplateView.php');
        }
        public function AddUserComent()
        {
            $headerLinkComent = header("Refresh:0 ; /");
            $this->UserComentModel->addComent($headerLinkComent);
        }
}
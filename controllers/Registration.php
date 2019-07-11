<?php

namespace controllers;
use models\registrationModel;
use libs\Controller;

class Registration extends Controller {

        public $registrationModel;

        public function __construct()
    {
        parent::__construct();
            $this->registrationModel = new registrationModel ();
    }
        public function showRegForm(){
            $this->view->generate('RegisterForm.php','TemplateView.php');
    }
        public function createUsers(){
            $headerLinkrRegist = header("Refresh:0 ; /registration");
            $this->registrationModel->addUserPublic($headerLinkrRegist);
    }
}
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

            $userData = ['login'=> $_POST['login'], 'pass'=>$_POST['pass'],'email'=>$_POST['email'],'city'=>$_POST['city']];
            $notif = $this->registrationModel->addUserPublic($userData);
            $_SESSION["done"] = $notif['success'];
            $_SESSION["err"] = $notif['err'];
            header("Refresh:0 ; /registration");
    }
}
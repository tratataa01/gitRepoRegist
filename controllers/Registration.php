<?php

namespace controllers;
use models\registrationModel;
use libs\Controller;
use PDO;

class Registration extends Controller {

        public $registrationModel;

        public function __construct() {

        parent::__construct();
            $this->registrationModel = new registrationModel ();
        }

        public function showRegForm(){
            $this->view->generate('RegisterForm.php','TemplateView.php');
        }
        public function createUsers(){
            $postMass = ['login'=> $_POST['login'], 'pass'=>$_POST['pass'],'email'=>$_POST['email'],'city'=>$_POST['city']];
            $conn = new PDO('mysql:host=localhost;dbname=registration', 'root', '');
            $headerLinkrRegist = header("Refresh:0 ; /registration");
            $this->registrationModel->addUserPublic($postMass,$conn,$headerLinkrRegist);
        }
}
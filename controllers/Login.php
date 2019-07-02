<?php

require_once ("models/loginModel.php");

class Login extends Controller {
     public $loginModel;
     public function __construct() {

        parent::__construct();
        $this->loginModel = new loginModel ();
    }
     public function loginUserForm(){

        $this->view->generate('loginForm.php','template_view.php');
    }
     public function loginDb(){

        $postMassLog = ['login'=> $_POST['login'], 'pass'=>$_POST['pass']];
        $conn = new PDO ('mysql:host=localhost;dbname=registration', 'root', '');
        $headerLinkLogin = header("Refresh:0 ; /loginForm");
        $this->loginModel->loginUserModel($postMassLog,$conn,$headerLinkLogin);
    }
}
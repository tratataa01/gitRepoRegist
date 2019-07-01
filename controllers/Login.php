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
        $this->loginModel->loginUserModel($postMassLog);
    }
}
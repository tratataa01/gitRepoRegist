<?php

namespace controllers;
use models\loginModel;
use libs\Controller;

class Login extends Controller {

         public $loginModel;

         public function __construct()
         {
            parent::__construct();
            $this->loginModel = new loginModel ();
         }
         public function loginUserForm()
         {
            $this->view->generate('LoginForm.php','TemplateView.php');
         }
         public function loginDb()
         {
             $headerLinkLogin = header("Refresh:0 ; /loginForm");
            $this->loginModel->loginUserModel($headerLinkLogin);
         }
        public function loginOut()
        {
            unset($_SESSION['UserID']);
            header("Refresh:0 ; /");
        }
}
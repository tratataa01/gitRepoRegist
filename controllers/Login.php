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
             $postMassLog = ['login'=> $_POST['login'], 'pass'=>$_POST['pass']];
             $notif = $this->loginModel->loginUserModel($postMassLog);
             $_SESSION["doneLog"] = $notif['success'];
             $_SESSION["errLog"] = $notif['err'];
             $_SESSION["UserID"] = $notif['UserID'];
             header("Refresh:0 ; /loginForm");
         }
        public function loginOut()
        {
            unset($_SESSION['UserID']);
            header("Refresh:0 ; /");
        }
}
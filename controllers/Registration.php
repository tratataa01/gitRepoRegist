<?php

require_once ("models/registrationModel.php");


class Registration extends Controller {
    public $registrationModel;
    public function __construct() {
        parent::__construct();
    $this->registrationModel = new registrationModel ();

    }
    public function showRegForm(){


        $this->view->generate('registerForm.php','template_view.php');
    }
    public function createUsers(){
        $postMass = ['login'=> $_POST['login'], 'pass'=>$_POST['pass'],'email'=>$_POST['email'],'city'=>$_POST['city']];
$this->registrationModel->addUserPublic($postMass);

    }
public function regDone(){

}
}
?>
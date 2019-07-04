<?php
namespace controllers;
use libs\Controller;
use models\UserComentModel;
use PDO;

class Index extends Controller {
    public $UserComentModel;

    public function __construct()
    {
        parent::__construct();

        $this->UserComentModel = new UserComentModel ();
    }
    public  function Start()
    {
        $this->view->generate('StartPage.php','TemplateView.php');
    }
    public function AddUserComent()
    {
        $example =  date("Y.m.d");
        $postComentLog = ['user_id'=> $_SESSION["UserID"], 'coment'=>$_POST['coment'],'data_time'=>$example];
        $com = new PDO ('mysql:host=localhost;dbname=registration', 'root', '');
        //$headerLinkComent = header("Refresh:0 ; /loginForm");
        $this->UserComentModel->addComent($postComentLog,$com,$headerLinkComent);
    }
}
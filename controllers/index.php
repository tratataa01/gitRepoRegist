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
            $com = new PDO ('mysql:host=localhost;dbname=registration', 'root', '');
            $sql = "SELECT * FROM user_coments LEFT JOIN registeruserdb ON user_id = registeruserdb.id";
            $query = $com->prepare($sql);
            $query->execute();
            $resultDB = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->view->generate('StartPage.php','TemplateView.php');
            $_SESSION["ComentDb"]= $resultDB;

        }
        public function AddUserComent()
        {
            $example =  date("Y.m.d");
            $postComentLog = ['user_id'=> $_SESSION["UserID"], 'coment'=>$_POST['coment'],'data_time'=>$example];
            $com = new PDO ('mysql:host=localhost;dbname=registration', 'root', '');
            $headerLinkComent = header("Refresh:0 ; /");
            $this->UserComentModel->addComent($postComentLog,$com,$headerLinkComent);
        }
}
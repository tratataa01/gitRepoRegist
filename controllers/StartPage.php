<?php

namespace controllers;
use libs\Controller;
use models\UserComentModel;

class StartPage extends Controller {

        public $UserComentModel;

        public function __construct()
        {
            parent::__construct();

            $this->UserComentModel = new UserComentModel ();
        }
        public  function Start()
        {
            $count = 6 ;
            $page = $_GET["page"];
            $shift = $count * ($page - 1);
            $comentDb = $this->UserComentModel->viewComents($shift,$count);
            $comentData= $comentDb;


            $this->view->generate('StartPage.php','TemplateView.php',$comentData);
        }
        public function AddUserComent()
        {
            $example =  date("Y.m.d");
            $postComentLog = ['user_id'=> $_SESSION["UserID"],'coment'=>$_POST['coment'],'data_time'=>$example,'coment_id'=>$_POST['comentid']];
            header("Refresh:0 ; /");
            $this->UserComentModel->addComent($postComentLog,$example);
        }
}
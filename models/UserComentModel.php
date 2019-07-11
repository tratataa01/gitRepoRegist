<?php

namespace models;
use PDO;

class UserComentModel {

    public function __construct()
    {
        $this->addUserPublic = new DataBase(DB_HOST,DB_NAME,DB_USER,DB_PASS);
    }

    public function viewComents()
    {
        $sql = "SELECT login,user_coments.* FROM user_coments LEFT JOIN registeruserdb ON user_id = registeruserdb.id ORDER BY id";
        $query = $this->addUserPublic->pdo->prepare($sql);
        $query->execute();
        $resultDB = $query->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["ComentDb"]= $resultDB;
    }
    public function addComent($headerLinkLogin)
    {
        $example =  date("Y.m.d");
        $postComentLog = ['user_id'=> $_SESSION["UserID"], 'coment'=>$_POST['coment'],'data_time'=>$example,'coment_id'=>$_POST['comentid']];
        $prepare_to_db = $this->addUserPublic->pdo->prepare('insert into user_coments (user_id, coment, data_time,coment_id) VALUES (:user_id,:coment,:data_time,:coment_id)');
        $var = $prepare_to_db->execute([
            ':user_id' => $postComentLog['user_id'],
            ':coment' => $postComentLog['coment'],
            ':data_time' => $postComentLog['data_time'],
            ':coment_id' =>$postComentLog['coment_id']
        ]);
        $headerLinkLogin;
    }
}

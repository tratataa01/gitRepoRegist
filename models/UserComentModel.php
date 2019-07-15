<?php

namespace models;
use PDO;

class UserComentModel {

    public function __construct()
    {
        $this->addUserPublic = new DataBase(DB_HOST,DB_NAME,DB_USER,DB_PASS);
    }

    public function viewComents($shift,$count)
    {


        $sql = "SELECT login,user_coments.*FROM user_coments LEFT JOIN registeruserdb ON user_id = registeruserdb.id ORDER BY data_time DESC LIMIT $shift, $count";
        $query = $this->addUserPublic->pdo->prepare($sql);
        $query->execute();
        $resultDB = $query->fetchAll(PDO::FETCH_ASSOC);
            return $resultDB;
    }
    public function addComent($postComentLog)
    {
        $prepare_to_db = $this->addUserPublic->pdo->prepare('insert into user_coments (user_id, coment,
        data_time,coment_id) VALUES (:user_id,:coment,:data_time,:coment_id)');
        $var = $prepare_to_db->execute([
            ':user_id' => $postComentLog['user_id'],
            ':coment' => $postComentLog['coment'],
            ':data_time' => $postComentLog['data_time'],
            ':coment_id' =>$postComentLog['coment_id']
        ]);

    }
}

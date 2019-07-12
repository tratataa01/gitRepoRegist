<?php

namespace models;
use PDO;

class loginModel {

    public function __construct()
    {
        $this->loginUserModel= new DataBase(DB_HOST,DB_NAME,DB_USER,DB_PASS);
    }
    public function loginUserModel($postMassLog)
    {
            $sql = "SELECT id, login, pass FROM registeruserdb WHERE login=:login";
            $query = $this->loginUserModel->pdo->prepare($sql);
            $query->execute([
                ':login' => $postMassLog['login']
            ]);
            $resultDB = $query->fetch(PDO::FETCH_ASSOC);

        if (password_verify($postMassLog['pass'], $resultDB['pass'])) {
            return ['success'=>"Login successful" , 'UserID'=>$resultDB['id']];
        } else {
            return ['err'=>"Authorisation Error"];
        }
    }
}



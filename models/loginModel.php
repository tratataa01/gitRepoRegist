<?php

namespace models;

use PDO;



class loginModel {

    public function __construct()
    {
        $this->loginUserModel= new DataBase(DB_HOST,DB_NAME,DB_USER,DB_PASS);
    }

    public function loginUserModel()
    {
            $postMassLog = ['login'=> $_POST['login'], 'pass'=>$_POST['pass']];
            $sql = "SELECT id, login, pass FROM registeruserdb WHERE login=:login";
            $query = $this->loginUserModel->pdo->prepare($sql);
            $query->execute([
                ':login' => $postMassLog['login']
            ]);
            $_SESSION["LoginUser"] = $postMassLog['login'];
            $resultDB = $query->fetch(PDO::FETCH_ASSOC);

        if (password_verify($postMassLog['pass'], $resultDB['pass'])) {
            $_SESSION["UserID"] = $resultDB['id'];
            $_SESSION["doneLog"] = "Login successful";
            header("Refresh:0 ; /loginForm");

        } else {
            $_SESSION["errLog"] = "Authorisation Error";
            header("Refresh:0 ; /loginForm");
        }
    }
}



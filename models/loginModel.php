<?php

namespace models;
use PDO;

session_start();

class loginModel
{
    public function loginUserModel($postMassLog,$conn,$headerLinkLogin)
    {
            $sql = "SELECT id, login, pass FROM registeruserdb WHERE login=:login";
            $query = $conn->prepare($sql);
            $query->execute([
                ':login' => $postMassLog['login']
            ]);
            $resultDB = $query->fetch(PDO::FETCH_ASSOC);

        if (password_verify($postMassLog['pass'], $resultDB['pass'])) {
            $_SESSION["UserID"] = $resultDB['id'];
            $_SESSION["doneLog"] = "Login successful";
                $headerLinkLogin;

        } else {
            $_SESSION["errLog"] = "Authorisation Error";
                 $headerLinkLogin;
        }
    }
}



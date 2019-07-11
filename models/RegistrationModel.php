<?php
namespace models;
use libs\Controller;
use PDO;

class registrationModel {

    public function __construct()
    {
        $this->addUserPublic = new DataBase(DB_HOST,DB_NAME,DB_USER,DB_PASS);
    }

    public function addUserPublic($headerLinkrRegist)
    {
        $userData = ['login'=> $_POST['login'], 'pass'=>$_POST['pass'],'email'=>$_POST['email'],'city'=>$_POST['city']];
        if (filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {

            $sql = "SELECT login,email FROM registeruserdb WHERE login=:login OR email=:email";
            $query = $this->addUserPublic->pdo->prepare($sql);
            $query->execute([
                ':login' => $userData['login'],
                ':email' => $userData['email']
            ]);
            $resultDB = $query->fetch(PDO::FETCH_ASSOC);

            if (empty($resultDB)) {
                $hash = password_hash($userData['pass'], PASSWORD_DEFAULT);
                $prepare_to_db = $this->addUserPublic->pdo->prepare('insert into registeruserdb (login, pass, email, city) VALUES (:login,:pass,:email,:city)');
                $var = $prepare_to_db->execute([
                    ':login' => $userData['login'],
                    ':pass' => $hash,
                    ':email' => $userData['email'],
                    ':city' => $userData['city']
                ]);

                if (is_bool($var) === true) {
                    $_SESSION["done"] = "Registration successful";
                } else {
                    $_SESSION["err"] = "Registration error";
                }
                $headerLinkrRegist;
            } else {
                $_SESSION["err"] = "Registration error. This login or email already exists";
                $headerLinkrRegist;
            }
        } else {
            $_SESSION["err"] = "Login or E-mail address is incorrect";
            $headerLinkrRegist;
        }
    }
}




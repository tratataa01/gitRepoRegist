<?php
session_start();

class loginModel
{
    public function loginUserModel($postMassLog)
    {


        $conn = new PDO ('mysql:host=localhost;dbname=registration', 'root', '');

            $sql = "SELECT id, login, pass FROM registeruserdb WHERE login=:login";
            $query = $conn->prepare($sql);
            $query->execute([
                ':login' => $postMassLog['login']
            ]);
            $resultDB = $query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($postMassLog['pass'], $resultDB['pass'])) {
            $_SESSION["doneLog"] = "Авторизация успешна";
            header("Refresh:0 ; http://regist/loginForm");

        } else {
            $_SESSION["errLog"] = "Ошибка авторизации";
            header("Refresh:0 ; http://regist/loginForm");
        }
        }
}




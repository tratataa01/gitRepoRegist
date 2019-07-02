<?php
session_start();

class registrationModel
{

    public function addUserPublic($userData,$conn)
    {
        if (filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {

            $sql = "SELECT login,email FROM registeruserdb WHERE login=:login OR email=:email";
            $query = $conn->prepare($sql);
            $query->execute([
                ':login' => $userData['login'],
                ':email' => $userData['email']
            ]);

            $resultDB = $query->fetch(PDO::FETCH_ASSOC);

            if (empty($resultDB)) {
                $hash = password_hash($userData['pass'], PASSWORD_DEFAULT);
                $prepare_to_db = $conn->prepare('insert into registeruserdb (login, pass, email, city) VALUES (:login,:pass,:email,:city)');
                $var = $prepare_to_db->execute([
                    ':login' => $userData['login'],
                    ':pass' => $hash,
                    ':email' => $userData['email'],
                    ':city' => $userData['city']
                ]);

                if (is_bool($var) === true) {
                    $_SESSION["done"] = "Регистрация успешна";
                } else {
                    $_SESSION["err"] = "Ошибка регистрации";
                }

                header("Refresh:0 ; /registration");

            } else {

                $_SESSION["err"] = "Ошибка регистрации. Такой логин или почта уже существует";
                header("Refresh:0 ; /registration");
            }
        } else {
        $_SESSION["err"] = "E-mail адрес указан неверно.";
        header("Refresh:0 ; /registration");
        }

    }
}




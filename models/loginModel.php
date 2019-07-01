<?php


class loginModel
{
    public function loginUserModel($postMassLog)
    {
        session_start();

        $conn = new PDO ('mysql:host=localhost;dbname=registration', 'root', '');

            $sql = "SELECT id, login, pass FROM registeruserdb WHERE login=:login";
            $query = $conn->prepare($sql);
            $query->execute([
                ':login' => $postMassLog['login']
            ]);
            $resultDB = $query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($postMassLog['pass'], $resultDB['pass'])) {
            var_dump($resultDB);
            echo "Авторизация успешна";

        } else {
            echo 'fail';
        }
        }
}




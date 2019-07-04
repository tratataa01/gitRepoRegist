<?php

namespace models;
use libs\Controller;

class UserComentModel
{
    public function addComent($postComentLog,$com,$headerLinkLogin)
    {
        $prepare_to_db = $com->prepare('insert into user_coments (user_id, coment, data_time) VALUES (:user_id,:coment,:data_time)');
        $var = $prepare_to_db->execute([
            ':user_id' => $postComentLog['user_id'],
            ':coment' => $postComentLog['coment'],
            ':data_time' => $postComentLog['data_time'],

        ]);
        var_dump($postComentLog);
    }
}
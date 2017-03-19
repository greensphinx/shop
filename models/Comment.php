<?php

    class Comment
    {
        public static function saveMessage($comment, $user_id, $product_id)
        {
            $db = Db::getConnection();

            $message = $_POST['comment'];

            // получаем id пользователя
            $user_id = User::checkLogged();

            if($user_id){

            }

            $sql = "INSERT INTO comment SET 
                                ";
        }
    }
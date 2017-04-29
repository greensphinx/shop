<?php

    class Comment
    {
        public static function saveMessage($message, $user_id, $product_id, $recommended)
        {

            $db = Db::getConnection();

            $sql = "INSERT INTO comment (comment, user_id, product_id, raiting)
                              VALUES ('{$message}', {$user_id}, {$product_id}, {$recommended})";

            $result = $db->query($sql);

        }

        public static function getMessage($product_id)
        {
            $db = Db::getConnection();
//            $result = $db->query("SELECT * FROM comment WHERE product_id = {$product_id}");
            $result = $db->query("SELECT c.comment, c.date, c.user_id, c.product_id, u.id, u.name FROM comment AS c JOIN user AS u ON c.product_id = {$product_id} AND c.user_id = u.id ORDER BY c.date DESC LIMIT 10");
            $comment = [];
            $i = 0;
            while ($row = $result->fetch()) {
//                $comment[$i]['id'] = $row['id'];
                $comment[$i]['comment'] = $row['comment'];
                $comment[$i]['date'] = $row['date'];
                $comment[$i]['user_id'] = $row['user_id'];
                $comment[$i]['product_id'] = $row['product_id'];
                $comment[$i]['id'] = $row['id'];
                $comment[$i]['name'] = $row['name'];

                $i++;
            }
            return $comment;
        }

        public static function getRating($product_id)
        {
            $db = Db::getConnection();
            $result = $db->query("SELECT COUNT(`raiting`) as `rating` FROM `comment` WHERE `product_id` = {$product_id} AND `raiting` = 1");
            return $result->fetch();
        }
    }
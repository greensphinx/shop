<?php

    class Order
        {
        //Сохранение заказа

        public static function save($userName, $userPhone, $userComment, $userId, $products)
        {
            // Возвращаем строку, содержащую JSON-представление из массива $products
            // т.к. при передачи массива в БД - будет ошибка
            $products = json_encode($products);

            $db = Db::getConnection();

            $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, product) '
            . 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :product)';

            $result = $db->prepare($sql);
            $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
            $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
            $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
            $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
            $result->bindParam(':product', $products, PDO::PARAM_STR);

            return $result->execute();
        }

        }
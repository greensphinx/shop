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

        // Список заказов
        public static function getOrdersList()
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Получение и возврат результатов
            $result = $db->query('SELECT id, user_name, user_phone, user_id, date, status FROM product_order ORDER BY id DESC');
            $ordersList = array();
            $i = 0;
            while ($row = $result->fetch()) {
                $ordersList[$i]['id'] = $row['id'];
                $ordersList[$i]['user_name'] = $row['user_name'];
                $ordersList[$i]['user_phone'] = $row['user_phone'];
                $ordersList[$i]['user_id'] = $row['user_id'];
                $ordersList[$i]['date'] = $row['date'];
                $ordersList[$i]['status'] = $row['status'];
                $i++;
            }
            return $ordersList;
        }

        // текстое пояснение статуса для заказа
        public static function getStatusText($status)
        {
            switch ($status) {
                case '1':
                    return 'Новый заказ';
                    break;
                case '2':
                    return 'В обработке';
                    break;
                case '3':
                    return 'Доставляется';
                    break;
                case '4':
                    return 'Закрыт';
                    break;
            }
        }

        // Возвращает заказ с указанным id
        public static function getOrderById($id)
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Текст запроса к БД
            $sql = 'SELECT * FROM product_order WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);

            // Выполняем запрос
            $result->execute();

            // Возвращаем данные
            return $result->fetch();
        }

        // Удаляет заказ с заданным id
        public static function deleteOrderById($id)
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Текст запроса к БД
            $sql = 'DELETE FROM product_order WHERE id = :id';

            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        // Редактирует заказ с заданным id
        public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Текст запроса к БД
            $sql = "UPDATE product_order
            SET 
                user_name = :user_name, 
                user_phone = :user_phone, 
                user_comment = :user_comment, 
                date = :date, 
                status = :status 
            WHERE id = :id";

            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
            $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
            $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
            $result->bindParam(':date', $date, PDO::PARAM_STR);
            $result->bindParam(':status', $status, PDO::PARAM_INT);
            return $result->execute();
        }
    }
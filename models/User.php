<?php

    class User
    {
        public static function register($name, $email, $password)
        {
            $db = Db::getConnection();

            $sql = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";

            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);

            return $result->execute();
        }

        public static function checkName($name)
        {
            if(strlen($name) >= 2){
                return true;
            }
            return false;
        }

        public static function checkPassword($password)
        {
            if(strlen($password) >= 6){
                return true;
            }
            return false;
        }

        public static function checkEmail($email)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;
            }
            return false;
        }

        public static function checkEmailExist($email)
        {
            $db = Db::getConnection();

            $sql = "SELECT COUNT(*) FROM user WHERE email = :email";

            $result = $db->prepare($sql);
            // привязываем параметр запроса к переменной
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            // выполняем подготовленный запрос
            $result->execute();

            //  Возвращаем данные одного столбца
            if($result->fetchColumn()){
                return true;
            } else {
                return false;
            }
        }

        public static function checkUserData($email, $password)
        {
            $db = Db::getConnection();

            $sql = "SELECT * FROM user WHERE email = :email AND password = :password";

            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_INT);
            $result->bindParam(':password', $password, PDO::PARAM_INT);
            $result->execute();

            $user = $result->fetch();
            if($user){
                return $user['id'];
            } else {
                return false;
            }
        }

        public static function auth($userId)
        {
            //session_start();
            $_SESSION['user'] = $userId;
        }

        public static function Guest()
        {
            //session_start();
            if(isset($_SESSION['user'])){
                return false;
            } else {
                return true;
            }
        }

        public static function checkLogged()
        {
            //session_start();
            // если сессия есть - вернём идентификатор пользователя
            if(isset($_SESSION['user'])){
                return $_SESSION['user'];
            }

            header("Location: /user/login");
        }

        public static function getUserById($id)
        {
            if($id){
                $db = Db::getConnection();
                $sql = "SELECT * FROM user WHERE id = :id";

                $result = $db->prepare($sql);
                $result->bindParam(':id', $id, PDO::PARAM_INT);

                $result->setFetchMode(PDO::FETCH_ASSOC);
                $result->execute();

                return $result->fetch();

            }
        }

        // вносим изменения из личного кабинета пользователя в БД
        public static function edit($id, $name, $password)
        {
            $db = Db::getConnection();

            $sql = "UPDATE user 
            SET name = :name, password = :password 
            WHERE id = :id";

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);
            return $result->execute();

        }
    }
<?php

    class AccauntController
    {
        public function actionIndex()
        {

            // если пользователь авторизирован - вернуть идентификатор пользователя
            $userId = User::checkLogged();

            $user = User::getUserById($userId);

            require_once (ROOT.DS.'views'.DS.'accaunt'.DS.'index.php');
            return true;
        }

        // изменения в кабинете пользователя
        public function actionEdit()
        {
            // id пользователя из сессии
            $userId = User::checkLogged();

            // инфо о пользователе из БД
            $user = User::getUserById($userId);

            $name = $user['name'];
            $password = $user['password'];

            $result = false;

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $password = $_POST['password'];

                $errors = false;

                if (!User::checkName($name)) {
                    $errors[] = 'Имя не короче 2-ух символов';
                }

                if (!User::checkPassword($password)) {
                    $errors[] = 'Пароль не короче 6-ти символов';
                }

                if ($errors == false) {
                    $result = User::edit($userId, $name, $password);
                }

            }

            require_once(ROOT.DS.'views'.DS.'accaunt'.DS.'edit.php');

            return true;
        }
    }
<?php

    class UserController
    {
        public function actionRegister()
        {
            $name = '';
            $email = '';
            $password = '';
            $result = false;

            if(isset($_POST['submit'])){
                $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
                $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

                $errors = false; // массив с ошибками

                if(!User::checkName($name)) {
                    $errors[] = 'Имя не короче 2-ух символов';
                }

                if(!User::checkEmail($email)){
                    $errors[] = 'Неправильный email';
                }

                if(!User::checkPassword($password)){
                    $errors[] = 'Пароль не короче 6-ти символов';
                }

                if(User::checkEmailExist($email)){
                    $errors[] = 'такой email уже используется';
                }

                // если ошибок нет - сохраняем пользователя
                if($errors == false){
                    $result = User::register($name, $email, $password);
                }
            }


            require_once (ROOT.DS.'views'.DS.'user'.DS.'register.php');
            return true;
        }

        public function actionLogin()
        {
            $email = '';
            $password = '';

            if(isset($_POST['submit'])){
                $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
                $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

                $errors = false;

                if(!User::checkEmail($email)){
                    $errors[] = 'Неправильный email';
                }

                if(!User::checkPassword($password)){
                    $errors[] = 'Пароль не короче 6-ти символов';
                }

                // проверка на существование пользователя
                $userId = User::checkUserData($email, $password);

                if($userId == false){
                    $errors[] = 'Неправильные данные';
                } else {
                    // записываем данные пользователя в сессию, если всё верно
                    User::auth($userId);

                    // перенаправляем в личный кабинет
                    header("Location: /accaunt/");
                }
            }

            require_once (ROOT.DS.'views'.DS.'user'.DS.'login.php');
            return true;
        }

        // удаляем сессию, перенаправляем на главную
        public function actionLogout()
        {
            //session_start();
            unset($_SESSION["user"]);
            header("Location: /");
        }
    }
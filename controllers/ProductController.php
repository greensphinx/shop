<?php


    class ProductController
    {

        public function actionView($id)
        {

            $categories = [];
            $categories = Category::getCategories(); // список категорий в левом меню

            $oneProduct = [];
            $oneProduct = Product::getProductById($id);

            $comments= [];
            $comments = Comment::getMessage($id);

//            $rating = [];
            $rating = Comment::getRating($id);


            if(isset($_POST['submit'])){
                $userId = User::checkLogged();
                $user = User::getUserById($userId); // id пользователя
                $user_id = $user['id'];
                $message = htmlspecialchars($_POST['comment'], ENT_QUOTES);
                $recommended = $_POST['rating'];

                Comment::saveMessage($message, $user_id, $id, $recommended);
            }

            require_once(ROOT . DS . 'views' . DS . 'product' . DS . 'view.php');

            return true;
        }
    }
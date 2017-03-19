<?php


    class ProductController
    {

        public function actionView($id)
        {

            $categories = [];
            $categories = Category::getCategories(); // список категорий в левом меню

            $oneProduct = [];
            $oneProduct = Product::getProductById($id);

            require_once(ROOT . DS . 'views' . DS . 'product' . DS . 'view.php');

            return true;
        }
    }
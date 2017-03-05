<?php

    class CartController
    {
        public function actionAdd($id)
        {
            Cart::addProduct($id);

            $referrer = $_SERVER['HTTP_REFERER'];
            header("Location: $referrer");
        }

        public function actionAddAjax($id)
        {
            echo Cart::addProduct($id);
            return true;
        }

        public function actionIndex()
        {
            $categories = [];
            $categories = Category::getCategories();

            $productsInCart = false;

            // получаем данные из корзины
            $productsInCart = Cart::getProducts();

            if($productsInCart) {
                // получаем полную инфо о товарах для списка
                $productId = array_keys($productsInCart);
                $products = Product::getProductsByIds($productId);

                // общая стоимость товаров
                $totalPrice = Cart::getTotalPrice($products);
            }

            require_once (ROOT.DS.'views'.DS.'cart'.DS.'index.php');
        }
    }
<?php

    class Cart
    {
        public static function addProduct($id)
        {
            $id = intval($id);

            $productsInCart = [];

            // Если товары есть в корзине.
            if(isset($_SESSION['products'])) {
                $productsInCart = $_SESSION['products'];
            }

            // Если товар есть в корзине, но добавляется ещё с таким же id
            if(array_key_exists($id, $productsInCart)){
                $productsInCart[$id]++;
            } else {
                $productsInCart[$id] = 1; // Иначе - добавим новый товар в корзину
            }

            $_SESSION['products'] = $productsInCart;

            return self::countProductsInCart();
        }

        // Количество товаров в корзине (в сессии)
        public static function countProductsInCart()
        {
            if(isset($_SESSION['products'])){
                $count = 0;
                // если есть - подсчитываем
                // id - id товара; value - кол-во товара
                foreach ($_SESSION['products'] as $id => $value){
                    $count += $value;
                }
                return $count;
            } else {
                return 0;
            }
        }

        public static function getProducts()
        {
            if(isset($_SESSION['products'])){
                return $_SESSION['products'];
            }
            return false;
        }

        public static function getTotalPrice($products)
        {
            $productsInCart = self::getProducts();

            if ($productsInCart) {
                $total = 0;
                foreach($products as $item){
                    $total += $item['price'] * $productsInCart[$item['id']];
                }
            }

            return $total;
        }
    }
<?php

//include_once ROOT . DS . 'models' . DS . 'Page.php';


    class PageController
        {

            public function actionIndex()
            {
                $categories = [];
                $categories = Category::getCategories();

                $stockProductsMob = [];
                $stockProductsMob = Product::getStockProductByCategoryId(1);

                $productMob = [];
                $productMob = Product::getProducts(1,3);

                $stockProductsTab = [];
                $stockProductsTab = Product::getStockProductByCategoryId(2);

                $productTab = [];
                $productTab = Product::getProducts(2,3);

                $stockProductsLap = [];
                $stockProductsLap = Product::getStockProductByCategoryId(3);

                $productLap = [];
                $productLap = Product::getProducts(3,3);

                $stockProductsKon = [];
                $stockProductsKon = Product::getStockProductByCategoryId(4);

                $productKon = [];
                $productKon = Product::getProducts(4,3);

                $stockProductsTv = [];
                $stockProductsTv = Product::getStockProductByCategoryId(5);

                $productTv = [];
                $productTv = Product::getProducts(5,3);









                require_once(ROOT . DS . 'views' . DS . 'page' . DS . 'index.php');

                return true;
            }

        }
<?php


    //include (ROOT.DS.'components'.DS.'Pagination.php');
    class CategoryController
    {
        public static function actionCategory($category_alias, $page = 1)
        {

            $categories = [];
            $categories = Category::getCategories(); // список категорий в левом меню

            $products = [];
            $products = Category::getProductsByCategoryAlias($category_alias, $page);

            // кол-во товаров в категории
            $total = Product::getTotalProductsInCategory($category_alias);

            $pagination = new Pagination($total, $page, Product::LIMIT_PAGES, 'page-');

//            $categoryProducts = [];
//            $categoryProducts = Category::getProductsByCategoryId($category_id);

            require_once (ROOT.DS.'views'.DS.'category'.DS.'index.php');

            return true;
        }


    }
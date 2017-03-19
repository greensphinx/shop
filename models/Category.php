<?php

    class Category
    {
        public static function getCategories()
        {
            $db = Db::getConnection();

            $result = $db->query("SELECT id, name, alias FROM category ORDER BY sort_order ASC");

            $categories = [];

            $i = 0;
            while($row = $result->fetch()){
                $categories[$i]['id'] = $row['id']; // возможно лучше alias?
                $categories[$i]['name'] = $row['name'];
                $categories[$i]['alias'] = $row['alias'];
                $i++;
            }
            return $categories;
        }

        // 5 товаров из категории на одной странице
        public static function getProductsByCategoryAlias($alias, $page = 1)
        {
            $db = Db::getConnection();

            $page = intval($page);
            $offset = ($page - 1) * 5;

            $result = $db->query("SELECT product.stock, product.id, product.product_type, product.title, product.img, product.price, category.name 
                                  FROM product JOIN category 
                                  ON product.product_type = category.alias AND category.alias = '{$alias}' 
                                  ORDER BY product.id ASC LIMIT 5 OFFSET {$offset}");

            $productsList = [];
            $i = 0;
            while($row = $result->fetch()){
                $productsList[$i]['stock'] = $row['stock'];
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['product_type'] = $row['product_type'];
                $productsList[$i]['title'] = $row['title'];
                $productsList[$i]['img'] = $row['img'];
                $productsList[$i]['price'] = $row['price'];
                $productsList[$i]['name'] = $row['name'];

                $i++;
            }

            return $productsList;
        }

        public static function getProductsByCategoryId($id, $page = 1)
        {
            $db = Db::getConnection();

            $page = intval($page);
            $offset = ($page - 1) * 5;

            $result = $db->query("SELECT product.stock, product.id, product.product_type, product.title, product.img, product.price, category.name 
                                  FROM product JOIN category 
                                  ON product.category_id = category.sort_order AND category.sort_order = '{$id}' 
                                  ORDER BY product.id ASC LIMIT 5 OFFSET {$offset}");

            $productsListCat = [];
            $i = 0;
            while($row = $result->fetch()){
                $productsListCat[$i]['stock'] = $row['stock'];
                $productsListCat[$i]['id'] = $row['id'];
                $productsListCat[$i]['product_type'] = $row['product_type'];
                $productsListCat[$i]['title'] = $row['title'];
                $productsListCat[$i]['img'] = $row['img'];
                $productsListCat[$i]['price'] = $row['price'];
                $productsListCat[$i]['name'] = $row['name'];

                $i++;
            }

            return $productsListCat;
        }

        // Возвращает массив категорий для админпанели
        public static function getCategoriesListAdmin()
        {
            $db= Db::getConnection();

            $result = $db->query("SELECT id, name, alias, sort_order, status FROM category ORDER BY sort_order ASC");

            $categoryList = [];
            $i = 0;
            while($row = $result->fetch()){
                $categoryList[$i]['id'] = $row['id'];
                $categoryList[$i]['name'] = $row['name'];
                $categoryList[$i]['alias'] = $row['alias'];
                $categoryList[$i]['sort_order'] = $row['sort_order'];
                $categoryList[$i]['status'] = $row['status'];
                $i++;
            }

            return $categoryList;
        }
    }
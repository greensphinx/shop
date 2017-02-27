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
    }
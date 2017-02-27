<?php

    class Product
    {
        const LIMIT_PAGES = 5;

        // получаем акционные продукты (stock)
        public static function getStockProductByCategoryId($category_id)
        {
            $category_id = intval($category_id);
            $db = Db::getConnection();

            $stockProduct = [];

            $result = $db->query("SELECT id, title, features, price, img, stock FROM product WHERE stock = 1 AND category_id = '{$category_id}' LIMIT 2");

            $i = 0;
            while ($row = $result->fetch()){
                $stockProduct[$i]['id'] = $row['id'];
                $stockProduct[$i]['title'] = $row['title'];
                $stockProduct[$i]['features'] = $row['features'];
                $stockProduct[$i]['price'] = $row['price'];
                $stockProduct[$i]['img'] = $row['img'];
                $stockProduct[$i]['stock'] = $row['stock'];
                $i++;
            }

            return $stockProduct;
        }

        public static function getProducts($category_id, $limit = null)
        {
            $category_id = intval($category_id);
            $limit = intval($limit);
            $db = Db::getConnection();

            $sql = "SELECT id, title, features, price, img FROM product WHERE category_id = '{$category_id}' AND stock = 0";
            if($limit){
                $sql .= " LIMIT $limit";
            }

            $result = $db->query($sql);

            $product = [];
            $i = 0;
            while($row = $result->fetch()){
                $product[$i]['id'] = $row['id'];
                $product[$i]['title'] = $row['title'];
                $product[$i]['features'] = $row['features'];
                $product[$i]['price'] = $row['price'];
                $product[$i]['img'] = $row['img'];
                $i++;
            }

            return $product;
        }

        // получаем 1 продукт по его ID
        public static function getProductById($id)
        {
            $id = intval($id);
            $db = Db::getConnection();

            $result = $db->query("SELECT id, title, features, description, brand, price, stock, img FROM product WHERE id = '{$id}'");

            $oneProduct = [];
            $i = 0;
            while($row = $result->fetch()){
                $oneProduct[$i]['id'] = $row['id'];
                $oneProduct[$i]['title'] = $row['title'];
                $oneProduct[$i]['features'] = $row['features'];
                $oneProduct[$i]['description'] = $row['description'];
                $oneProduct[$i]['brand'] = $row['brand'];
                $oneProduct[$i]['price'] = $row['price'];
                $oneProduct[$i]['stock'] = $row['stock'];
                $oneProduct[$i]['img'] = $row['img'];
                $i++;
            }
            return $oneProduct;
        }

        // кол-во продуктов в категории
        public static function getTotalProductsInCategory($category_id)
        {
            $db = Db::getConnection();

            $result = $db->query("SELECT COUNT(id) AS count FROM product WHERE category_id = {$category_id}");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();

            return $row;
        }
    }
<?php

    class Page
    {
        public static function getCategoriesList()
        {

            $db = Db::getConnection();

            $categoryList = array();

            $result = $db->query('SELECT id, name FROM category '
                . 'ORDER BY sort_order ASC');

            $i = 0;
            while ($row = $result->fetch()) {
                $categoryList[$i]['id'] = $row['id'];
                $categoryList[$i]['name'] = $row['name'];
                $i++;
            }

            return $categoryList;
        }

        public  function getStockProductByType($type)
        {

            $db = Db::getConnection();

            $stock = [];
            $result = $db->query("SELECT id, product_type, img, features, price FROM product WHERE stock = 1 AND product_type = '$type' LIMIT 2");

            $i = 0;
            while($row = $result->fetch()){
                $stock[$i]['id'];
                $stock[$i]['product_type'];
                $stock[$i]['img'];
                $stock[$i]['features'];
                $stock[$i]['price'];
            }

            return $stock;
        }
    }
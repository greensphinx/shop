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

            $result = $db->query("SELECT id, title, features, description, brand, price, stock, img, visible, category_id FROM product WHERE id = '{$id}'");

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
                $oneProduct[$i]['visible'] = $row['visible'];
                $oneProduct[$i]['category_id'] = $row['category_id'];
                $i++;
            }
            return $oneProduct;
        }

        // кол-во продуктов в категории
        public static function getTotalProductsInCategory($alias)
        {
            $db = Db::getConnection();

            $result = $db->query("SELECT COUNT(id) AS count FROM product WHERE product_type = '{$alias}'");
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();

            return $row['count'];
        }

        // получаем массив (список товаров) с нужными идентификаторами
        public static function getProductsByIds($idsArray)
        {
            $products = [];

            $db = Db::getConnection();

            $idsString = implode(',', $idsArray);

            $sql = "SELECT * FROM product WHERE id IN ({$idsString})";

            $result =$db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $i = 0;
            while($row = $result->fetch()){
                $products[$i]['id'] = $row['id'];
                $products[$i]['title'] = $row['title'];
                $products[$i]['price'] = $row['price'];
                $i++;
            }

            return $products;
        }


        public static function getProductsByCategoryId($id = false, $page = 1)
        {
            if($id){
                $page = intval($page);
                $offset = ($page - 1) * self::LIMIT_PAGES;

                $db = Db::getConnection();

                $result = $db->query("SELECT product.stock, product.id, product.product_type, product.title, product.img, product.price, category.name 
                                  FROM product JOIN category 
                                  ON product.category_id = category.sort_order AND category.sort_order = '{$id}' 
                                  ORDER BY product.id ASC LIMIT " . self::LIMIT_PAGES . " OFFSET {$offset}");

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
        }

        public static function getLastProductsForSlider()
        {
            $db = Db::getConnection();

            $result = $db->query("SELECT id, title, price, img FROM product WHERE visible = 1 ORDER BY id DESC");

            $products = [];
            $i = 0;
            while($row = $result->fetch()){
                $products[$i]['id'] = $row['id'];
                $products[$i]['title'] = $row['title'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['img'] = $row['img'];
                $i++;
            }

            return $products;
        }

        public static function getProductsList()
        {
            $db = Db::getConnection();

            // Получение и возврат результатов
            $result = $db->query('SELECT id, title, price, product_type FROM product ORDER BY id ASC');
            $productsList = array();
            $i = 0;
            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['title'] = $row['title'];
                $productsList[$i]['product_type'] = $row['product_type'];
                $productsList[$i]['price'] = $row['price'];
                $i++;
            }
            return $productsList;
        }

        // Удаляем товар по указанному id
        public static function deleteProductById($id)
        {
            $db = Db::getConnection();

            $sql = "DELETE FROM product WHERE id = :id";

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();
        }

        // Добавляем товар в БД
        // Возвращает ID последнего добавленного товара
        public static function createProduct($options)
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Текст запроса к БД
            $sql = 'INSERT INTO product '
                . '(title, features, description, price, stock, brand, keywords, visible,'
                . 'product_type, category_id)'
                . 'VALUES '
                . '(:title, :features, :description, :price, :stock, :brand, :keywords, :visible,'
                . ':product_type, :category_id)';

            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
            $result->bindParam(':features', $options['features'], PDO::PARAM_STR);
            $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
            $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
            $result->bindParam(':stock', $options['stock'], PDO::PARAM_INT);
            $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
            $result->bindParam(':keywords', $options['keywords'], PDO::PARAM_STR);
            //$result->bindParam(':img', $options['img'], PDO::PARAM_STR);
            $result->bindParam(':visible', $options['visible'], PDO::PARAM_INT);
            $result->bindParam(':product_type', $options['product_type'], PDO::PARAM_STR);
            $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
            if ($result->execute()) {
                // Если запрос выполенен успешно, возвращаем id добавленной записи
                return $db->lastInsertId();
            }
            // Иначе возвращаем 0
            return 0;
        }

        // Имя фото и id продукта
        public static function addImage($imgName, $id)
        {
            $db = Db::getConnection();

            $sql = "UPDATE product SET img = '{$imgName}' WHERE id = {$id}";
            $result = $db->query($sql);
            return $result;
        }


        // Редактирует товар с заданным id
        public static function updateProductById($id, $options)
        {
//            var_dump($options);
            $db = Db::getConnection();

            $sql = "UPDATE product SET 
                                    title = :title, 
                                    features = :features, 
                                    description = :description, 
                                    price = :price, 
                                    stock = :stock, 
                                    brand = :brand, 
                                    visible = :visible, 
                                    product_type = :product_type, 
                                    category_id = :category_id 
                                    WHERE 
                                    id = :id";

            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
            $result->bindParam(':features', $options['features'], PDO::PARAM_STR);
            $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
            $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
//            $result->bindParam(':img', $options['img'], PDO::PARAM_STR);
            $result->bindParam(':stock', $options['stock'], PDO::PARAM_INT);
            $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
//            $result->bindParam(':keywords', $options['keywords'], PDO::PARAM_STR);
            $result->bindParam(':visible', $options['visible'], PDO::PARAM_INT);
            $result->bindParam(':product_type', $options['product_type'], PDO::PARAM_STR);
            $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
            return $result->execute();
        }

        // Возвращает путь к изображению
        public static function getImage($id)
        {
            // Если нет фото
            $noImage = 'no-image.jpg';

            // Путь к папке с товарами
            $path = '/uploads/';

            // Путь к изображению товара
            $pathToProductImage = $path . $id . '.jpg';

            if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
                return $pathToProductImage;
            }

            return $path . $noImage;
        }
    }
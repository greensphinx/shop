<?php

    class AdminProductController extends Admin
    {
        // Action для управления товарами из админпанели (create)
        public function actionIndex()
        {
            self::checkAdmin();
            // Массив. Список товаров
            $productsList = Product::getProductsList();

            require_once (ROOT.DS.'views'.DS.'admin_product'.DS.'index.php');
            return true;
        }

        public function actionDelete($id)
        {
            self::checkAdmin();

            if(isset($_POST['submit'])){
                // Форма отправлена? Да - удалить товар.
                Product::deleteProductById($id);

                header("Location: admin/product");
            }

            require_once (ROOT.DS.'views'.DS.'admin_product'.DS.'delete.php');
            return true;
        }

        // добавление нового товара
        public function actionCreate()
        {
            self::checkAdmin();
            $categoriesList = Category::getCategoriesListAdmin();

            if (isset($_POST['submit'])) {
                $options['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
                $options['features'] = htmlspecialchars($_POST['features'], ENT_QUOTES);
                $options['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES);
                $options['price'] = htmlspecialchars($_POST['price'], ENT_QUOTES);
                //$options['img'] = htmlspecialchars($_POST['img'], ENT_QUOTES);
                $options['stock'] = htmlspecialchars($_POST['stock'], ENT_QUOTES);
                $options['brand'] = htmlspecialchars($_POST['brand'], ENT_QUOTES);
                $options['keywords'] = htmlspecialchars($_POST['keywords'], ENT_QUOTES);
                $options['visible'] = htmlspecialchars($_POST['visible'], ENT_QUOTES);
                $options['product_type'] = htmlspecialchars($_POST['product_type'], ENT_QUOTES);
                $options['category_id'] = htmlspecialchars($_POST['category_id'], ENT_QUOTES);

                $errors = false;

                // При необходимости можно валидировать значения нужным образом
                if (!isset($options['title']) || empty($options['title'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    $id = Product::createProduct($options);

                    // Если запись добавлена
                    if ($id) {
                        // Проверим, загружалось ли через форму изображение
                        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                            // Если загружалось, переместим его в нужную папку, дадим новое имя
                            move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/uploads/{$id}.jpg");
                            $imgName = $id.'.jpg';
                            // загрузим новое имя в БД
                            $result = Product::addImage($imgName, $id);
                        }
                    }

                    header("Location: /admin/product");
                }
            }
            require_once(ROOT.DS.'views'.DS.'admin_product'.DS.'create.php');
            return true;
        }

        // Редактирование товара
        public function actionUpdate($id)
        {
            self::checkAdmin();
            $categoriesList = Category::getCategoriesListAdmin();
            $product = Product::getProductById($id);

            if (isset($_POST['submit'])) {
                $options['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES);
                $options['features'] = htmlspecialchars($_POST['features'], ENT_QUOTES);
                $options['description'] = htmlspecialchars($_POST['description'], ENT_QUOTES);
                $options['price'] = htmlspecialchars($_POST['price'], ENT_QUOTES);
                $options['stock'] = htmlspecialchars($_POST['stock'], ENT_QUOTES);
                $options['brand'] = htmlspecialchars($_POST['brand'], ENT_QUOTES);
                $options['visible'] = htmlspecialchars($_POST['visible'], ENT_QUOTES);
                $options['product_type'] = htmlspecialchars($_POST['product_type'], ENT_QUOTES);
                $options['category_id'] = htmlspecialchars($_POST['category_id'], ENT_QUOTES);

                // Сохраняем изменения
//                return $options;

                $errors = false;

                // При необходимости можно валидировать значения нужным образом
                if (!isset($options['title']) || empty($options['title'])) {
                    $errors[] = 'Заполните поля';
                }


                if ($errors === false) {

                    Product::updateProductById($id, $options);

                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/uploads/{$id}.jpg");
                        $imgName = $id.'.jpg';
                        Product::addImage($imgName, $id);
                    }
                }

                header("Location: /admin/product");
            }

            require_once(ROOT.DS.'views'.DS.'admin_product'.DS.'update.php');
            return true;
        }


    }
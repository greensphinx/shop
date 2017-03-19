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

        public function actionDelete($id)
        {
            // Удалим товар из корзины
            Cart::deleteProduct($id);
            // Вернём пользователя на страницу с корзиной
            header("Location: /cart/");
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

            return true;
        }

        public function actionCheckout()
        {

            // левое меню категорий
            $categories = [];
            $categories = Category::getCategories();

            $result = false;

            if(isset($_POST['submit'])){
                // данные из формы
                $userName = $_POST['userName'];
                $userPhone = $_POST['userPhone'];
                $userComment = $_POST['userComment'];

                // валидация
                $errors = false;
                if(!User::checkName($userName)){
                    $errors[] = 'Неправильное имя';
                }
                if(!User::checkPhone($userPhone)){
                    $errors[] = 'Неправильный телефон';
                }

                // если форма заполнена правильно
                if($errors == false){

                    // сохраняем инфо о заказе
                    // Получаем товары в корзине и пользователя, который оформил заказ
                    $productsInCart = Cart::getProducts();
                    if(User::Guest()) {
                        $userId = false;
                    } else {
                        $userId = User::checkLogged();
                    }

                    // сохраняем закакз в БД
                                        // имя      телефон     комментарий     id      массив товаров
                    $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                    if($result){

                        // Отправляем письмо администратору о новом заказе
                        $adminEmail = 'fortestmailphp@gmail.com';
                        $message = 'message from CartController, actionCheckout(тут будет ссылка на административный раздел)';
                        $subject = 'Новый заказ.';
                        mail($adminEmail, $subject, $message);

                        // Очищаем корзину
                        Cart::clear();
                    }
                } else {
                    // если форма заполнена не правильно
                    $productsInCart = Cart::getProducts();
                    $productsIds  = array_keys($productsInCart);
                    $products = Product::getProductsByIds($productsIds);
                    $totalPrice = Cart::getTotalPrice($products); // общая стоимость
                    $totalQuantity = Cart::countProductsInCart(); // и кол-во товаров
                }
            } else {
                // если форма не отправлена

                // получаем данные из корзины (из сессии)
                $productsInCart = Cart::getProducts();


                if($productsInCart == false) {
                    // корзина пуста - отправляем на главную
                    header("Location: /");
                } else {
                    // если есть товары в корзине - получаем количество товаров и общую стоимость
                    $productsIds = array_keys($productsInCart);
                    $products = Product::getProductsByIds($productsIds);
                    $totalPrice = Cart::getTotalPrice($products);
                    $totalQuantity = Cart::countProductsInCart();

                    $userName = false;
                    $userPhone = false;
                    $userComment = false;

                    // Авторизован ли пользователь?
                    if(User::Guest()){
                        // если нет - форма пустая
                    } else {
                        // если да - получаем данные пользователя из БД по id
                        $userId = User::checkLogged();
                        $user = User::getUserById($userId);
                        // подставляем данные в форму
                        $userName = $user['name'];
                    }
                }
            }

            require_once (ROOT.DS.'views'.DS.'cart'.DS.'checkout.php');
            return true;
        }
    }
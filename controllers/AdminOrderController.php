<?php

    //Управление заказами в админпанели

    class AdminOrderController extends Admin
    {

        //"Управление заказами"
        public function actionIndex()
        {
            self::checkAdmin();

            // Получаем список заказов
            $ordersList = Order::getOrdersList();

            require_once(ROOT.DS.'views'.DS.'admin_order'.DS.'index.php');
            return true;
        }

        //"Редактирование заказа"
        public function actionUpdate($id)
        {
            self::checkAdmin();

            // Получаем данные о конкретном заказе
            $order = Order::getOrderById($id);

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                // Получаем данные из формы
                $userName = $_POST['userName'];
                $userPhone = $_POST['userPhone'];
                $userComment = $_POST['userComment'];
                $date = $_POST['date'];
                $status = $_POST['status'];

                // Сохраняем изменения
                Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);

                // Перенаправляем пользователя на страницу управлениями заказами
                header("Location: /admin/order/view/$id");
            }

            require_once(ROOT.DS.'views'.DS.'admin_order'.DS.'update.php');
            return true;
        }

        //"Просмотр заказа"
        public function actionView($id)
        {
            self::checkAdmin();

            // Получаем данные о конкретном заказе
            $order = Order::getOrderById($id);

            // Получаем массив с идентификаторами и количеством товаров
            $productsQuantity = json_decode($order['product'], true);

            // Получаем массив с индентификаторами товаров
            $productsIds = array_keys($productsQuantity);

            // Получаем список товаров в заказе
            $products = Product::getProductsByIds($productsIds);

            require_once(ROOT.DS.'views'.DS.'admin_order'.DS.'view.php');
            return true;
        }

        //"Удалить заказ"
        public function actionDelete($id)
        {
            self::checkAdmin();

            if (isset($_POST['submit'])) {
                Order::deleteOrderById($id);
                header("Location: /admin/order");
            }

            require_once(ROOT.DS.'views'.DS.'admin_order'.DS.'delete.php');
            return true;
        }

    }

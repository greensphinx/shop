<?php

    class AdminController extends Admin
    {
        // Стартовая страница админпанели
        public function actionIndex()
        {
            // Проверяем наличие прав доступа
            self::checkAdmin();

            require_once(ROOT.DS.'views'.DS.'admin'.DS.'index.php');
            return true;
        }
    }
<?php

    class AdminCategoryController extends Admin
    {

        //Action для страницы "Управление категориями"
        public function actionIndex()
        {
            self::checkAdmin();
            $categoriesList = Category::getCategoriesListAdmin();

            require_once(ROOT.DS.'views'.DS.'admin_category'.DS.'index.php');
            return true;
        }

        //Action для страницы "Добавить категорию"
        public function actionCreate()
        {
            self::checkAdmin();

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $sortOrder = $_POST['sort_order'];
                $status = $_POST['status'];

                $errors = false;

                // При необходимости можно валидировать значения нужным образом
                if (!isset($name) || empty($name)) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    Category::createCategory($name, $sortOrder, $status);
                    header("Location: /admin/category");
                }
            }

            require_once(ROOT.DS.'views'.DS.'admin_category'.DS.'create.php');
            return true;
        }


        //Action для страницы "Редактировать категорию"
        public function actionUpdate($id)
        {
            self::checkAdmin();
            $category = Category::getCategoryById($id);

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $alias = $_POST['alias'];
                $sortOrder = $_POST['sort_order'];
                $status = $_POST['status'];
                Category::updateCategoryById($id, $name, $alias, $sortOrder, $status);
                header("Location: /admin/category");
            }

            require_once(ROOT.DS.'views'.DS.'admin_category'.DS.'update.php');
            return true;
        }

        //Action для страницы "Удалить категорию"
        public function actionDelete($id)
        {
            self::checkAdmin();

            if (isset($_POST['submit'])) {
                Category::deleteCategoryById($id);
                header("Location: /admin/category");
            }

            require_once(ROOT.DS.'views'.DS.'admin_category'.DS.'delete.php');
            return true;
        }

    }

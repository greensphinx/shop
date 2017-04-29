<?php include_once(ROOT.DS.'views'.DS.'layouts'.DS.'header_admin.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Добавить новый товар</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="" method="post" enctype="multipart/form-data">

                        <p>Название товара</p>
                        <input type="text" name="title" placeholder="" value="">

                        <br/><br/>

                        <p>Тип категории</p>
                        <select name="product_type">
                            <option value="mobile">Мобильные телефоны</option>
                            <option value="tablet">Планшеты</option>
                            <option value="laptop">Ноутбуки</option>
                            <option value="konsole">Игровые приставки</option>
                            <option value="tv">Телевизоры</option>
                        </select>

                        <p>Стоимость, грн.</p>
                        <input type="text" name="price" placeholder="" value="">

                        <p>ID Категории</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="Брэнд" value="">

                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">

                        <p>Краткие характеристики</p>
                        <textarea name="features"></textarea>

                        <p>Детальное описание</p>
                        <textarea name="description"></textarea>

                        <p>Ключевые слова</p>
                        <textarea name="keywords"></textarea>

                        <br/><br/>

                        <p>Акционный товар</p>
                        <select name="stock">
                            <option value="1">Да</option>
                            <option value="0" selected="selected">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Отображать на сайте</p>
                        <select name="visible">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include_once(ROOT.DS.'views'.DS.'layouts'.DS.'footer_admin.php'); ?>


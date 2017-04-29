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


            <h4>Редактировать товар #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название товара</p>
                        <input type="text" name="title" placeholder="" value="<?php echo $product[0]['title']; ?>">

                        <p>Характеристики</p>
                        <textarea name="features" rows="10"><?php echo $product[0]['features']; ?></textarea>

                        <p>Описание</p>
                        <textarea name="description" rows="10"><?php echo $product[0]['description']; ?></textarea>

                        <p>Стоимость, грн.</p>
                        <input type="text" name="price" placeholder="" value="<?php echo $product[0]['price']; ?>">

                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" 
                                        <?php if ($product[0]['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>

                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="" value="<?php echo $product[0]['brand']; ?>">

                        <p>Изображение товара</p>
                        <img src="<?php echo Product::getImage($product[0]['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $product['image']; ?>">

                        <br/><br/>

                        <p>Акционный товар</p>
                        <select name="stock">
                            <option value="1" <?php if ($product[0]['stock'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product[0]['stock'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>



                        <p>Отображать на сайте</p>
                        <select name="visible">
                            <option value="1" <?php if ($product[0]['visible'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product[0]['visible'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>

                        <p>Тип продукции</p>
                        <select name="product_type">
                            <option value="mobile">Мобильные телефоны</option>
                            <option value="tablet">Планшеты</option>
                            <option value="laptop">Ноутбуки</option>
                            <option value="konsole">Игровые приставки</option>
                            <option value="tv">Телевизоры</option>
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
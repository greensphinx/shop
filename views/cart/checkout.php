<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'header.php') ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Категории</h2>
                        <div class="panel-group category-products">
                            <?php foreach ($categories as $category) : ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?=$category['alias']?>" class="<?php if($category_alias == $category['alias']) echo "active"; ?>"><?=$category['name']?></a></h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">Корзина</h2>


                        <?php if ($result) { ?>

                            <p>Спасибо. Заказ оформлен. Мы с Вами свяжемся в кратчайшие сроки.</p>

                        <?php } else { ?>

                            <p>Вы выбрали <?=$totalQuantity;?> товаров, на сумму: <?=$totalPrice;?> грн.</p><br/>

                            <div class="col-sm-4">
                                <!-- блок ошибок (если есть)-->
                                <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li> - <?=$error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <!-- конец блока ошибок-->

                                <p>Заполните форму для завершения заказа.</p>

                                <div class="login-form">
                                    <form action="" method="post">

                                        <p>Ваша имя</p>
                                        <input type="text" name="userName" placeholder="" value="<?=$userName;?>"/>

                                        <p>Номер телефона</p>
                                        <input type="text" name="userPhone" placeholder="" value="<?=$userPhone;?>"/>

                                        <p>Комментарий к заказу</p>
                                        <input type="text" name="userComment" placeholder="Сообщение" value="<?=$userComment;?>"/>

                                        <br/>
                                        <br/>
                                        <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                                    </form>
                                </div>
                            </div>

                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>
    </section>

<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'footer.php') ?>
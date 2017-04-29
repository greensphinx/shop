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
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="/uploads/<?=$oneProduct[0]['img']?>" alt="" />
                            </div>
                            <?php if($oneProduct[0]['stock']) { ?>
                                <img src="/templates/images/home/stock1.png" width="42" height="42" class="new" alt="stock">
                            <?php } ?>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="/templates/images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2><?=$oneProduct[0]['title'];?></h2>
                                <span>

                                        <?php if($oneProduct[0]['stock']) { ?>
                                        <span><s><?php $percent = $oneProduct[0]['price'] * 10/100; echo $oneProduct[0]['price'] + $percent; ?></s> грн.</span>
                                    <?php } ?>

                                            <span><?=$oneProduct[0]['price']?> грн.</span>
                                            <label>Количество:</label>
                                            <input type="text" value="1" />
                                            <a href="#" data-id="<?=$oneProduct[0]['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </span>
                                <p><b>Производитель:</b> <?=$oneProduct[0]['brand']?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Описание товара</h4>
                            <p><?=$oneProduct[0]['features']?></p>
                            <p><?=$oneProduct[0]['description']?></p>
                        </div>
                    </div>
                </div><!--/product-details-->

                <?php
//                    var_dump($rating);
                    if($rating){
                        echo "<h4>Рейтинг товара: ". $rating[0]['rating'] ."</h4>";
                    }
                ?>

                <!-- Отзывы -->
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            if($comments){
                                echo "<h4>Комментарии:</h4>";
                                foreach($comments as $comment) :
                                    ?>
                                    <div class="row">
                                        <!-- иногда стили не отрабатывают, задал здесь как привилегию№1 -->
                                        <div class="myCommnets" style="border: 1px solid #06A5FF;
                                                                          border-radius: 5px;
                                                                          margin-bottom: 10px;
                                                                          padding: 7px;">
                                            <h4><b><?=$comment['name']?></b>:</h4>

                                            <p><?= $comment['comment'] ?></p>
                                            <p><?= $comment['date'] ?></p>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            }
                        ?>

                        <h3>Оставить отзыв:</h3>
                        <form action="" method="post">
                                <label for="like"><p  class="fa fa-thumbs-up" style="color: #06A5FF"><b>Рекомендую</b></p></label>
                                <input type="radio" id="like" name="rating" value="1">
                                <br>
                                <label for="dislike"><p  class="fa fa-thumbs-down" style="color: red;"><b>Не рекомендую</b></p></label>
                                <input type="radio" id="dislike" name="rating" value="0"><br>

                            <textarea name="comment" id="" rows="10" class="form-control" placeholder="Ваш комментарий"></textarea><br>
                            <input type="submit" name="submit" value="Отправить" class="btn btn-primary btn-lg btn-block">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<br/>
<br/>

<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'footer.php') ?>
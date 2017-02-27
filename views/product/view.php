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
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
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

            </div>
        </div>
    </div>
</section>


<br/>
<br/>

<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'footer.php') ?>
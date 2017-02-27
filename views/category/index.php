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
                <div class="features_items"><!--features_items-->

                    <h2 class="title text-center">Товары</h2>
                    <?php foreach ($products as $product) : ?>
                        <div class="col-sm-4" style="height: 500px" >
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo" />

                                        <?php if($product['stock']) { ?>
                                        <h2><s><?php $percent = $product['price'] * 10/100; echo $product['price'] + $percent; ?></s> грн.</h2>
                                        <?php } ?>

                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                    </div>
                                    <?php if($product['stock']) { ?>
                                    <img src="/templates/images/home/stock1.png" width="42" height="42" class="new" alt="stock">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"></div>

                    <!-- пагинатор-->

                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'footer.php') ?>


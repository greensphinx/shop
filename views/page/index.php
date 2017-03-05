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
                                    <h4 class="panel-title"><a href="/category/<?=$category['alias']?>"><?=$category['name']?></a></h4>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

            <!-- выводим список товаров: акционные 2 товара + обычные 3 товара-->

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <!-- БЛОК МОЛЬНЫЕ-->
                    <h2 class="title text-center">Мобильные телефоны</h2>
                    <?php foreach ($stockProductsMob as $stock_product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$stock_product['img']?>" alt="photo" />
                                        <h2><s><?php $percent = $stock_product['price'] * 10/100; echo $stock_product['price'] + $percent; ?></s> грн.</h2>
                                        <h2><?=$stock_product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$stock_product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$stock_product['id']?>"><?=$stock_product['title']?></a></p>
                                        <p><?=$stock_product['features']?></p>
                                    </div>
                                    <img src="/templates/images/home/stock1.png" width="42" height="42" class="new" alt="stock">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>
                    <?php foreach ($productMob as $product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo" />
                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                        <p><?=$product['features']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>

                    <!-- БЛОК ПЛАНШЕТЫ-->
                    <h2 class="title text-center">Планшеты</h2>
                    <?php foreach ($stockProductsTab as $product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo" />
                                        <h2><s><?php $percent = $product['price'] * 10/100; echo $product['price'] + $percent; ?></s> грн.</h2>
                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                        <p><?=$product['features']?></p>
                                    </div>
                                    <img src="/templates/images/home/stock1.png" width="42" height="42" class="new" alt="stock">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>
                    <?php foreach ($productTab as $product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo" />
                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                        <p><?=$product['features']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>

                    <!-- БЛОК НОУТБУКИ-->
                    <h2 class="title text-center">Ноутбуки</h2>
                    <?php foreach ($stockProductsLap as $product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo" />
                                        <h2><s><?php $percent = $product['price'] * 10/100; echo $product['price'] + $percent; ?></s> грн.</h2>
                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                        <p><?=$product['features']?></p>
                                    </div>
                                    <img src="/templates/images/home/stock1.png" width="42" height="42" class="new" alt="stock">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>
                    <?php foreach ($productLap as $product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo" />
                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                        <p><?=$product['features']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>

                    <!-- БЛОК КОНСОЛИ-->
                    <h2 class="title text-center">Игровые приставки</h2>
                    <?php foreach ($stockProductsKon as $product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo" />
                                        <h2><s><?php $percent = $product['price'] * 10/100; echo $product['price'] + $percent; ?></s> грн.</h2>
                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                        <p><?=$product['features']?></p>
                                    </div>
                                    <img src="/templates/images/home/stock1.png" width="42" height="42" class="new" alt="stock">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>
                    <?php foreach ($productKon as $product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo" />
                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                        <p><?=$product['features']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>

                    <!-- БЛОК ТЕЛЕВИЗОРЫ-->
                    <h2 class="title text-center">Телевизоры</h2>
                    <?php foreach ($stockProductsTv as $product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo"/>
                                        <h2><s><?php $percent = $product['price'] * 10/100; echo $product['price'] + $percent; ?></s> грн.</h2>
                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                        <p><?=$product['features']?></p>
                                    </div>
                                    <img src="/templates/images/home/stock1.png" width="42" height="42" class="new" alt="stock">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>
                    <?php foreach ($productTv as $product) : ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/uploads/<?=$product['img']?>" alt="photo" />
                                        <h2><?=$product['price']?> грн.</h2>
                                        <a href="/cart/add/<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        <p><a href="/product/<?=$product['id']?>"><?=$product['title']?></a></p>
                                        <p><?=$product['features']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div style="clear: both"><br></div>



                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/templates/images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/templates/images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/templates/images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/templates/images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/templates/images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/templates/images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'footer.php') ?>


<div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Новые товары на сайте</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <?php
                                // Цикл для вывода товаров в слайдер
                                foreach($lastProducts as $productForSlider){
                            ?>
<div class="item active">
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="/uploads/<?=$productForSlider['img']?>" alt="photo" />
                    <h2><?=$productForSlider['price']?>грн.</h2>
                    <p><a href="/product/<?=$productForSlider['id']?>"><?=$productForSlider['title']?></a></p>
                    <a href="#" data-id="<?=$productForSlider['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                </div>

            </div>
        </div>
    </div>
    <?php } ?>


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
<footer id="footer" style="position: fixed; left: 0; bottom: 0; width: 100%;"><!--Footer-->
    <div class="footer-bottom" style="width: 100%;">
        <div class="container">
            <div class="row">
                <p class="pull-left">Все права защищены &copy; <?=date('Y')?></p>
                <p class="pull-right" style="color: red; font-size: 30px;"><b>Сайт создан в ознакомительных целях!</b></p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->

<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="/templates/js/jquery.cycle2.min.js"></script>
<script src="/templates/js/jquery.cycle2.carousel.min.js"></script>
<script src="/templates/js/jquery.js"></script>
<script src="/templates/js/bootstrap.min.js"></script>
<script src="/templates/js/jquery.scrollUp.min.js"></script>
<script src="/templates/js/price-range.js"></script>
<script src="/templates/js/jquery.prettyPhoto.js"></script>
<script src="/templates/js/main.js"></script>
<script>
    $(document).click(function () {
        $(".add-to-cart").click( function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>
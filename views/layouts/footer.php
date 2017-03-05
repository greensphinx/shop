<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Все права защищены &copy; <?=date('Y')?></p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->



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
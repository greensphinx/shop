<?php include_once(ROOT.DS.'views'.DS.'layouts'.DS.'header_admin.php'); ?>

    <section>
        <div class="container">
            <div class="row">
                <br>
                <h4>Добро пожаловать, администратор!</h4>
                <br>
                <p>Доступные возможности:</p>
                <br>
                <ul>
                    <li><a href="admin/product">Управление товарами</a></li>
                    <li><a href="admin/category">Управление категориями</a></li>
                    <li><a href="admin/order">Управление заказами</a></li>
                </ul>
            </div>
        </div>
    </section>

<?php include_once(ROOT.DS.'views'.DS.'layouts'.DS.'footer_admin.php'); ?>
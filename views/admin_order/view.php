<?php include_once(ROOT.DS.'views'.DS.'layouts'.DS.'header_admin.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Просмотр заказа</li>
                </ol>
            </div>


            <h4>Просмотр заказа #<?php echo $order['id']; ?></h4>
            <br/>




            <h5><u>Информация о заказе</u></h5>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Номер заказа</td>
                    <td><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Имя клиента</td>
                    <td><?php echo $order['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td><?php echo $order['user_phone']; ?></td>
                </tr>
                <tr>
                    <td>Комментарий клиента</td>
                    <td><?php echo $order['user_comment']; ?></td>
                </tr>
                <?php if ($order['user_id'] != 0): ?>
                    <tr>
                        <td>ID клиента</td>
                        <td><?php echo $order['user_id']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><b>Статус заказа</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Дата заказа</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>

            <h5>Товары в заказе</h5>

            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th>ID товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итого</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['title']; ?></td>
                        <td><?php echo $product['price']; ?> грн.</td>
                        <td><?php echo $productsQuantity[$product['id']]; ?></td>
                        <?php
                        static $lastTotal = 0;
                        $total = 0;
                        $total += $productsQuantity[$product['id']] * $product['price'];
                        $lastTotal += $total;
                        ?>
                        <td><?=$total?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" style="border-bottom-color: transparent; border-left-color: transparent;"></td>
                    <td><b><?=$lastTotal?></b> грн.</td>
                </tr>
            </table>

            <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>


</section>

<?php include_once(ROOT.DS.'views'.DS.'layouts'.DS.'footer_admin.php'); ?>


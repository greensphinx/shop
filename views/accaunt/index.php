<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'header.php') ?>
    <section>
        <div class="container">
            <div class="row">
                <h1>Личный кабинет</h1>

                <h3>Привет, <?=$user['name']?>!</h3>

                <ul>
                    <li><a href="/accaunt/edit">Редактировать данные</a></li>
                    <li><a href="/user/history">Список покупок</a></li>
                </ul>
            </div>
        </div>
    </section>
<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'footer.php') ?>
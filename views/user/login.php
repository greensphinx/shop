<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'header.php') ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php if(isset($errors) && is_array($errors)) { ?>
                        <ul>
                            <?php foreach($errors as $error) { ?>
                                <li> - <?=$error?></li>
                            <?php } ?>
                        </ul>
                    <?php } ?> <!-- endif -->
                    <div class="signup-form">
                        <h2>Авторизация</h2>
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="email" value="<?=$email?>">
                            <input type="password" name="password" placeholder="Пароль" value="<?=$password?>">
                            <input type="submit" name="submit" class="btn btn-default" value="Войти">
                        </form>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </section>
<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'footer.php') ?>
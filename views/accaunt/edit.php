<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'header.php') ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <!-- переменная $result из AccauntController -->
                    <?php if($result) { ?>
                        <p class="alert alert-success">Изменения сохранены.</p>
                    <?php } else { ?>
                        <?php if(isset($errors) && is_array($errors)) { ?>
                            <ul>
                                <?php foreach($errors as $error) { ?>
                                    <li> - <?=$error?></li>
                                <?php } ?><!-- endforeach -->
                            </ul>
                        <?php } ?> <!-- endif -->
                        <div class="signup-form">
                            <h2>Изменение данных:</h2>
                            <form action="#" method="post">
                                <p>Имя:</p>
                                <input type="text" name="name" placeholder="Имя" value="<?=$name?>">
                                <p>Пароль:  </p>
                                <input type="password" name="password" placeholder="Пароль" value="<?=$password?>">
                                <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                            </form>
                        </div>
                    <?php } ?><!-- endif -->
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </section>
<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'footer.php') ?>
<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'header.php') ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if ($result): ?>
                        <p>Спасибо. Сообщение отправлено! Мы ответим Вам на указанный email в кратчайшие сроки.</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="signup-form"><!--sign up form-->
                            <h2>Обратная связь</h2>
                            <h5>Есть вопрос? Напишите нам.</h5>
                            <br/>
                            <form action="#" method="post">
                                <p>Ваша почта</p>
                                <input type="email" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>"/>
                                <p>Сообщение</p>
                                <input type="text" name="userText" placeholder="Сообщение" value="<?php echo $userText; ?>"/>
                                <br/>
                                <input type="submit" name="submit" class="btn btn-default" value="Отправить" />
                            </form>
                        </div><!--/sign up form-->
                    <?php endif; ?>


                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>

<?php include(ROOT.DS.'views'.DS.'layouts'.DS.'footer.php') ?>
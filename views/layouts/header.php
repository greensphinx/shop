<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Главная</title>
    <link href="/templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="/templates/css/font-awesome.min.css" rel="stylesheet">
    <link href="/templates/css/prettyPhoto.css" rel="stylesheet">
    <link href="/templates/css/price-range.css" rel="stylesheet">
    <link href="/templates/css/animate.css" rel="stylesheet">
    <link href="/templates/css/main.css" rel="stylesheet">
    <link href="/templates/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/templates/js/html5shiv.js"></script>
    <script src="/templates/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/templates/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/templates/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/templates/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/templates/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/templates/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->


    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/uploads/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if(User::Guest()) { ?>
                            <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                            <li><a href="/user/register/"><i class="fa fa-users"></i> Регистрация</a></li>
                            <li><a href="/cart/"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
                            <?php } else { ?>
                            <li><a href="/accaunt/"><i class="fa fa-user"></i> Аккаунт</a></li>
                            <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                            <li><a href="/cart/"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
                            <span id="cart-count">(<?=Cart::countProductsInCart()?>)</span>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/">Главная</a></li>
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/catalog/">Каталог товаров</a></li>
                                    <li><a href="/cart/">Корзина</a></li>
                                </ul>
                            </li>
                            <li><a href="/blog/">Блог</a></li>
                            <li><a href="/about/">О магазине</a></li>
                            <li><a href="/contacts/">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->

</header><!--/header-->
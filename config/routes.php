<?php

return array(
    
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    
//    'catalog' => 'catalog/index', // actionIndex в CatalogController
    'category/([a-z]+)/page-([0-9]+)' => 'category/category/$1/$2',  // actionCategory в CategoryController
    'category/([a-z]+)' => 'category/category/$1',  // actionCategory в CategoryController

    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd in CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax in CartController
    'cart' => 'cart/index', // actionIndex in CartController

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'accaunt/edit' => 'accaunt/edit',
    'accaunt' => 'accaunt/index',

    //'contacts' => 'page/contact ',

    '' => 'page/index', // actionIndex в PageController
    
);

<?php

return array(
    
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController

    'category/([a-z]+)/page-([0-9]+)' => 'category/category/$1/$2',  // actionCategory в CategoryController
    'category/([a-z]+)' => 'category/category/$1',  // actionCategory в CategoryController

    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd in CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax in CartController
    'cart/checkout' => 'cart/checkout', // actionCheckout in CartController
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController
    'cart' => 'cart/index', // actionIndex in CartController

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'accaunt/edit' => 'accaunt/edit',
    'accaunt' => 'accaunt/index',

    'contacts' => 'page/contact',
//    'comment/AddComment/([0-9]+)' => 'comment/addComment/$1',

    // управление категориями
    'admin/category/create' => 'adminCategory/create', // create
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1', // update
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1', // delete
    'admin/category' => 'adminCategory/index', // read

    // управление товарами
    'admin/product/create' => 'adminProduct/create', // create
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1', // update
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1', // delete
    'admin/product' => 'adminProduct/index', // read

    // управление заказами
//    'admin/order/create' => 'adminOrder/create', // create
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1', // update
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1', // delete
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index', // read

    // админпанель
    'admin' => 'admin/index', // actionIndex in AdminController

//    'search' => 'page/search',

    '' => 'page/index', // actionIndex в PageController
    
);

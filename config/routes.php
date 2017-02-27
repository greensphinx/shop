<?php

return array(
    
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    
//    'catalog' => 'catalog/index', // actionIndex в CatalogController
    'category/([a-z]+)/page-([0-9]+)' => 'category/category/$1/$2',  // actionCategory в CategoryController
    'category/([a-z]+)' => 'category/category/$1',  // actionCategory в CategoryController

    'user/register' => 'user/register',

    '' => 'page/index', // actionIndex в PageController
    
);

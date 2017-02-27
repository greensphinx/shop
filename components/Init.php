<?php

    function __autoload($class_name)
    {
        $array_class = [
            'models',
            'components'
        ];

        foreach ($array_class as $path) {
            $path = ROOT.DS.$path.DS.$class_name.'.php';
            if(is_file($path)){
                include_once ($path);
            }
        }
    }
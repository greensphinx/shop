<?php

ini_set('display_errors',1);
error_reporting(E_ALL);



define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
require_once(ROOT.DS.'components'.DS.'Init.php');



$router = new Router();
$router->run();

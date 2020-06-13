<?php

use services\Autoloader;

require $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

$test = spl_autoload_register([new Autoloader(), 'loadClass']);
error_reporting(E_ALL);
ini_set('display_errors', 1);

$product = new models\Product();
var_dump($product);




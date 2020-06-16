<?php
//conf
require $_SERVER['DOCUMENT_ROOT'] . "/../config/pathHolder.php";
require PATH_ROOT . "services/Autoloader.php";
//end conf

//use
use app\services\Autoloader;
//end use


spl_autoload_register([new app\services\Autoloader(), 'loadClass']);
$requires = spl_autoload_register([new Autoloader(), 'loadClass']);

//HTML
$singleProduct = new \app\models\Product();

$test2 = $singleProduct->delete(4);
var_dump($test2);


//error
error_reporting(E_ALL);
ini_set('display_errors', 1);






<?php
//conf
require $_SERVER['DOCUMENT_ROOT'] . "/../config/pathHolder.php";
require PATH_ROOT . "services/Autoloader.php";
//end conf

//use
spl_autoload_register([new app\services\Autoloader(), 'loadClass']);
//end use

//sessinon block
$session = new \app\services\Session();
$session->session();
//session block end
var_dump($_SESSION);
//get url
$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";
//end url

//F test
//end F test

//HTML

if(class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->runAction($actionName);
}else {
    echo "<h1>Else. controllerClass:</h1>";
    var_dump($controllerClass);

}

//error
//error_reporting(E_ALL);
//ini_set('display_errors', 1);






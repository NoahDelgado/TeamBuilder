<?php

use Teambuilder\model\DB;
use Teambuilder\model\Member;
use Teambuilder\controller\HomeController;


require('model/config.php');
require('vendor/autoload.php');
DB::getPDO();

$_SESSION['userLog'] = Member::find(USER_ID);
$defaultControllerName = "HomeController";
$controllerName = null;

$task = 'index';
$defaultTask = "index";

if (!empty($_GET['controller'])) {
    $controllerName = ucfirst($_GET['controller']);
}

if (!empty($_GET['task'])) {
    $task = $_GET['task'];
}



$controllerName = "Teambuilder\controller\\" . $controllerName . 'Controller';

$controllerName = class_exists($controllerName) ? $controllerName : "Teambuilder\controller\\" . $defaultControllerName;

$controller = new $controllerName();
$controller->$task();

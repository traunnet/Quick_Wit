<?php
require_once '../MODEL/database.php';

$controller = 'rol';


if(!isset($_REQUEST['c']))
{
    require_once "../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['d']) ? $_REQUEST['d'] : 'Index';
    
    
    require_once "../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
 
    call_user_func( array( $controller, $accion ) );
}

?>


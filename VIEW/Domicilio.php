<?php
require_once '../MODEL/database.php';

$controller = 'domicilio';


if(!isset($_REQUEST['h']))
{
    require_once "../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    $controller = strtolower($_REQUEST['h']);
    $accion = isset($_REQUEST['i']) ? $_REQUEST['i'] : 'Index';
    
    
    require_once "../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
 
    call_user_func( array( $controller, $accion ) );
}

?>


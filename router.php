<?php
require_once './app/controller/rotiseria.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$RotiseriaController = new RotiseriaController();


// tabla de ruteo
switch ($params[0]) {
    case 'home':
        $RotiseriaController->showFoods();
        break;
    case 'add':
        $RotiseriaController->addFoods();
        break;
    case 'delete':
        // obtengo el parametro de la acción
        $id = $params[1];
        $RotiseriaController->deleteFoods($id);
        break;
   
    default:
        echo('404 Page not found');
        break;
}

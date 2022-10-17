<?php
require_once './app/controller/rotiseria.controller.php';
require_once './app/controller/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
session_start();

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();  
        break;
    case 'validation':
        $authController = new AuthController();
        $authController->validationUsers();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    
    case 'home':
        $RotiseriaController = new RotiseriaController();
        $RotiseriaController->showFood();
        break;
    case 'add':
        $RotiseriaController = new RotiseriaController();
        $RotiseriaController->addFoods();
        break;
    case 'delete':
        $RotiseriaController = new RotiseriaController();
        // obtengo el parametro de la acción
        $id = $params[1];
        $RotiseriaController->deleteFoods($id);
        break;
   
    default:
        echo('error por peton');
        break;
}

<?php
require_once './app/controller/rotiseria.controller.php';
require_once './app/controller/auth.controller.php';
require_once './app/controller/categorias.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
session_start();

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);
$RotiseriaController = new RotiseriaController();
$CategoryControler = new Cat_controller();
// tabla de ruteo
If ($params[0] != 'Admin' || !isset($_SESSION['IS_ADMIN'])) {
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
        
        $RotiseriaController->showFood();


        break;
    case 'add':
        
        $RotiseriaController->addFoods();
        break;
    case 'delete':
        
        // obtengo el parametro de la acción
        $id = $params[1];
        $RotiseriaController->deleteFoods($id);
        break;
    case 'details':
        $RotiseriaController = new RotiseriaController();
        $id = $params[1];
        $RotiseriaController->FoodDetails($id);
        break;
    case 'detailsCatFoods':
        $RotiseriaController = new RotiseriaController();
        $id = $params[1];
        $RotiseriaController->CatDetails($id);
        break;
    case 'showEdit':
        
        // obtengo el parametro de la acción
        $id = $params[1];
        $CategoryControler->showEditFoods($id);
        break;
    case'edit':
        $id = $params[1];
        $CategoryControler->EditFoods($id);
        break;
      

    case 'addCategories':

        $CategoryControler->addCategory();
        break;

    case'editCategory':
      
        $CategoryControler->EditCategoryFoods();
        break;
    case'deleteCategory':
        $id = $params[1];
        $CategoryControler->DeleteCategoryFoods($id);
        break;

    case'comidasDeEseTipo':
        $CategoryControler->formAddCategory();
        $CategoryControler->ListFoods();
        $CategoryControler->showEditCategoryFoods();
        break;
    default:
        echo('error por peton');
        break;
}
}
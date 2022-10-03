<?php
require_once './app/models/rotiseria.model.php';
require_once './app/views/rotiseria.view.php';

class TaskController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new RotiseriaModel();
        $this->view = new FoodsView();
    }

    public function showFoods() {
        $foods = $this->model->getAllFoods();
        $this->view->showFoods($foods);
    }

    
    function addTask() {
        // TODO: validar entrada de datos

        $name = $_POST['name'];
        $price = $_POST['price'];
        

        $id = $this->model->insertFoods($name, $price);

        header("Location: " . BASE_URL); 
    }
   
    

}
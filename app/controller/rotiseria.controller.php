<?php
require_once './app/model/rotiseria.model.php';
require_once './app/view/rotiseria.view.php';

class RotiseriaController {
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

    
    function addFoods() {
        // TODO: validar entrada de datos

        $name = $_POST['name'];
        $price = $_POST['price'];
        

        $id = $this->model->insertFoods($name, $price);

        header("Location: " . BASE_URL); 
    }
    
    function deleteFoods($id){
        $this->model->deleteFoodsById($id);
        header("Location: ". BASE_URL);
    }
   
    

}
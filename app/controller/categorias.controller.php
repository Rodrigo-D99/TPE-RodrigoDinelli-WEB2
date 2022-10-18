<?php
require_once './app/model/categorias.model.php';
require_once './app/view/categorias.view.php';

class Cat_controller{

    private $view;
    private $model;

    public function __construct(){
        $this->model= new Cat_model();
        $this->view= new Cat_view();
        
    }
    public function showCategory(){
        $products= $this->model->Get_Categ();
        $this->view->showCateg($products);
        
    
    }

}
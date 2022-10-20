<?php
require_once './app/model/categorias.model.php';
require_once './app/view/categorias.view.php';

class Cat_controller{

    private $view;
    private $model;
///////////////////////////////////////////////////
    public function __construct(){
        $this->model= new Cat_model();
        $this->view= new Cat_view();
        
    }
///////////////////////////////////////////////////
    public function showCategory(){
        $products= $this->model->Get_Categ();
        $this->view->showCateg($products);
        
    
    }
///////////////////////////////////////////////////
    public function showEditFoods($id){
        $products= $this->model->Get_Categ();
        $this->view->showEditFoods($id,$products);
      
    }
///////////////////////////////////////////////////
    public function EditFoods($id){
        $data = new stdClass();
          
            $data->names = $_POST['names'];//de las que existen en la bd    
            $data->descriptions = $_POST['descriptions'];
            $data->price = $_POST['price'];//nuevo
            $data->id_categories_fk= $_POST['id_categories_fk'];
        $this->model->updateFoods($data,$id);
        header("Location: ". BASE_URL);
    }
///////////////////////////////////////////////////
    public function showEditCategoryFoods(){
        $products= $this->model->Get_Categ();
        $this->view->showEditCategoryFoods($products);
      
    }  
///////////////////////////////////////////////////
    public function EditCategoryFoods(){
        $data = new stdClass();
            
            $data->names = $_POST['names'];
            $data->id_categories_fk= $_POST['id_categories_fk'];
           
        $this->model->updateCategoryFoods($data);
        header("Location: ". BASE_URL);
    }
///////////////////////////////////////////////////
    public function DeleteCategoryFoods($id){
        var_dump($id);
        $this->model->deleteCategoryById($id);
    
        
    }
///////////////////////////////////////////////////
    public function addCategory(){
        // TODO: validar entrada de datos
        $name = $_POST['names'];
        
        $id = $this->model->insertCategory($name);
        header("Location: ". BASE_URL);
    }
///////////////////////////////////////////////////
    public function formAddCategory(){
       
        $this->view->showAddCategoryFoods();
    }
///////////////////////////////////////////////////    
    public function ListFoods(){
        $lists = $this->model->Get_Categ();
        $this->view->ShowFoodsForCateg($lists);
    }
///////////////////////////////////////////////////
}
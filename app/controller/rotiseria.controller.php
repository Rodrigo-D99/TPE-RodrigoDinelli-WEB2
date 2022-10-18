<?php
require_once './app/model/rotiseria.model.php';
require_once './app/model/categorias.model.php';
require_once './app/view/rotiseria.view.php';

class RotiseriaController {
    private $model;
    private $view;
    private $model_cat;

    public function __construct() {
        $this->model = new RotiseriaModel();
        $this->view = new FoodsView();  
        $this->model_cat = new Cat_model();
    }

        public function showFood() {
        $foods = $this->model->getAllFoods();
        $products= $this->model_cat->Get_Categ();
        $this->view->showFoods($foods,$products);
        }
        
    function addFoods() {
        // TODO: validar entrada de datos
       

        $name = $_POST['names'];
        $price = $_POST['price'];
        $id_categories_fk= $_POST['id_categories_fk'];
        $descriptions=$_POST['descriptions'];
        

        $id = $this->model->insertFoods($name, $price, $id_categories_fk,$descriptions);
        
        header("Location: ". BASE_URL);
        
 
    }
    
    function deleteFoods($id){
        $this->model->deleteFoodsById($id);
        header("Location: ". BASE_URL);
    }


    function showEditFoods($id){
        $products= $this->model_cat->Get_Categ();
        $this->view->showEditFoods($id,$products);
      
    }
    function EditFoods($id){
        $data = new stdClass();
          
            $data->names = $_POST['names'];//de las que existen en la bd    
            $data->descriptions = $_POST['descriptions'];
            $data->price = $_POST['price'];//nuevo
            $data->id_categories_fk= $_POST['id_categories_fk'];
        $this->model->updateFoods($data,$id);
        header("Location: ". BASE_URL);
    }
    function showEditCategoryFoods(){
        $products= $this->model_cat->Get_Categ();
        $this->view->showEditCategoryFoods($products);
      
    }
    

    function EditCategoryFoods(){
        $data = new stdClass();
            
            $data->names = $_POST['names'];
            $data->id_categories_fk= $_POST['id_categories_fk'];
           
        $this->model->updateCategoryFoods($data);
        header("Location: ". BASE_URL);
    }

    function addCategory(){
        // TODO: validar entrada de datos
       

        $name = $_POST['names'];
        
        $id = $this->model->insertCategory($name);
        
        header("Location: ". BASE_URL);
        
 
    }
}
<?php
require_once './app/views/foods.view.php';
require_once './app/models/foods.model.php';
require_once './app/models/categories.model.php';
require_once './app/helpers/auth.helper.php';

class ProdController{
    private $view;
    private $model;
    private $categoriesModel;
    private $authHelper;
   

    function __construct(){
        $this->view = new ProdView();
        $this->model = new ProdModel();
        $this->categoriesModel = new CategoriesModel();
        $this->authHelper = new AuthHelper();
    }

    function showHome(){
        $categories = $this->categoriesModel->getAll();
        $products = $this->model->getAll();
         $this->view->products($products, $categories);
    }

    function showDetail($id){
        $item = $this->model->getItem($id);
        $this->view->detail($item);
    }

    function showFiltered(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $categories = $this->categoriesModel->getAll();
            $products = $this->model->filter($id);
            if(empty($products)){
                $this->view->error('No hay productos disponibles para esta categoria :('); 
            }else{
                foreach ($categories as $category) {
                    if($products[0]->id_category_fk == $category->id_category){
                        $actualCategory = $category->category;
                        $this->view->filtered($products, $categories, $actualCategory); 
                    }
                }
            }
        }
    }


    //Edición de productos para el admin

    function showEditProds(){
        $isLogged = $this->authHelper->checkLoggedIn();
        if($isLogged){
            $categories = $this->categoriesModel->getAll();
            $products = $this->model->getAll();
            $this->view->editProducts($products, $categories);
        }
    }

    function adminProduct($params){
        $isLogged = $this->authHelper->checkLoggedIn();
        if($isLogged){
            switch($params){
                case 'delete':
                    $this->deleteProduct();

                    break;
                case 'add':
                    $this->addProduct();

                    break;    
                case 'update':
                    $this->updateProduct();
                    break;
            }
        }
    }

    function deleteProduct(){
        $id = $_POST['id'];
        $this->model->delete($id);
        header("Location: " . PRODUCTS);
    }

    function updateProduct(){
        if(!empty($_POST)){
            $id = $_POST['id'];
            $product = $_POST['product'];
            $category = $_POST['category'];
            $descriptions = $_POST['description'];
            $price = $_POST['price'];
            $this->model->update($id, $product,$price, $descriptions, $category);
            header("Location: " . PRODUCTS);
          
        }
    }

    function addProduct(){
        if(!empty($_POST['product']) && !empty($_POST['category']) && !empty($_POST['description'])&& !empty($_POST['price'])){
            $product = $_POST['product'];
            $category = $_POST['category'];
            $descriptions = $_POST['description'];
            $price = $_POST['price'];
            $this->model->add($product, $price, $descriptions, $category);
            header("Location: " . PRODUCTS);
        }
        else{
            echo "Por favor, llene los campos";
                header("Location: " . PRODUCTS);
        }
    }

}

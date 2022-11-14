<?php

require_once './app/views/categories.view.php';
require_once './app/models/categories.model.php';
require_once './app/helpers/auth.helper.php';




class CategoriesController{
    private $view;
    private $model;
    private $authHelper;

    function __construct(){
        $this->view = new CategoriesView();
        $this->model = new CategoriesModel();
        $this->authHelper = new AuthHelper();

    }

    function showCategories(){
        $isLogged = $this->authHelper->checkLoggedIn();
        if($isLogged){
            $categories = $this->model->getAll();
            $this->view->categories($categories); 
        }     
    }

    function adminCategory($params){
        $isLogged = $this->authHelper->checkLoggedIn();
        if($isLogged){
            switch($params){
                case 'delete':
                    $this->deleteCategory();
                    break;
                case 'add':
                    $this->addCategory();
                    break;    
                case 'update':
                    $this->updateCategory();
                    break;
            }
        }
    }

    function deleteCategory(){
     
        $id = $_POST['id'];
        $this->model->delete($id);
        header("Location: " . CATEGORIES); 

    }

    function updateCategory(){
        if(!empty($_POST['category'])){
        $this->model->update($_POST['category'], $_POST['id']);
        header("Location: " . CATEGORIES);
        }
        else{
            header("Location: " . CATEGORIES);
        }

    }

    function addCategory(){
        if(!empty($_POST['category'])){
            $category = $_POST['category'];
            $this->model->add($category);
            header("Location: " . CATEGORIES);
        }
        else{
            header("Location: " . CATEGORIES);
        }
    }

}
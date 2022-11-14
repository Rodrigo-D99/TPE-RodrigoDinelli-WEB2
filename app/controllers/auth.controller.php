<?php

require_once './app/views/login.view.php';
require_once './app/models/user.model.php';
require_once './helpers/auth.helper.php';




class AuthController{
    private $view;
    private $model;
    private $authHelper;

    function __construct(){
        $this->view = new LoginView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }


    function showLogin(){
        $this->view->login();
    }

    function login(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->user($email);

            if($user && password_verify($password, ($user->password))){
                $this->authHelper->login($user);
                header("Location: " . BASE_URL); 
                
            }else{
                $this->view->login('Usuario inválido');
            } 
        }
    }

    function logout(){
        $this->authHelper->logout(); 
    }
}
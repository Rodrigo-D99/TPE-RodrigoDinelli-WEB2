<?php 
require_once './app/view/auth.view.php';
require_once './app/model/user.model.php';

class AuthController{
    private $view;
    private $model;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new authView();
        
    }

    public function showFormLogin(){
        $this->view->showFormLogin();
    }

    public function validationUsers(){

        $email=$_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->getUserByEmail($email);

        if($user && password_verify($password, $user->password)){

            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_ADMIN']=true;
            header("Location: " . BASE_URL);

        }

        else{
            $this->view->showFormLogin("El usuario o la contraseña no existe.");
        }
    }

    public function logout(){
        session_start();
        session_destroy();

        header("Location: " . BASE_URL);
    }

}
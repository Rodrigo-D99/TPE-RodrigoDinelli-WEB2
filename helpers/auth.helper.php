<?php


class AuthHelper{

    function __construct(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    function login($user){
        $_SESSION['USER_ID'] = $user->id_user;
        $_SESSION['USER_EMAIL'] = $user->email;

    }

    function checkLoggedIn(){
        if(!empty($_SESSION['USER_ID'])){
            return true;
        }else{
            header("Location: " . BASE_URL); 
            return false;
        }    
    }

    function logout(){
        session_destroy();
        header("Location: " . BASE_URL); 
    }

}
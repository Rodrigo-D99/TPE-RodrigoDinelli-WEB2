<?php

class AuthHelper {

     /**
     * Verifica que el user este logueado y si no lo está
     * lo redirige al login.
     */
    public function __construct()
    {
        session_start();
    }
    public function checkLoggedIn() {
        
        if (!isset($_SESSION['IS_ADMIN'])) {
            header("Location: " . BASE_URL );
            die();
        }
    } 
}
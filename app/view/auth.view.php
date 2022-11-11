<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class authView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicio Smarty
    }
///////////////////////////////////////////////////
    function showFormLogin($error=null) {
        // asigno variables al tpl smarty
       $this->smarty->assign("error", $error);
         // mostrar el tpl
       $this->smarty->display('FormLogin.tpl');
        
    }
///////////////////////////////////////////////////
}
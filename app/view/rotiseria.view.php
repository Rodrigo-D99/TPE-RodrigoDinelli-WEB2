<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class FoodsView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showFoods($foods) {
        // asigno variables al tpl smarty
        $this->smarty->assign('count', count($foods)); 
        $this->smarty->assign('foods', $foods);

      /**
       *   // mostrar el tpl
       * $this->smarty->display('taskList.tpl');
        */ 
    }
}
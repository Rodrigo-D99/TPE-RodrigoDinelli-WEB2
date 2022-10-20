<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class FoodsView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicio Smarty
    }
///////////////////////////////////////////////////
    function showFoods($foods, $products) {
        // asigno variables al tpl smarty
        if (isset($products)) {
            $this->smarty->assign('products',$products); 
        }
        $this->smarty->assign('count', count($foods)); 
        $this->smarty->assign('foods', $foods);

      
         // mostrar el tpl
       $this->smarty->display('rotiseria.tpl');
        
    }
///////////////////////////////////////////////////   
}
<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';


class Cat_view{
private $smarty;

public function __construct(){
    $this->smarty = new Smarty();
}
    function showCateg($products){
        var_dump($products);
        $this->smarty->assing('products',$products);
        $this->smarty->display('rotiseria.tpl');
    }


}
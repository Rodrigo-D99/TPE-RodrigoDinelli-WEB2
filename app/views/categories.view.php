<?php

include_once './libs/smarty-4.2.1/libs/Smarty.class.php';


class CategoriesView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function categories($categories){
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('editCategories.tpl');   
    }
}
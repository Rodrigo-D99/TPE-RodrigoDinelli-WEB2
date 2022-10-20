<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';


class Cat_view{
private $smarty;

public function __construct(){
    $this->smarty = new Smarty();
}
///////////////////////////////////////////////////
    public function showCateg($products){
        var_dump($products);
        $this->smarty->assing('products',$products);
        $this->smarty->display('rotiseria.tpl');
    }
///////////////////////////////////////////////////
    public function showEditFoods($id,$products){
        if (isset($products)) {

            $this->smarty->assign('products',$products); 
        }
        
        $this->smarty->assign('id', $id);
        $this->smarty->display('formEdit.tpl');
    }
///////////////////////////////////////////////////
    public function showEditCategoryFoods($products){
        $this->smarty->assign('action','editCategory');
        $this->smarty->assign('products',$products); 
        
        $this->smarty->display('formCategories.tpl');
    }
///////////////////////////////////////////////////
    public function ShowFoodsForCateg($lists){
       
        $this->smarty->assign('lists',$lists); 
        
        $this->smarty->display('listFoods.tpl');
    }
///////////////////////////////////////////////////
public function showAddCategoryFoods(){
    
    $this->smarty->assign('action','addCategories');
     
    $this->smarty->display('header.tpl');
    $this->smarty->display('formCategories.tpl');
}
}
<?php

include_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class ProdView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function products($products, $categories){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('home.tpl');
    }

    function filtered($products, $categories, $category){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('category', $category);
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('filter.tpl');
    }

    function error($error){
        $this->smarty->assign('error', $error);
        $this->smarty->display('error.tpl');
    }

    function detail($item){
        $this->smarty->assign('item', $item);   
        $this->smarty->display('item.tpl');

    }

    function editProducts($products, $categories){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('editProducts.tpl');
    }

}
<?php

class Cat_model{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_rotiseria;charset=utf8', 'root', '');
    }

    public function Get_Categ(){
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
}
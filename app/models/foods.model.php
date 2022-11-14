<?php

require_once './app/helpers/database.helper.php';
class ProdModel{
    private $db;

    function __construct(){
        $this->db = $this->db = DataBase::dataBase();
       
    }

    function getAll(){
        
        $query = $this->db->prepare('SELECT a.*, b.* FROM foods a INNER JOIN categories b ON a. id_category_fk = b. id_category');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    function getItem($id){
        $query = $this->db->prepare('SELECT a.*, b.* FROM foods a INNER JOIN categories b ON a. id_category_fk = b. id_category WHERE id = ?');
        $query->execute(array($id));
        $item = $query->fetch(PDO::FETCH_OBJ);

        return $item;
    }

    function delete($id){
        $query = $this->db->prepare('DELETE FROM foods WHERE id =?');
        $query->execute(array($id));
        var_dump($query->errorInfo());

    }

    function update($id, $product,$price, $descriptions, $category){
        $query = $this->db->prepare('UPDATE foods SET names =?, price=?, descriptions =?, id_category_fk =? WHERE id =?');
        $query->execute(array($product,$price, $descriptions, $category, $id));
        var_dump($query->errorInfo());

    }

    function add($product,$price, $descriptions, $category){
        $query = $this->db->prepare('INSERT INTO foods(names, price, descriptions, id_category_fk) VALUES(?,?,?,?)');
        $query->execute(array($product,$price, $descriptions, $category));
        var_dump($query->errorInfo());

    }


    function filter($id_category){
        $query = $this->db->prepare('SELECT * FROM foods WHERE id_category_fk =?');
        $query->execute(array($id_category));
        $products = $query->fetchAll(PDO::FETCH_OBJ);
       
        return $products;
    }
}
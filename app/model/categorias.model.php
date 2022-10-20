<?php

class Cat_model{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_rotiseria;charset=utf8', 'root', '');
    }
///////////////////////////////////////////////////
    public function Get_Categ(){
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
///////////////////////////////////////////////////
    public function insertCategory($name) {
        
        $query = $this->db->prepare("INSERT INTO categories (names) VALUES (?)");
        
        $query->execute([$name]);

        return $this->db->lastInsertId();
        
    }
///////////////////////////////////////////////////    
    public function updateCategoryFoods($data) {
        
        $query = $this->db->prepare("UPDATE categories SET names = ? WHERE id_category =?");
        
        $query->execute([$data->names,$data->id_categories_fk]);

        
    }
///////////////////////////////////////////////////
    public function updateFoods($data,$id) {
        
        $query = $this->db->prepare("UPDATE foods SET names = ?, price=? ,id_category_fk=?,descriptions=? WHERE id=?");
        
        $query->execute([$data->names,$data->price,$data->id_categories_fk,$data->descriptions,$id]);

        
    }
///////////////////////////////////////////////////
    function deleteCategoryById($id) {
        $query = $this->db->prepare('DELETE FROM categories WHERE id_category = ?');
        $query->execute([$id]);
    }
}
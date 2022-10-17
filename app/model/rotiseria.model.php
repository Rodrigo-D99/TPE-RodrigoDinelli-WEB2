<?php

class RotiseriaModel{
    private $db;


    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_rotiseria;charset=utf8', 'root', '');
    }

    public function getAllFoods(){     
        $query = $this->db->prepare("SELECT foods.*,categories.names as producto, categories.descriptions  FROM foods JOIN categories ON foods.id_category_fk = categories.id_category");
        $query->execute();
        $foods = $query->fetchAll(PDO::FETCH_OBJ);
         
        return $foods;
    }
    
    /**
     * Inserta una comida en la base de datos.
     */
    public function insertFoods($name, $price, $id_category_fk) {
        
        $query = $this->db->prepare("INSERT INTO foods(names, price, id_category_fk) VALUES (?, ?,?)");
        
        $query->execute([$name, $price, $id_category_fk]);

        return $this->db->lastInsertId();
        
    }


    
    //Elimina una comida dado su id.
    
   function deleteFoodsById($id) {
       $query = $this->db->prepare('DELETE FROM foods WHERE id = ?');
        $query->execute([$id]);
    }

    /* public function updateFoods($id) {
        
        $query = $this->db->prepare("UPDATE foods WHERE ID=?");
        
        $query->execute([$id]);

        return $this->db->lastInsertId();
        
    }*/
}

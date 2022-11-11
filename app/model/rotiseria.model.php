<?php

class RotiseriaModel{
    private $db;


    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_rotiseria;charset=utf8', 'root', '');
    }
///////////////////////////////////////////////////
    public function getAllFoods(){     
        $query = $this->db->prepare("SELECT foods.*,categories.names as product FROM foods JOIN categories ON foods.id_category_fk = categories.id_category");
        $query->execute();
        $foods = $query->fetchAll(PDO::FETCH_OBJ);
         
        return $foods;
    }
///////////////////////////////////////////////////
    public function detailsFoods($id){
        $query = $this->db->prepare('SELECT * FROM foods WHERE id = ?');
        $query->execute([$id]);
        $FoodDetail=$query->fetchAll(PDO::FETCH_OBJ);
        foreach ($FoodDetail as $details) {
            $query = $this->db->prepare('SELECT * FROM categories WHERE id_category = ?');
            $query->execute([$details->id_category_fk]);
            $category = $query->fetch(PDO::FETCH_OBJ);
            $details->id_category_fk=$category->names;
            //var_dump($equipo);
        }
        return $FoodDetail;
    }
///////////////////////////////////////////////////
    public function detailsCatFoods($id){
        $query = $this->db->prepare('SELECT * FROM foods WHERE id_category_fk = ?');
        $query->execute([$id]);
        $CatDetail=$query->fetchAll(PDO::FETCH_OBJ);
        return $CatDetail;
    }
///////////////////////////////////////////////////    
    /**
     * Inserta una comida en la base de datos.
     */
    public function insertFoods($name, $price, $id_category_fk,$descriptions) {
        
        $query = $this->db->prepare("INSERT INTO foods(names, price, id_category_fk,descriptions) VALUES (?,?,?,?)");
        
        $query->execute([$name, $price, $id_category_fk,$descriptions]);

        return $this->db->lastInsertId();
        
    }
///////////////////////////////////////////////////   
    //Elimina una comida dado su id.
    
    function deleteFoodsById($id) {
        $query = $this->db->prepare('DELETE FROM foods WHERE id = ?');
         $query->execute([$id]);
     }


  
    
}

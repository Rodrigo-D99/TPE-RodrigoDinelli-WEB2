<?php

class RotiseriaModel{
    private $db;


    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_rotiseria;charset=utf8', 'root', '');
    }

    public function getAllFoods(){
        $query = $this->db->prepare("SELECT * FROM foods");
        $query->execute();
        $foods = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $foods;
    }
    /**
     * Inserta una tarea en la base de datos.
     */
    public function insertFoods($name, $price) {
        $query = $this->db->prepare("INSERT INTO foods (name, price) VALUES (?, ?)");
        $query->execute([$name, $price]);

        return $this->db->lastInsertId();
    }


    /**
     * Elimina una tarea dado su id.
    *
    *function deleteTaskById($id) {
    *    $query = $this->db->prepare('DELETE FROM foods WHERE id = ?');
    *    $query->execute([$id]);
    *}

    *public function finalize($id) {
     *   $query = $this->db->prepare('UPDATE task SET finalizada = 1 WHERE id = ?');
    *    $query->execute([$id]);
   *     // var_dump($query->errorInfo()); // y eliminar la redireccion
  *  }
*/
}   
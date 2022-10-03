<?php

class RotiseriaModel{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_rotiseria;charset=utf8', 'root', '')
    }

    public function getAllFoods(){
        $query = $this->db->prepare("SELECT * FORM foods");
        $query->execute();
        $foods = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $foods
    }





}   
<?php

class DataBase{
    private $db;

    static function dataBase(){
        return new PDO('mysql:host=localhost;'.'dbname=db_rotiseria;charset=utf8', 'root', '',array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
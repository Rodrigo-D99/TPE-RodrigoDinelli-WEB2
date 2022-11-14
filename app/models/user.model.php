<?php 

class UserModel{
    private $db;

    function __construct(){
        $this->db=new PDO('mysql:host=localhost;'.'dbname=db_rotiseria;charset=utf8', 'root', '');
    }

    function user($email){
        $query = $this->db->prepare('SELECT * FROM users WHERE email =?');
        $query->execute(array($email));
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
}
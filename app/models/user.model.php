<?php 
require_once './app/helpers/database.helper.php';
class UserModel{
    private $db;

    function __construct(){
        
        $this->db = $this->db = DataBase::dataBase();
    }

    function user($email){
        $query = $this->db->prepare('SELECT * FROM users WHERE email =?');
        $query->execute(array($email));
        var_dump($query->errorInfo());
        $user = $query->fetch(PDO::FETCH_OBJ);
        
        return $user;
    }
}
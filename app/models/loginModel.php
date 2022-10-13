<?php

class LoginModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libreria;charset=utf8', 'root', '');
    }

    function getUser($email){
        $query= $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute([$email]);
        $user= $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }


}    
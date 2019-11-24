<?php
class Admin{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAdmin($email, $password){
        $this->db->query("SELECT * FROM admin WHERE email = :email AND password = :password LIMIT 1");
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);

        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}
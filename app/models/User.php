<?php
class User{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function addUser($patient_type, $patient_email ){
        $token = hash('md5', $patient_email);
        $this->db->query("INSERT INTO users (email, token, patient_type) VALUES (:email, :token, :patient_type)");
        $this->db->bind(':email', $patient_email);
        $this->db->bind(':token', $token);
        $this->db->bind(':patient_type', $patient_type);

        $this->db->execute();
    }

    public function getUsers(){
        $this->db->query("SELECT * FROM users");

        $row = $this->db->single();
        // Check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}
<?php
class User{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    // add one user to users table
    public function addUser($patient_type, $patient_email ){
        $token = hash('md5', $patient_email);
        $this->db->query("INSERT INTO users (email, token, patient_type) VALUES (:email, :token, :patient_type)");
        $this->db->bind(':email', $patient_email);
        $this->db->bind(':token', $token);
        $this->db->bind(':patient_type', $patient_type);

        
        $this->db->execute();

        // Send email to user with the register link...
        
    }

    // get all the users
    public function getUsers(){
        $this->db->query("SELECT * FROM users");

        return $this->db->resultSet();
    }

    public function getUserByToken($token){
        $this->db->query('SELECT * FROM users WHERE token=:token LIMIT 1');
        $this->db->bind(':token', $token);
        // Execute the query
        $this->db->execute();
        // return the numbers of rows that have been matched
        return $this->db->single();
    }

    public function confirmUser($fn, $ln, $p, $id){
        try{
            $this->db->query(
                "UPDATE users 
                SET first_name=:first_name, last_name=:last_name, password=:password, status=:status
                WHERE id=:id"
                );
            $this->db->bind(':first_name', $fn);
            $this->db->bind(':last_name', $ln);
            $this->db->bind(':password', $p);
            $this->db->bind(':status', 1);
            $this->db->bind(':id', $id);
    
            $this->db->execute();

            // if successfull redirect to homepage
            header("Location:".URLROOT);
        }catch(\Throwable $e){
            die($e->getMessage());
        }
        
    }





}//end of User Model
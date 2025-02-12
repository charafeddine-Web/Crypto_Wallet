<?php
class User {
    private $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }
    public function check_email_or_nexusID($data){
        if (is_numeric($data)) {
            
            $this->conn->query("SELECT id FROM users WHERE id= :input ");
        } else {
            $this->conn->query("SELECT id FROM users WHERE email= :input ");
        }
    
        
        $this->conn->bind(':input',$data);
        
         $this->conn->execute();
         return $this->conn->single();

    }

}
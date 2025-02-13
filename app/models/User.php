<?php
class User {
    private $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }
    public function check_email_or_nexusID($data){
        // var_dump($data);
        // return $data;
        if (is_numeric($data)) {
            
            $this->conn->query("SELECT nexusid FROM users WHERE nexusid= :input");
        } else {
            $this->conn->query("SELECT nexusid FROM users WHERE email= :input");
        }
    
        
        $this->conn->bind(':input',$data);
        
         $this->conn->execute();
         return $this->conn->single();

    }

}
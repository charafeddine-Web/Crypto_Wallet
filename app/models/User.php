<?php
class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function check_email_or_nexusID($data){
        // var_dump($data);
        // return $data;
        if (is_numeric($data)) {

            $this->db->query("SELECT nexusid FROM users WHERE nexusid= :input");
        } else {
            $this->db->query("SELECT nexusid FROM users WHERE email= :input");
        }


        $this->db->bind(':input',$data);

        $this->db->execute();
        return $this->db->single();

    }
    public function register($data)
    {
        try {
            $query = "INSERT INTO users (nom, prenom, email, mot_de_pass, is_active, verification_code) 
                  VALUES (:firstname, :lastname, :email, :password, :is_active, :verification_code)";
            $this->db->query($query);
            $this->db->bind(':firstname', $data['firstname']);
            $this->db->bind(':lastname', $data['lastname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':is_active', $isActive = 0); // Default value for is_active
            $this->db->bind(':verification_code', $data['verification_code']);
            $this->db->execute();
            // Execute the statement
            return   $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error registering user: " . $e->getMessage());
            return false;
        }
    }

    public function activateAccount($email)
    {
        try {
            $this->db->query("UPDATE users SET is_active = '1' WHERE email = :email");
            $this->db->bind(':email', $email);
            return $this->db->execute();
        } catch (PDOException $e) {
            error_log("Error activating account: " . $e->getMessage());
            return false;
        }
    }

    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $this->db->execute();
        return $this->db->single();
    }

    public function createWallet($userId)
    {
        $this->db->query("INSERT INTO portefeuille (soldUSDT, user_id) VALUES (0.0, :user_id)");
        $this->db->bind(':user_id', $userId);
        return $this->db->execute();
    }
}
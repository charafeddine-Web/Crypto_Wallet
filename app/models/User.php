<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
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

            // Execute the statement
            return  $this->db->execute();
        } catch (PDOException $e) {
            error_log("Error registering user: " . $e->getMessage());
            return false;
        }
    }

    public function activateAccount($email)
    {
        try {
            $query = "UPDATE users SET is_active = 1 WHERE email = ?";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$email]); // Fixed execution
        } catch (PDOException $e) {
            error_log("Error activating account: " . $e->getMessage());
            return false;
        }
    }
}

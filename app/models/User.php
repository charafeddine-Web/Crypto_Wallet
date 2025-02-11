<?php
class User
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function register($data)
    {
        session_start();
        try {
            // Vérifier si l'email existe déjà
            $this->db->query("SELECT id FROM users WHERE email = ?");
            $stmt=$this->db->execute([$data['email']]);

            if ($stmt->rowCount() > 0) {
                $_SESSION["session_error"] = "This email is already in use.";
                return false;
            }

            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

            $stmt = $this->db->query("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
            return $this->db->execute([$data['firstname'], $data['lastname'], $data['email'], $hashedPassword]);
        } catch (PDOException $e) {
            return "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
}
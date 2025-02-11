<?php
class User
{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function register($data)
    {
        session_start();
        try {
            // Vérifier si l'email existe déjà
            $query="SELECT id FROM users WHERE email = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data['email']);

            if ($stmt->rowCount() > 0) {
                $_SESSION["session_error"]="Cet email est déjà utilisé.";
                return false;
            }
            $hashedPassword = password_hash($data['$password'], PASSWORD_BCRYPT);

            $stmt = $this->db->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bindParam('s', $data['firstname']);
            $stmt->bindParam('s', $data['lastname']);
            $stmt->bindParam('s', $data['email']);
            $stmt->bindParam('s', $data['password']);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
//            return "Inscription réussie !";
        } catch (PDOException $e) {
            return "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
}
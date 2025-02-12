<?php

class TransactionModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    

    public function getUserByNexusOrEmail($identifier) {
        $this->db->query("SELECT NexusId FROM User WHERE NexusId = :identifier OR email = :identifier");
        $this->db->bind(":identifier", $identifier);
        return $this->db->single();
    }

    public function hasSufficientBalance($userId, $cryptoId, $amount) {
        $this->db->query("SELECT montant FROM Portefeuille_Crypto WHERE user_id = :userId AND id_cryptomonnaie = :cryptoId");
        $this->db->bind(":userId", $userId);
        $this->db->bind(":cryptoId", $cryptoId);
        $result = $this->db->single();

        return ($result && $result->montant >= $amount);
    }

    public function debitSender($userId, $cryptoId, $amount) {
        $this->db->query("UPDATE Portefeuille_Crypto SET montant = montant - :amount WHERE user_id = :userId AND id_cryptomonnaie = :cryptoId");
        $this->db->bind(":amount", $amount);
        $this->db->bind(":userId", $userId);
        $this->db->bind(":cryptoId", $cryptoId);
        return $this->db->execute();
    }

    public function creditReceiver($userId, $cryptoId, $amount) {
        $this->db->query("INSERT INTO Portefeuille_Crypto (user_id, id_cryptomonnaie, montant) 
            VALUES (:userId, :cryptoId, :amount)
            ON CONFLICT (user_id, id_cryptomonnaie) DO UPDATE 
            SET montant = Portefeuille_Crypto.montant + EXCLUDED.montant");

        $this->db->bind(":amount", $amount);
        $this->db->bind(":userId", $userId);
        $this->db->bind(":cryptoId", $cryptoId);
        return $this->db->execute();
    }

    public function createTransaction($senderId, $receiverId, $amount) {
        $this->db->query("INSERT INTO transaction (montant, sender_id, receiver_id, date) VALUES (:amount, :sender, :receiver, NOW())");
        $this->db->bind(":amount", $amount);
        $this->db->bind(":sender", $senderId);
        $this->db->bind(":receiver", $receiverId);
        return $this->db->execute();
    }
    public function getTransactionsByUser($userId) {
        $this->db->query("
            SELECT 
                t.idTransaction, 
                t.montant AS amount,
                u1.nom AS sender,
                u2.nom AS receiver,
                t.receiver_id,
                t.status,
                c.symbol AS crypto_symbol,
                t.date
            FROM transaction t
            JOIN User u1 ON t.sender_id = u1.NexusId
            JOIN User u2 ON t.receiver_id = u2.NexusId
            JOIN Cryptos c ON t.crypto_id = c.id
            WHERE t.sender_id = :userId OR t.receiver_id = :userId
            ORDER BY t.date DESC
        ");
    
        $this->db->bind(':userId', $userId);
        return $this->db->resultSet();
    }
    


    // redposition in class user 
    // public function history() {
    //     $userId = $_SESSION['user_id'];
    //     $transactions = $this->transactionModel->getUserTransactions($userId);
    //     $this->view('transactions/history', ['transactions' => $transactions]);
    // }
    
}

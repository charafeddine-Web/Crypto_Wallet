<?php

Class Crypto {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //METHODE TO BUY CRYPTO USING USDT
    public function buyCrypto($user_id, $crypto_amount, $crypto_price) {
        try {
            // Start a transaction to ensure data consistency
            $this->db->beginTransaction();

            // Fetch the user's current balance
            $this->db->query("SELECT solde FROM Portefeuille WHERE user_id = :user_id");
            $this->db->bind(':user_id', $user_id);
            $solde = $this->db->single();

            if ($this->db->rowCount() > 0) {
                $current_balance = $solde['solde'];

                // Calculate the total cost of the crypto purchase
                $total_cost = $crypto_amount * $crypto_price;

                // Check if the user has enough balance
                if ($current_balance >= $total_cost) {
                    // Deduct the cost from the user's balance
                    $new_balance = $current_balance - $total_cost;
                    $this->db->query("UPDATE Portefeuille SET solde = :new_balance WHERE user_id = :user_id");
                    $this->db->bind(':new_balance', $new_balance);
                    $this->db->bind(':user_id', $user_id);
                    $this->db->execute();

                    // Insert the crypto purchase into a transactions table (example)
                    $this->db->query("INSERT INTO Transactions (user_id, crypto_amount, crypto_price, total_cost, transaction_date) VALUES (:user_id, :crypto_amount, :crypto_price, :total_cost, NOW())");
                    $this->db->bind(':user_id', $user_id);
                    $this->db->bind(':crypto_amount', $crypto_amount);
                    $this->db->bind(':crypto_price', $crypto_price);
                    $this->db->bind(':total_cost', $total_cost);
                    $this->db->execute();

                    // Commit the transaction
                    $this->db->commit();

                    return "Crypto purchase successful!";
                } else {
                    // Rollback the transaction if the user doesn't have enough balance
                    $this->db->rollBack();
                    return "Insufficient balance to complete the purchase.";
                }
            } else {
                // Rollback the transaction if the user doesn't exist
                $this->db->rollBack();
                return "User not found.";
            }
        } catch (Exception $e) {
            // Rollback the transaction in case of any error
            $this->db->rollBack();
            return "Error: " . $e->getMessage();
        }
    }

}

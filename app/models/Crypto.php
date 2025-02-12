<?php

Class Crypto {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //METHODE TO BUY CRYPTO USING USDT
    public function buyCrypto($data) {
        try {
            $this->db->query("SELECT soldusdt FROM portefeuille WHERE user_id = 1");
            $solde = $this->db->single();

            if ($this->db->rowCount() > 0) {
                $current_balance = $solde->soldusdt;

                $total_cost = $data['amount'] * $data['price'];

                if ($current_balance >= $total_cost) {
                    $new_balance = $current_balance - $total_cost;
                    $this->db->query("UPDATE portefeuille SET soldusdt = :new_balance WHERE user_id = 1");
                    $this->db->bind(':new_balance', $new_balance);
                    $this->db->execute();

                    if($this->updateCrypto(1, $data['crypto_name'], $data['amount'])) {
                        echo "Crypto purchase successful!";
                    }
                } else {
                    echo "Insufficient balance to complete the purchase.";
                }
            } else {
                return "User not found.";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function updateCrypto($user_id, $crypto_name, $amount) {
        try {

            $this->db->query("SELECT * FROM cryptowallet WHERE user_id = 1 AND nom = :crypto_name");
            $this->db->bind(':crypto_name', 'btc');
            $crypto = $this->db->single();

            if ($this->db->rowCount() > 0) {
                $new_amount = $crypto->amount + $amount; // Add the new amount to the existing amount
                $this->db->query("UPDATE cryptowallet SET total_supply = :new_amount WHERE user_id = 1 AND nom = :crypto_name");
                $this->db->bind(':new_amount', $new_amount);
                $this->db->bind(':crypto_name', $crypto_name);
                $this->db->execute();
                header("location:".URLROOT."/test");
            } else {
                $this->db->query("INSERT INTO cryptowallet (user_id, crypto_name, amount) VALUES (1, :crypto_name, :amount)");
                $this->db->bind(':crypto_name', $crypto_name);
                $this->db->bind(':amount', $amount);
                $this->db->execute();
                header("location:".URLROOT."/test");
            }
            return true;
        } catch (Exception $e) {
            throw new Exception("Error updating crypto wallet: " . $e->getMessage());
        }
    }
}

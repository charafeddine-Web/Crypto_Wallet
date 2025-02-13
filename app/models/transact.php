<?php
class transact {
    private $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }
    public function buy_transac($data){
        $this->conn->query("INSERT INTO transaction (sender_id,crypto_id,montant) VALUES (:sender,:crypto_id,:amount)");
        $this->conn->bind(':sender', 1);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':amount', $data['cryptoamount']);
      
        $this->conn->execute();
    }
    public function sell_transac($data){
        $this->conn->query("INSERT INTO transaction (sender_id,crypto_id,montant) VALUES (:sender,:crypto_id,:amount)");
        $this->conn->bind(':sender', 1);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':amount', $data['cryptoamount']);
      
        $this->conn->execute();
    }
    public function send_coin($data){
        $this->conn->query("INSERT INTO transaction (sender_id, receiver, crypto_id, montant) VALUES (:sender, :receiver, :crypto_id, :amount)");
        $this->conn->bind(':sender', 1);
        $this->conn->bind(':reciever',$data['nexusid'] );
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':amount', $data['coin_amount']);
      
        $this->conn->execute();
    }
    
}
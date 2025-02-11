<?php

Class Crypto {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    // for deposit USDT in user account
    public function depositUSDT($data)
    {
        try {
            $this->db->query('INSERT INTO Portefeuille (soldeUSDT) VALUES (:soldeUSDT)');
            $this->db->bind(':soldeUSDT', $data['soldeUSDT']);
            $this->db->execute();
        }
        catch(PDOException $e){
            throw new Exception('You have An Error While Depositing, Please Try Again');
        }
    }
}

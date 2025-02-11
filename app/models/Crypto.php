<?php

Class Crypto {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    // for deposit USDT in user account
    public function depositUSDT($data){
        try {
            $this->db->query('UPDATE portefeuille SET soldusdt = soldusdt + :soldeUSDT WHERE user_id = 1');
            $this->db->bind(':soldeUSDT', $data['soldeUSDT']);
            $this->db->execute();
        }
        catch(PDOException $e){
            throw new Exception('You have An Error While Depositing, Please Try Again');
        }
    }

    public function getsoldeUSDT(){
        $this->db->query('SELECT soldusdt FROM portefeuille WHERE user_id = 2');
        $this->db->execute();
        return $this->db->single();
    }
}

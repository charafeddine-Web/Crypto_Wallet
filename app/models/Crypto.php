<?php

Class Crypto {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //METHODE TO BUY CRYPTO USING USDT
    public function buyCrypto(){
        try {
            $this->db->query("SELECT solde FROM Portefeuille");
            if ($this->db->rowCount() > 0){

            }

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

}

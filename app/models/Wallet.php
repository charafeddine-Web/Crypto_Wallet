<?php
class Wallet {
    private $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }

    public function check_Qte_Sell($crypto_id,$amount){
        // $this->conn->query("SELECT soldusdt, CASE WHEN soldusdt > 0 THEN true ELSE false END as result FROM portefeuille WHERE user_id = :user_id AND crypto_id = :crypto_id");
        $this->conn->query("SELECT soldusdt from portefeuille where user_id = :user_id and crypto_id = :crypto_id and soldusdt - :amount >= 0");
        $this->conn->bind(':user_id',1);
        $this->conn->bind(':crypto_id', $crypto_id);
        $this->conn->bind(':amount', $amount);
        if($this->conn->execute() && $this->conn->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        
        
    }
    
    public function wallet_sell($data){
        $row=$this->check_Qte_Sell($data['cryptoid'],$data['cryptoamount']);
        if($row){

            $this->conn->query("UPDATE  portefeuille set soldusdt = soldusdt - :qte where user_id =:user_id AND crypto_id=:crypto_id ");
            $this->conn->bind(':user_id', 1);
            $this->conn->bind(':crypto_id', $data['cryptoid']);
            $this->conn->bind(':qte', $data['cryptoamount']);
            $this->conn->execute();
            return true;
        }else{
        return false;
        }

    }



    public function add_to_wallet($data){
        $this->conn->query("SELECT soldusdt, CASE WHEN soldusdt > 0 THEN true ELSE false END as result FROM portefeuille WHERE user_id=:user_id AND crypto_id=:crypto_id");
        $this->conn->bind(':user_id',1);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->execute();
        $row=$this->conn->single();
       

        if($row){
            $data['cryptoamount']=$row->soldusdt  + $data['cryptoamount'];
        
        $this->conn->query("UPDATE  portefeuille set soldusdt =:qte where user_id =:user_id AND crypto_id=:crypto_id ");
        }else{
            $this->conn->query("INSERT INTO portefeuille (user_id,crypto_id,soldusdt ) VALUES (:user_id,:crypto_id,:qte)"); 
        }

        $this->conn->bind(':user_id', 1);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':qte', $data['cryptoamount']);
        $this->conn->execute();
    }
    }

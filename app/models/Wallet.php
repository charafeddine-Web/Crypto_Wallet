<?php
class Wallet {
    private $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }

    public function check_Qte_Sell($crypto_id,$amount){
        $this->conn->query("SELECT qte,if(qte>=:amount,true,false) as result from wallet where user_id=:user_id AND crypto_id=:crypto_id");
        $this->conn->bind(':user_id',1);
        $this->conn->bind(':crypto_id', $crypto_id);
        $this->conn->bind(':amount', $amount);
        $this->conn->execute();
        return $this->conn->single();
    }
    
    public function wallet_sell($data){
        $row=$this->check_Qte_Sell($data['cryptoid'],$data['cryptoamount']);
        if($row->qte){
        $data['cryptoamount']=$row->qte - $data['cryptoamount'];

        $this->conn->query("UPDATE  wallet set qte=:qte where user_id =:user_id AND crypto_id=:crypto_id ");
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
        $this->conn->query("SELECT qte,if(qte>0,true,false) from portefeuille where user_id=:user_id AND crypto_id=:crypto_id");
        $this->conn->bind(':user_id',1);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->execute();
        $row=$this->conn->single();
       

        if($row){
            $data['cryptoamount']=$row->qte + $data['cryptoamount'];
        
        $this->conn->query("UPDATE  portefeuille set qte=:qte where user_id =:user_id AND crypto_id=:crypto_id ");
        }else{
            $this->conn->query("INSERT INTO portefeuille (user_id,crypto_id,qte) VALUES (:user_id,:crypto_id,:qte)"); 
        }

        $this->conn->bind(':user_id', 1);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':qte', $data['cryptoamount']);
        $this->conn->execute();
    }
    }

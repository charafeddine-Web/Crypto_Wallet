<?php
class Wallet {
    private $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }

    public function check_Qte_Sell($crypto_id,$amount){
        $this->conn->query("SELECT soldusdt from portefeuille where user_id = :user_id and crypto_id = :crypto_id and soldusdt - :amount >= 0");
        $this->conn->bind(':user_id',$_SESSION['user_id']);
        $this->conn->bind(':crypto_id', $crypto_id);
        $this->conn->bind(':amount', $amount);
        if($this->conn->execute() && $this->conn->rowCount() > 0){
            return true;
        }else{
            return false;
        }


    }
    public function check_Qte_Sel($crypto_id, $amount)
    {
        $this->conn->query("SELECT soldusdt FROM portefeuille WHERE user_id = :user_id AND crypto_id = :crypto_id");

        $this->conn->bind(':user_id', $_SESSION['user_id']);
        $this->conn->bind(':crypto_id', $crypto_id);

        $result = $this->conn->single();

        if ($result && $result->soldusdt >= $amount) {
            return $result;
        }

        return false;
    }


    public function wallet_sell($data){
        $row=$this->check_Qte_Sell($data['cryptoid'],$data['coin_amount']);
        if($row){
            $this->conn->query("UPDATE  portefeuille set soldusdt = soldusdt - :qte where user_id =:user_id AND crypto_id=:crypto_id ");
            $this->conn->bind(':user_id', $_SESSION['user_id']);
            $this->conn->bind(':crypto_id', $data['cryptoid']);
            $this->conn->bind(':qte', $data['coin_amount']);
            if ($this->conn->execute()){
                return true;
            }
        }else{
            return false;
        }
    }

    public function wallet_receiver($data){
        $this->conn->query("UPDATE  portefeuille set soldusdt = soldusdt + :qte where user_id =:user_id");
        $this->conn->bind(':user_id', $data['nexusid']);
        $this->conn->bind(':qte', $data['coin_amount']);
        $this->conn->execute();
    }



    public function add_to_wallet($data) {
        $this->conn->query("SELECT soldusdt FROM portefeuille WHERE user_id=:user_id AND crypto_id=:crypto_id");
        $this->conn->bind(':user_id', $_SESSION['user_id']);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->execute();
        $row = $this->conn->single();

        var_dump("Avant Update", $row);

        if ($row) {
            if ((float) $row->soldusdt >= (float) $data['amount']) {
                $this->insertintoCryptoWallet($data);

                $this->conn->query("UPDATE portefeuille SET soldusdt = soldusdt - :qtei WHERE user_id = :user_id AND crypto_id = :crypto_id");
                $this->conn->bind(':qtei', (float) $data['amount']);
                $this->conn->bind(':user_id', $_SESSION['user_id']);
                $this->conn->bind(':crypto_id', $data['cryptoid']);
                $this->conn->execute();

                $this->conn->query("SELECT soldusdt FROM portefeuille WHERE user_id=:user_id AND crypto_id=:crypto_id");
                $this->conn->bind(':user_id', $_SESSION['user_id']);
                $this->conn->bind(':crypto_id', $data['cryptoid']);
                $this->conn->execute();
                $newRow = $this->conn->single();
                var_dump("Après Update", $newRow);
            } else {
                $_SESSION['error'] = 'Not enough USDT in your wallet';
            }
        } else {
            $this->conn->query("INSERT INTO portefeuille (user_id, crypto_id, soldusdt) VALUES (:user_id, :crypto_id, :qte)");
            $this->conn->bind(':user_id', $_SESSION['user_id']);
            $this->conn->bind(':crypto_id', $data['cryptoid']);
            $this->conn->bind(':qte', (float) $data['amount']);
            $this->conn->execute();

            $this->insertintoCryptoWallet($data);
        }
    }



    public function insertintoCryptoWallet($data){
        $this->conn->query('SELECT id_cryptomonnaie FROM cryptowallet WHERE user_id = :user_id AND id_cryptomonnaie = :crypto_id');
        $this->conn->bind(':user_id', $_SESSION['user_id']);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->execute();
        $row=$this->conn->single();
        if($row){
            $this->conn->query('UPDATE cryptowallet SET amount = amount + :qte WHERE user_id = :user_id AND id_cryptomonnaie = :crypto_id');
        }else{
            $this->conn->query('INSERT INTO cryptowallet (user_id,id_cryptomonnaie,amount) VALUES (:user_id,:crypto_id,:qte)');
        }
        $this->conn->bind(':user_id', $_SESSION['user_id']);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':qte', (float) $data['amount']);
        $this->conn->execute();
    }
}

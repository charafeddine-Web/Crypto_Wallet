<?php

class TransactionController extends Controller {
    private $cryptoModel;
    private $transaction;
    private $user;
    private $wallet;
    public function __construct() {
        $this->cryptoModel = $this->model('Crypto');
         $this->transaction =$this->model('transact');
         $this->user=$this->model('user');
         $this->wallet=$this->model('wallet');
    }
    public function Buy_sell_page()
    {
        $data = $this->cryptoModel->fetchCryptoData();
      
        $this->view('transactions',$data);
        
    }
    /**************buy transac************* */
    public function add_transac()
    { 
        
        $data = [
            'cryptoid' => $_POST['cryptoid'],
            'coin' => $_POST['coin'],
            'amount' => $_POST['amount'],
            'cryptoamount' => $_POST['cryptoamount'],
            'type_transac'=>'buy'
        ];
        $this->transaction->buy_transac($data);
        $this->wallet->add_to_wallet($data);
        $this->Buy_sell_page();
        
    }
     public function sell_transac(){
        
        $data = [
            'cryptoid' => $_POST['cryptoid'],
            'cryptoamount' => $_POST['coin_amount'],
            'type_transac'=>'sell'
        ];
        // check if i have the amount 
        $result = $this->wallet->wallet_sell($data);
        if($result){
            $this->transaction->sell_transac($data);
            $this->Buy_sell_page();
    
        }else{
            echo "You don't have this amount in your wallet";
        }
        
     }
    public function send_transac(){
        
        $coin=$this->wallet->check_Qte($_POST['cryptoid']);
        $quantite=$coin->qte;
      
        if(!is_numeric($_POST['email'])){
         $receiver=$this->user->check_email_or_nexusID($_POST['email']);
         $_POST['email']=$receiver->id;
        }
    
        $data = [
            'cryptoid' => $_POST['cryptoid'],
            'coin_amount' => $_POST['coin_amount'],
            'nexusid' => $_POST['email'],
            'type_transac'=>'send'
        ];
        $this->transaction->send_coin($data);
        
    }
}


<?php

class TransactionController extends Controller {
    private $cryptoModel;
    private $transaction;
    private $user;
    private $wallet;
    private $apimodel;

    public function __construct() {
        $this->cryptoModel = $this->model('Crypto');
        $this->transaction =$this->model('transact');
        $this->user=$this->model('user');
        $this->wallet=$this->model('wallet');
        $this->apimodel = $this->model('APImodel');
    }
    public function Buy_sell_page()
    {
        $datafromapi = $this->apimodel->getdatafromapi(100);
        $WATCHLISTDATA = $this->transaction->getWatchlistdata();
        $walletdata = $this->transaction->getmyWalletdata();

        $data = [
            'watchlist' => $WATCHLISTDATA,
            'walletdata' => $walletdata
        ];


        $this->view('send',$data);

    }
    /**************buy transac************* */
    public function add_transac()
    {

        $data = [
            'cryptoid' => $_POST['crypto_id'],
            'coin' => isset($_POST['coin']) ? $_POST['coin'] : '',
            'amount' => $_POST['amount'],
            'cryptoamount' => $_POST['cryptoamount'],
            'type_transac'=>'buy'
        ];

        $transactionSuccess = $this->transaction->buy_transac($data);
        if ($transactionSuccess) {
            $this->wallet->add_to_wallet($data);
            $_SESSION['success'] = "Transaction effectuée avec succès !";
        } else {
            $_SESSION['error'] = "Échec de la transaction.";
        }
        header('Location: '.URLROOT.'/TransactionController/Buy_sell_page');

    }
    public function sell_transac(){

        $data = [
            'cryptoid' => $_POST['crypto_id'],
            'cryptoamount' => $_POST['coin_amount'],
            'type_transac'=>'sell'
        ];
        // check if i have the amount
        $result = $this->wallet->wallet_sell($data);

        if($result){
            $this->transaction->sell_transac($data);
            $_SESSION['success'] = "Sell avec success !";
            header('Location: '.URLROOT.'/TransactionController/Buy_sell_page');
            exit();

        }else{
            $_SESSION['error'] = "Not enough funds in your wallet";
            header('Location: /Crypto_Wallet/TransactionController/Buy_sell_page');
            exit();
        }

    }
    public function send_transac(){

        $coin = $this->wallet->check_Qte_Sel($_POST['crypto_id'], $_POST['coin_amount']);
        if (!$coin) {
            $_SESSION['error'] = "Not enough funds in your wallet";
            header('Location: /Crypto_Wallet/TransactionController/Buy_sell_page');
            exit();
        }

        $quantite = $coin->soldusdt;

        if(!is_numeric($_POST['email'])){
            $receiver=$this->user->check_email_or_nexusID($_POST['email']);
            if (!$receiver) {
                $_SESSION['error'] = "Destinatire introuvable";
                header('Location: /Crypto_Wallet/TransactionController/Buy_sell_page');
                exit();
            }
            $_POST['email']=$receiver->email;
        }

        if(!isset($_SESSION['user_id'])){
            $_SESSION['session_error'] = ["You're not authenticated !"];
            header('Location: /Crypto_Wallet/AuthController/login');
            exit();
        }

        $data = [
            'receiver_email' => $_POST['email'],
            'cryptoid' => $_POST['crypto_id'],
            'coin_amount' => $_POST['coin_amount'],
            'type_transac'=>'send'
        ];

        if($this->transaction->send_coin($data)){
            $result = $this->wallet->wallet_sell($data);
            $receiver=$this->wallet->wallet_receiver($data);
            $_SESSION['success'] = "you have send ".$data['coin_amount']." coins to user :'". $data['receiver_email'] ."' successfully!";

            header('Location: /Crypto_Wallet/TransactionController/Buy_sell_page');
            exit();
        }

    }

}
<?php

Class CryptoController extends Controller {
    private $currentModel;

    public function __construct(){
        $this->currentModel = $this->model('Crypto');
    }

    public function buyCrypto(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            try{
            $amount =  $_POST['amount'];
            $crypto =  $_POST['crypto'];
            $crypto_name = $_POST['crypto_name'];

            $data = ['amount' => $amount, 'price' => $crypto, 'crypto_name' => $crypto_name];
            $this->currentModel->buyCrypto($data);
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }


    public function depositUSDT(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $USDTcount = $_POST['depositAmount'];

            $data = ['soldeUSDT' => $USDTcount];

            $this->currentModel->depositUSDT($data);

            $_SESSION['success'] = 'You have successfully deposited ' . $USDTcount . ' USDT';

            header('Location: ' . URLROOT . '/PagesController/my_wallet');
            exit();
        }
    }
    public function buyCryptos(){
        $wallet_id = $_SESSION['wallet_id'];
        $crypto_id = $_POST['crypto_id'];
        $qte = $_POST['qte'];

        $this->currentModel->updateWallet($crypto_id, $qte, $wallet_id);

        header('Location: ' . URLROOT . '/PagesController/send');
    }

}
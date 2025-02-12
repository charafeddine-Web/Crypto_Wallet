<?php

Class CryptoController extends Controller{
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


}
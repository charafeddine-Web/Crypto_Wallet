<?php

Class CryptoController extends Controller{
    private $currentModel;

    public function __construct(){
        $this->currentModel = $this->model('Crypto');
    }

    public function depositUSDT(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $USDTcount = $_POST['USDTcount'];

            $data = ['soldeUSDT' => $USDTcount];

            if($this->currentModel->depositUSDT($data)){
                // redirection && confirmation models
                $_SESSION['session_success'] = 'Your USDT has been deposited';
                // here is header location
            }
        }
    }
}
<?php

Class CryptoController extends Controller {
    private $currentModel;

    public function __construct(){
        $this->currentModel = $this->model('Crypto');
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
}
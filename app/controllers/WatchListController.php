<?php

Class WatchListController extends Controller{
    private $currentModel;
    public function __construct(){
        $this->currentModel = $this->model('WatchList');
    }
    public function removeCrypto() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cryptoId = $_POST['crypto_id'];
            $userId = $_POST['user_id'];

            if(!is_numeric($userId)|| !is_numeric($cryptoId)) {
                echo $userId;
                echo $cryptoId;
                die('Invalid data');
            }

            if($this->currentModel->removeCrypto($userId, $cryptoId)) {
                $_SESSION['session_success'] = 'Crypto removed from watchlist';
                header("Location: /Crypto_Wallet/PagesController/Watchlist");
                exit();
            } else {
                $_SESSION['session_error'] = 'Failed to remove crypto from watchlist';
            }
        }else{
            header("Location: /Home");
        }
    }
    public function addToWatchList() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cryptoId = $_POST['cryptoId'];
            $userId = $_POST['idUser'];
        if(!is_numeric($userId)|| !is_numeric($cryptoId)) {
        echo $userId;
        echo $cryptoId;
        }
        if($this->currentModel->addToWatchList($userId, $cryptoId)) {
            $_SESSION['session_success'] = 'Crypto added to watchlist';
            header("Location: /Crypto_Wallet/PagesController/Market");
            exit();
        }else{
            $_SESSION['session_error'] = 'Failed to add crypto to watchlist';
        }
        }
    }

}
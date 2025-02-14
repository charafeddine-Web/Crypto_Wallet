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

    public function AddToDataBase() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $symbol = $_POST['symbol'];
            $slog = $_POST['slog'];
            $maxsupply = $_POST['max_supply'];
            $prix = $_POST['prix'];
            $marketcap = $_POST['marketcap'];
            $volume24h = $_POST['volume24h'];
            $circulatingsupply = $_POST['circulatingsupply'];
            $totalsupply = $_POST['total_supply'];
            if($this->currentModel->AddCrypto($name, $symbol, $slog, $maxsupply, $prix, $marketcap, $volume24h, $circulatingsupply, $totalsupply)) {
                $_SESSION['success'] = 'Crypto added to watchlist';
                header("Location: ".URLROOT."/PagesController/market");
                exit();
            }else{
                $_SESSION['session_error'] = 'Failed to add crypto to watchlist';
            }
        }
    }


}
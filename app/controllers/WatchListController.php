<?php

Class WatchListController extends Controller{
    private $currentModel;

    public function __construct(){
        $this->currentModel = $this->model('WatchList');
    }

    public function removeCrypto() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_POST['user_id'];
            $cryptoId = $_POST['crypto_id'];

            if(!is_numeric($userId)|| !is_numeric($cryptoId)) {
                echo $userId;
                echo $cryptoId;
                die('Invalid data');
            }

            if($this->currentModel->removeCrypto($userId, $cryptoId)) {
                $_SESSION['session_success'] = 'Crypto removed from watchlist';
            } else {
                $_SESSION['session_error'] = 'Failed to remove crypto from watchlist';
            }
        }else{
            header("Location: /Home");
        }
    }

}
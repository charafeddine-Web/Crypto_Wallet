<?php

class NotificationControler extends Controller{

    private $currentModel;
    public function __construct(){
            $this->currentModel = $this->model('Notification');
    }
    public function SendEmail(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $reciver = $_POST['reciver'];
            $amount = $_POST['amount'];
            $type = $_POST['type'];


            if($this->currentModel->sendEmailNotification($email, $reciver,$amount, $type)) {
                $_SESSION['session_success'] = 'Crypto removed from watchlist';
                header("Location: /Crypto_Wallet/PagesController/Market");
                exit();
            } else {
                $_SESSION['session_error'] = 'Failed to remove crypto from watchlist';
            }
        }
    }

    public function receiveEmail(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $reciver = $_POST['reciver'];
            $amount = $_POST['amount'];
            $type = $_POST['type'];
            if($this->currentModel->receiveEmailNotification($email, $reciver,$amount, $type)) {
                $_SESSION['session_success'] = 'Crypto removed from watchlist';
                header("Location: /Crypto_Wallet/PagesController/Watchlist");
                exit();
            }
            else {
                $_SESSION['session_error'] = 'Failed to remove crypto from watchlist';
            }
        }
    }
}

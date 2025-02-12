<?php

class TransactionController extends Controller {
    private $transactionModel;
    private $userModel;

    public function __construct() {
        $this->transactionModel = $this->model('TransactionModel');
        $this->userModel = $this->model('UserModel');
    }

    public function sendCrypto() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $receiverIdentifier = trim($_POST['receiver']);
            $cryptoId = intval($_POST['crypto_id']);
            $amount = floatval($_POST['amount']);
            $senderId = $_SESSION['user_id']; 

            $receiver = $this->transactionModel->getUserByNexusOrEmail($receiverIdentifier);

            if (!$receiver) {
                $data['error'] = "Utilisateur introuvable avec ce NexusID ou email.";
                return $this->view('transactions/send', $data);
            }

            $receiverId = $receiver->NexusId;

            if (!$this->transactionModel->hasSufficientBalance($senderId, $cryptoId, $amount)) {
                $data['error'] = "Fonds insuffisants.";
                return $this->view('transactions/send', $data);
            }
            $this->transactionModel->debitSender($senderId, $cryptoId, $amount);
            $this->transactionModel->creditReceiver($receiverId, $cryptoId, $amount);
            if ($this->transactionModel->createTransaction($senderId, $receiverId, $amount)) {
                $data['success'] = "Transaction envoyée avec succès !";
                $data['transaction'] = $this->transactionModel->getTransactionsByUser($senderId); 
            } else {
                $data['error'] = "Erreur lors de l’envoi de la transaction.";
            }
            $this->view('send', $data);
            
        }

        $this->view('transactions/send');
    }
}

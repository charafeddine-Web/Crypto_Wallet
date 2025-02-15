<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';
class transact {
    private $conn;

    public function __construct()
    {
        $this->conn = new Database;
    }
    public function getWatchlistdata(){
        $this->conn->query("select cryptomonnaie.nom ,cryptomonnaie.id_cryptomonnaie from watchlist join cryptomonnaie on cryptomonnaie.id_cryptomonnaie = watchlist.id_cryptomonnaie where watchlist.user_id = :user_id");
        $this->conn->bind(":user_id", $_SESSION['user_id']);
        return $this->conn->resultSet();
    }

    public function getmyWalletdata(){
        $this->conn->query("
SELECT c.nom, c.id_cryptomonnaie
FROM portefeuille p
JOIN cryptomonnaie c ON c.id_cryptomonnaie = p.crypto_id
WHERE p.user_id = :user_id;");
        $this->conn->bind(":user_id", $_SESSION['user_id']);
        return $this->conn->resultSet();
    }

    public function buy_transac($data){
        $this->conn->query("INSERT INTO transaction (sender_id,crypto_id,montant) VALUES (:sender,:crypto_id,:amount)");
        $this->conn->bind(':sender',  $_SESSION['user_id']);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':amount', $data['amount']);

        $result= $this->conn->execute();
        if ($result){
            return true ;
        }
        else{
            return false ;
        }

    }
    public function sell_transac($data){
        $this->conn->query("INSERT INTO transaction (sender_id,crypto_id,montant) VALUES (:sender,:crypto_id,:amount)");
        $this->conn->bind(':sender', $_SESSION['user_id']);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':amount', $data['cryptoamount']);

        $this->conn->execute();
    }

    public function send_coin($data) {
        $this->conn->query("INSERT INTO transaction (sender_id, receiver_id, receiver, crypto_id, montant) VALUES (:sender, :receiver, :receiver_email ,:crypto_id, :amount)");
        $this->conn->bind(':sender', $_SESSION['user_id']);
        $this->conn->bind(':receiver', null);
        $this->conn->bind(':receiver_email', $data['receiver_email']);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':amount', $data['coin_amount']);

        $result = $this->conn->execute();

        if ($result) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'charafsmaki0000@gmail.com';
                $mail->Password = 'ovgqcuepsgfuirqc'; // ⚠️ Mauvaise pratique, utiliser des variables d'environnement !
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('charafsmaki0000@gmail.com', 'Crypto System');
                $mail->addAddress($data['receiver_email']); // Envoyer à l'email correct
                $mail->isHTML(true);
                $mail->Subject = 'Crypto Transaction Notification';
                $mail->Body = '<p>Hi,</p><p>You have received <b>' . $data['coin_amount'] . ' ' . $data['type_transac'] . '</b> from <b>' . $_SESSION['user_id'] . '</b>.</p><p>Thank you for using our site</p>';

                $mail->send();
                return "Email sent successfully";
            } catch (Exception $e) {
                return "Email error: " . $mail->ErrorInfo;
            }
        } else {
            header('Location: /Crypto_Wallet/TransactionController/login');
            exit('Transaction failed');
        }
    }

}
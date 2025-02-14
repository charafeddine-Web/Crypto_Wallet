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
    public function buy_transac($data){
        $this->conn->query("INSERT INTO transaction (sender_id,crypto_id,montant) VALUES (:sender,:crypto_id,:amount)");
        $this->conn->bind(':sender',  $_SESSION['user_id']);
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':amount', $data['cryptoamount']);
      
       $result= $this->conn->execute();
        if ( $result){
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
    public function send_coin($data){
        $this->conn->query("INSERT INTO transaction (sender_id, receiver_id, crypto_id, montant) VALUES (:sender, :receiver, :crypto_id, :amount)");
        $this->conn->bind(':sender',  $_SESSION['user_id']);
        $this->conn->bind(':receiver',$data['nexusid'] );
        $this->conn->bind(':crypto_id', $data['cryptoid']);
        $this->conn->bind(':amount', $data['coin_amount']);
        $result= $this->conn->execute();
        if($result){

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'charafsmaki0000@gmail.com';
                $mail->Password = 'ovgqcuepsgfuirqc';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;


                $mail->setFrom('charafsmaki0000@gmail.com', 'Crypto System');
                $mail->addAddress($data['nexusid']);
                $mail->isHTML(true);
                $mail->Subject = 'Get Wissam for 0.000000000001 crypto';
                $mail->Body = ' <p>Hi charafsmaki0000@gmail.com</p> <p>You send <b>' . $data['coin_amount']  . ' ' . $data['type_transac']  . '</b> to <b>' . $data['nexusid']  . '</b>.</p> <p>Thank you for using our site</p>';

                $mail->send();
                return "wissam email sent";
            } catch (Exception $e) {
                return "Error  " . $mail->ErrorInfo;
            }
        }
    }
    
}
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class Notification {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    function sendEmailNotification($senderEmail, $receiver, $amount, $cryptoType) {
        if (isset($senderEmail) || isset($receiver) || isset($amount) || isset($cryptoType)) {
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
                $mail->addAddress($senderEmail);
                $mail->isHTML(true);
                $mail->Subject = 'Get Wissam for 0.000000000001 crypto';
                $mail->Body = "
            <p>Hi $senderEmail</p>
            <p>You send <b>{$amount} . {$cryptoType}</b> to <b>{$receiver}</b>.</p>
            <p>Thank you for using our site</p>
        ";


                $mail->send();
                return "wissam email sent";
            } catch (Exception $e) {
                return "Error  " . $mail->ErrorInfo;
            }
        }else{
            return "Error";
        }

    }
}

?>

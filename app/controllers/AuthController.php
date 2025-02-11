<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';
class AuthController extends Controller
{
    private $User;
    private $messageerror = [];

    public function __construct(){
        $this->User = $this->model('User');
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            session_start();
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
                $this->messageerror[] = "Please fill all the fields.";
                $_SESSION['session_error'] = $this->messageerror;
                header('Location: /Crypto_Wallet/AuthController/register');
                exit();
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->messageerror[] = "Email invalid.";
                $_SESSION['session_error'] = $this->messageerror;
                header('Location: /Crypto_Wallet/AuthController/register');
                exit();
            }
            if (strlen($password) < 8) {
                $this->messageerror[] = "Password must be at least 8 characters long.";
                $_SESSION['session_error'] = $this->messageerror;
                header('Location: /Crypto_Wallet/AuthController/register');
                exit();
            }
            $data = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $password
            ];
            if ($this->User->register($data)) {
                $verification_code = bin2hex(random_bytes(16));
                $_SESSION['verification_code'] = $verification_code;
                $_SESSION['verification_code_expire'] = time() + 360;
                // Envoi de l'email de vérification
                $this->sendVerificationEmail($email, $verification_code);
                $_SESSION['success'] = "Account created successfully. Please check your email to verify your account.";
                header('Location: /Crypto_Wallet/AuthController/login');
                exit();
            } else {
                $this->messageerror[] = "Something went wrong. Please try again.";
                $_SESSION['session_error'] = $this->messageerror;
                header('Location: /Crypto_Wallet/AuthController/register');
            }
        }
        $this->view('register');
    }
    public function sendVerificationEmail($email, $verification_code)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gemail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'charafsmaki0000@gmail.com';
            $mail->Password = 'ydnfxdodjmpzikdg';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('charafsmaki0000@gmail.com', 'Crypto Wallet');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Account Verification';
            $mail->Body = "
            <p>Thank you for registering. Please click the link below to verify your account:</p>
            <a href='http://yourdomain.com/verify.php?code=$verification_code'>Verify My Account</a>
        ";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function verifyAccount()
    {

        if (isset($_GET['code'])) {
            $verification_code = $_GET['code'];
            if (isset($_SESSION['verification_code']) && $_SESSION['verification_code'] == $verification_code) {
                if ($_SESSION['verification_code_expire'] > time()) {
                    $_SESSION['success'] = "Your account has been verified. You can now log in.";
                    unset($_SESSION['verification_code']);
                    unset($_SESSION['verification_code_expire']);
                    header('Location: /Crypto_Wallet/AuthController/login');
                    exit();
                } else {
                    $_SESSION['error'] = "Verification code has expired. Please request a new one.";
                    header('Location: /Crypto_Wallet/AuthController/register');
                    exit();
                }
            } else {
                $_SESSION['error'] = "Invalid verification code.";
                header('Location: /Crypto_Wallet/AuthController/register');
                exit();
            }
        }
    }


    public function login(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            session_start();
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            if (empty($email) || empty($password)) {
                $this->messageerror[] = "Please fill all the fields.";
                $_SESSION['session_error'] = $this->messageerror;
                header('Location: /Crypto_Wallet/AuthController/login');
                exit();
            }
        }
        $this->view('login');
    }

}









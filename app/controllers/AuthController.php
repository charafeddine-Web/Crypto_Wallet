<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AuthController extends Controller
{
    private $User;
    private $messageError = [];
    private $messageSuccess = [];

    public function __construct()
    {
        $this->User = $this->model('User');
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
            session_start();
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
                $this->messageError[] = "Please fill all the fields.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->messageError[] = "Invalid email format.";
            } elseif (strlen($password) < 8) {
                $this->messageError[] = "Password must be at least 8 characters long.";
            }

            if (!empty($this->messageError)) {
                $_SESSION['session_error'] = $this->messageError;
                header('Location: /Crypto_Wallet/AuthController/register');
                exit();
            }
            $verification_code = bin2hex(random_bytes(4));
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $data = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $hashedPassword,
                'verification_code' => $verification_code,
            ];

            if ($this->User->register($data)) {
                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;

                $_SESSION['verification_code'] = $verification_code;
                $_SESSION['verification_code_expire'] = time() + 3600;
                if ($this->sendVerificationEmail($email, $verification_code)) {
                    $_SESSION['session_success'] = ["Account created successfully. Please check your email to verify your account."];
                    header('Location: /Crypto_Wallet/AuthController/login');
                } else {
                    $_SESSION['session_error'] = ["Account created, but we couldn't send the verification email. Please contact support."];
                    header('Location: /Crypto_Wallet/AuthController/register');
                }
                exit();
            } else {
                $_SESSION['session_error'] = ["Something went wrong. Please try again."];
                header('Location: /Crypto_Wallet/AuthController/register');
                exit();
            }
        }
        $this->view('register');
    }

    private function sendVerificationEmail($email, $verification_code)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'charafsmaki0000@gmail.com';
            $mail->Password = 'ovgqcuepsgfuirqc';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('charafsmaki0000@gmail.com', 'Crypto Wallet');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Account Verification';

            $mail->Body = "<p>Please enter the following code to verify your account:</p>
               <p>Your verification code is: <strong>$verification_code</strong></p>
               <p>If you can't click the link, copy the code and paste it in the form below:</p>
               <form action='http://" . $_SERVER['HTTP_HOST'] . "/Crypto_Wallet/AuthController/verifyAccount' method='POST'>
                   <label for='code'>Enter Verification Code:</label>
                   <input type='text' id='code' name='code' value='$verification_code' readonly>
                   <button type='submit'>Verify My Account</button>
               </form>";

            if ($mail->send()) {
                return true;
            } else {
                error_log("Mailer Error: {$mail->ErrorInfo}");
                return false;
            }
        } catch (Exception $e) {
            error_log("Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }

    public function verifyAccount()
    {
        session_start();
        if (!isset($_GET['code']) || !isset($_SESSION['verification_code']) || $_SESSION['verification_code'] !== $_GET['code']) {
            $_SESSION['session_error'] = ["Invalid or expired verification code."];
            header('Location: /Crypto_Wallet/AuthController/register');
            exit();
        }
        if ($_SESSION['verification_code_expire'] < time()) {
            $_SESSION['session_error'] = ["Verification code has expired. Please request a new one."];
            header('Location: /Crypto_Wallet/AuthController/register');
            exit();
        }
        if ($this->User->activateAccount($_SESSION['email'])) {
            unset($_SESSION['verification_code'], $_SESSION['verification_code_expire']);
            $_SESSION['session_success'] = ["Your account has been verified. You can now log in."];
            header('Location: /Crypto_Wallet/AuthController/login');
        } else {
            $_SESSION['session_error'] = ["Something went wrong. Please try again."];
            header('Location: /Crypto_Wallet/AuthController/register');
        }
        exit();
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
            session_start();
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                $_SESSION['session_error'] = ["Please fill in all fields."];
                header('Location: /Crypto_Wallet/AuthController/login');
                exit();
            }
            $user = $this->User->getUserByEmail($email);
            if (!$user) {
                $_SESSION['session_error'] = ["Invalid email or password."];
                header('Location: /Crypto_Wallet/AuthController/login');
                exit();
            }
            if ($user['is_active'] == 0) {
                $_SESSION['session_error'] = ["Please verify your account before logging in."];
                header('Location: /Crypto_Wallet/AuthController/login');
                exit();
            }

            if (!password_verify($password, $user['password'])) {
                $_SESSION['session_error'] = ["Invalid email or password."];
                header('Location: /Crypto_Wallet/AuthController/login');
                exit();
            }
            $_SESSION['user_id'] = $user['nexusId'];
            $_SESSION['firstname'] = $user['nom'];
            $_SESSION['lastname'] = $user['prenom'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['session_success'] = ["Login successful!"];

            header('Location: /Crypto_Wallet/PagesController/index');
            exit();
        }

        $this->view('login');
    }

}

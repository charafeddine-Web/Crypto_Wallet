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
            $userId = $this->User->register($data);
            if ($userId) {
                // Création d'un portefeuille
                if ($this->User->createWallet($userId)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['verification_code'] = $verification_code;
                    $_SESSION['verification_code_expire'] = time() + 600;

                    if ($this->sendVerificationEmail($email, $verification_code)) {
                        $_SESSION['session_success'] = ["Account created successfully. Please check your email to verify your account."];
                        header('Location: /Crypto_Wallet/AuthController/verify');
                    } else {
                        $_SESSION['session_error'] = ["Account created, but we couldn't send the verification email. Please contact support."];
                        header('Location: /Crypto_Wallet/AuthController/register');
                    }
                    exit();
                } else {
                    $_SESSION['session_error'] = ["User created, but failed to create wallet."];
                    header('Location: /Crypto_Wallet/AuthController/register');
                    exit();
                }
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
               ";
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

    public function verify()
    {

        if (!isset($_SESSION['email']) || !isset($_SESSION['verification_code'])) {
            $_SESSION['session_error'] = ["You need to register first."];
            header('Location: /Crypto_Wallet/AuthController/register');
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
            $entered_code = trim($_POST['verification_code']);

            if ($entered_code !== $_SESSION['verification_code']) {
                $_SESSION['session_error'] = ["Invalid  verification code."];
                header('Location: /Crypto_Wallet/AuthController/verify');
                exit();
            }
            if ($_SESSION['verification_code_expire'] < time()) {
                $_SESSION['session_error'] = ["Verification code has expired. Please request a new one."];
                header('Location: /Crypto_Wallet/AuthController/verify');
                exit();
            }
            $result = $this->User->activateAccount($_SESSION['email']);
            if ($result) {
                unset($_SESSION['verification_code'], $_SESSION['verification_code_expire']);
                $_SESSION['session_success'] = ["Your account has been verified. You can now log in."];
                header('Location: /Crypto_Wallet/AuthController/login');
            }else {
                $_SESSION['session_error'] = ["Something went wrong. Please try again."];
                header('Location: /Crypto_Wallet/AuthController/verify');
            }
            exit();

        }

        $this->view('verify');
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

            if ($user->is_active == '0') {
                $_SESSION['session_error'] = ["Please verify your account before logging in."];
                header('Location: /Crypto_Wallet/AuthController/login');
                exit();
            }

            if (!password_verify($password, $user->mot_de_pass)) {
                $_SESSION['session_error'] = ["Invalid email or password."];
                header('Location: /Crypto_Wallet/AuthController/login');
                exit();
            }

            $_SESSION['user_id'] = $user->nexusid;
            $_SESSION['firstname'] = $user->nom;
            $_SESSION['lastname'] = $user->prenom;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['session_success'] = ["Login successful!"];

            header('Location: /Crypto_Wallet/PagesController/index');
            exit();
        }

        $this->view('login');
    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: /Crypto_Wallet/AuthController/login');
        exit();
    }


}

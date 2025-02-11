<?php
session_start();

if (isset($_SESSION['session_error'])) {
    echo "<p style='color:red'>" . $_SESSION['session_error'] . "</p>";
    unset($_SESSION['session_error']);
} elseif (isset($_SESSION['session_success'])) {
    echo "<p style='color:green'>" . $_SESSION['session_success'] . "</p>";
    unset($_SESSION['session_success']);
}
?>
<a href="/Crypto_Wallet/AuthController/login">Retour à la connexion</a>
<?php

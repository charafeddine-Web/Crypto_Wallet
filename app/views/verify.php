<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Account</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #4A90E2, #8E44AD);
        }
        .container {
            background: #fff;
            padding: 25px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #333;
            margin-bottom: 10px;
        }
        p {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }
        .error {
            color: red;
            background: #fdd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .success {
            color: green;
            background: #dfd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            text-align: center;
        }
        button {
            width: 100%;
            background: #4A90E2;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #357ABD;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Verify Your Account</h2>
    <p>Please enter the verification code sent to your email.</p>
    <?php if (isset($_SESSION['session_error'])) : ?>
        <div class="error"><?= implode('<br>', $_SESSION['session_error']); unset($_SESSION['session_error']); ?></div>
    <?php endif; ?>

    <form action="<?= URLROOT ?>/AuthController/verify" method="POST">
        <input type="text" name="verification_code" placeholder="Enter Code" required>
        <button type="submit" name="submit">Verify</button>
    </form>
</div>

</body>
</html>

<?php
session_start();

define('DB_HOST','localhost');
define('DB_USER','postgres');
define('DB_PASS','Azzedine2004');
define('DB_NAME','crypto_wallet');



// App Root
define('APPROOT',dirname(dirname(__FILE__)));
// Url Root
define('URLROOT','http://localhost/Crypto_Wallet');
// Site Name
define('SITENAME','QueenCrypto');
// App version
define("APPVERSION",'1.0.0');
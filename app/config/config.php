<?php
session_start();

<<<<<<< Updated upstream

const DB_HOST = 'localhost';
const DB_USER = 'postgres';
const DB_PASS = 'Wissam0908';
const DB_NAME = 'crypto_wallet';

=======
define('DB_HOST','localhost');
define('DB_USER','postgres');
define('DB_PASS','Wissam0908');
define('DB_NAME','QueenCrypto');
>>>>>>> Stashed changes



// App Root
define('APPROOT',dirname(dirname(__FILE__)));
// Url Root
define('URLROOT','http://localhost/Crypto_Wallet');
// Site Name
define('SITENAME','QueenCrypto');
// App version
define("APPVERSION",'1.0.0');
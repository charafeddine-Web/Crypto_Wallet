<?php
session_start();
// DB PARAMS
const DB_HOST = 'localhost';
const DB_USER = 'postgres';
const DB_PASS = '123456';
const DB_NAME = 'crypto_walet';




// App Root
define('APPROOT',dirname(dirname(__FILE__)));
// Url Root
define('URLROOT','http://localhost/Crypto_Wallet');
// Site Name
define('SITENAME','QueenCrypto');
// App version
define("APPVERSION",'1.0.0');
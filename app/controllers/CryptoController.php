<?php

Class CryptoController extends Controller{
    private $currentModel;

    public function __construct(){
        $this->currentModel = $this->model('Crypto');
    }

    public function buyCrypto(){
        $crypto = $this->model('Crypto');
        $data = $crypto->buyCrypto();
        $this->view('Crypto/buyCrypto', $data);
    }

}
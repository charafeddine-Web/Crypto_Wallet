<?php

Class CryptoController extends Controller{
    private $currentModel;

    public function __construct(){
        $this->currentModel = $this->model('Crypto');
    }

}
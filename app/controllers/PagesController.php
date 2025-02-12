<?php
class PagesController extends Controller
{
    public function __construct()
    {

    }
    public function index(){
        echo "Welcome to queenCrypto";
    }

    public function test(){
        $this->view('test');
    }
}
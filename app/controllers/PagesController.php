<?php
class PagesController extends Controller
{
    public function __construct()
    {

    }
    public function index(){
        $this->view('Home');
    }

    public function my_wallet(){
        $this->view('crypto_wallet');
    }

    public function dashboard(){
        $this->view('Dashboard');
    }

    public function watch_list(){
        $this->view('Watchlist');
    }
}
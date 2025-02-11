<?php
class PagesController extends Controller
{

    private $cryptoModel;

    public function __construct()
    {
        $this->cryptoModel = $this->model('Crypto');
    }
    public function index(){
        $this->view('Home');
    }

    public function my_wallet(){
        $sold = $this->cryptoModel->getsoldeUSDT();
        $data = ['soldusdt' => $sold];
        $this->view('crypto_wallet', $data);
    }

    public function dashboard(){
        $this->view('Dashboard');
    }

    public function watch_list(){
        $this->view('Watchlist');
    }
}
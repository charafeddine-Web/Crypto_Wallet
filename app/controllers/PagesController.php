<?php
class PagesController extends Controller
{

    private $cryptoModel;
    private $apimodel;


    private $watchlistModel;

    public function __construct()
    {
        $this->cryptoModel = $this->model('Crypto');
        $this->apimodel = $this->model('APImodel');
        $this->watchlistModel = $this->model('WatchList');
    }

    public function dashboard(){
        $this->view('Dashboard');
    }

    public function Market(){
        $this->view('Market');
    }


    public function Watchlist(){
        $crypto = $this->watchlistModel->getWatchlist();
        $data = [
            'crypto' => $crypto
        ];
        $this->view('Watchlist', $data);
    }
    public function index(){
        $fromAPI = $this->apimodel->getdatafromapi(3);
        $data = ['data' => $fromAPI['data']];
        $this->view('Home', $data);
    }

    public function my_wallet(){
        $sold = $this->cryptoModel->getsoldeUSDT();
        $data = ['soldusdt' => $sold];
        $this->view('crypto_wallet', $data);
    }

    public function market(){
        $this->view('market');
    }

}
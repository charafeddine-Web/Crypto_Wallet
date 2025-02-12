<?php
class PagesController extends Controller
{

    private $cryptoModel;
    private $apimodel;

    public function __construct()
    {
        $this->cryptoModel = $this->model('Crypto');
        $this->apimodel = $this->model('APImodel');
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

    public function dashboard(){
        $this->view('Dashboard');
    }

    public function watch_list(){
        $this->view('Watchlist');
    }

    public function market()
    {
        $fromAPI = $this->apimodel->getdatafromapi(10);
        if (!isset($fromAPI['data']) || !is_array($fromAPI['data'])) {
            $data = ['error' => 'Erreur lors du chargement des cryptos.'];
        } else {
            $data = ['cryptos' => $fromAPI['data']];
        }

        $this->view('market', $data);
    }
}
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
    public function index(){
        $fromAPI = $this->apimodel->getdatafromapi(3);
        $data = ['data' => $fromAPI['data']];
        $this->view('Home', $data);
    }

    public function send(){
        $fromAPI = $this->apimodel->getdatafromapi(10);
        $data = ['data' => $fromAPI['data']];
        $this->view('send', $data);
    }



    public function dashboard(){
        $this->view('Dashboard');
    }

    public function Watchlist(){
        $crypto = $this->watchlistModel->getWatchlist();
        $data = [
            'crypto' => $crypto
        ];
        $this->view('Watchlist', $data);
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
    public function my_wallet(){
        $sold = $this->cryptoModel->getsoldeUSDT();
        $data = ['soldusdt' => $sold];

        $data = $this->cryptoModel->getCurrencieAmount();
        //prepare data for the chart
        $chartData = [
            'labels' => [],
            'amounts'=> []
        ];
        // FOREACH ROW OF DATA PUSH THE NOM TO $chartData['labels'] AND amount to chartdata['amounts']
        foreach ($data as $row){
            $chartData['labels'][] = $row->nom;//currency names
            $chartData['amounts'][] = $row->amount;//Amount;
        }
        $this->view('crypto_wallet',$chartData);
        $this->view('crypto_wallet', $data);

    }



}
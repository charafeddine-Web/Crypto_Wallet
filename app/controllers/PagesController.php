<?php
class PagesController extends Controller
{

    private $watchlistModel;

    public function __construct()
    {
        $this->watchlistModel = $this->model('WatchList');
    }
    public function index(){
        $this->view('Home');
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



}
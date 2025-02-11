<?php
class PagesController extends Controller
{
    public function __construct()
    {

    }
    public function home(){
        $this->view('home');
    }

    public function dashboard(){
        $this->view('Dashboard');
    }


    public function Watchlist(){
        $this->view('Watchlist');
    }


}
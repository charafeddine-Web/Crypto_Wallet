<?php
class PagesController extends Controller
{
    public function __construct()
    {

    }
    public function index(){
         $this->view('Pages');
    }
}
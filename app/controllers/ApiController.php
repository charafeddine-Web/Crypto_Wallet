<?php
class ApiController extends Controller
{
    private $apiModel;
    public function __construct()
    {
        $this->apiModel = $this->model('Api');
    }
    public function index(){
        $APIDATA = $this->apiModel->getdatafromapi();
        $data = ['data'=>$APIDATA];
        $this->view('Pages',$data);
    }
}
<?php
class Users extends Controller{
 public $user;
  public function __construct()
  {
    $this->user=$this->model('user');
  }
    public function index(){
        $data = [
          'title' => 'SharePosts',
          'project_to_update' => ''
        ];
       
        $this->view('users/index', $data);
      }
      
      public function check_email_or_nexusID(){
       $user=$this->user->check_email_or_nexusID($_POST['input']);
       
       if($user) {
        echo "<span class='text-yellow-500'>GOOD USER FOUNDED</span>";
       
       }else{
        echo "<span class='text-red-500'>USER NOT FOUND</span>";
        
       }
      }
}
?>
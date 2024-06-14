<?php

class Freeze extends Controller {

  public function index(){
    $this->view('freeze/index');
  }
  
  public function wait(){

    // $user = $this->model('User'); 
    unset($_SESSION['failedAuth']);
    header('Location: /login');
    
  }
  
}
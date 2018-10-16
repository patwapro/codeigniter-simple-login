<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {



  public function index(){
    $email = $this->session->userdata('email');
  	$user_info = $this->Main_Model->User_details($email);
    $data['user'] = $user_info['email'];
  	if($user_info){
      $this->load->view('dashboard', $data);
  	}else{
      session_destroy();
    	redirect("Login");
  	}
	}


}

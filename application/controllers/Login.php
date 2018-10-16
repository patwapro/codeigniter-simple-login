<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function Logout(){
   $email =$this->session->userdata('email');
   $user_info = $this->Main_Model->User_details($email);
    if($user_info){
      session_destroy();
    	redirect("Login");
    }else{
      redirect("Login");
    }
 }

		function userLogin(){
			$email = $this->input->post('email');
  		$password = $this->input->post('password');
	 	  $check_login_session = $this->session->userdata('email');
	 	 if(isset($email) && isset($password) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
	 		 if($check_login_session == ""){
	 		 $result = array();
			 if($email !== '' && $password !== ''){
				 $user_data = $this->Main_Model->login($email,$password);
				 if($user_data){
					 if($user_data['is_active'] != 0){
							 $this->session->set_userdata('email', $user_data['email']);
							 $result['error'] = 0;
							 $result['error_desc'] = null;
							 $result['msg']='success';
							 }else{
								 $result['error'] = 1;
								 $result['error_desc'] = 'Account Inactive.';
								 $result['msg'] = null;
							 }
						 }else{
							 $result['error'] = 1;
							 $result['error_desc'] = 'Invalid mobile number or password';
							 $result['msg'] = null;
						 }
					 }else {
						 $result['error'] = 1;
						 $result['error_desc'] = 'Fields cannot be Empty';
						 $result['msg'] = null;
					 }
	 			 }else{
	 					 $result['error'] = 2;
	 					 $result['error_desc'] = 'invalid request';
	 					 $result['msg'] = null;
	 				 }
	 				 echo json_encode($result);
	 	 }else {
	 	 	redirect('Login');
	 	 }
	  }
}

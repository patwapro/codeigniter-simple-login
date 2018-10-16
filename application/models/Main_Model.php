<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Main_Model extends CI_Model {
  function __construct(){
      parent::__construct();
  }

  function User_details($email){
    $email = trim($email);
    $this->db->select('*');
    $user = $this->db->get_where('users', array('email'=>$email, 'is_active'=>1));
    $access = $user->row_array();
    if($access){
      return $access;
    }
  }

  function Reset_password($email,$password){
    $password = trim($password);
    $password = md5($password);
    return $this->db->update('users', array('password'=>$password), array('email'=>$email));
  }

  function login($email, $password){
    $password = trim($password);
    $password = md5($password);
    $this->db->where("password like binary", $password);
    $get = $this->db->get_where('users', array('email'=>$email));
    $access = $get->row_array();
    if($access){
      return $access;
    }
  }

}

<?php
defined('BASEPATH') or exit('No direct script access allowed'); 
class Forgot_password extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  { 
		$data["page_title"] = "Forget Password";
		$this->load->view('forgot_password', $data);  
  }

}
 
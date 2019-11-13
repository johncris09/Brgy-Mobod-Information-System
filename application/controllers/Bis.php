<?php
defined('BASEPATH') or exit('No direct script access allowed');
 

class Bis extends CI_Controller
{ 
  public function __construct()
  {
    parent::__construct();
		// redirect to login if user is unauthorized
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
  }

  public function index()
  { 
		
		$data["page_title"] = "Dashboard";
		$this->load->view('index', $data);
		
  }

} 

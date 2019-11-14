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

	public function logout()
  {    
		$user_id = $this->session->userdata('user_id');
		$update_logout_date = $this->login_model->update_logout_date($user_id); 
		if($update_logout_date)
		{	
			$all_sessions = $this->session->all_userdata();
			
			// unset all sessions
			foreach($all_sessions as $key => $val)
			{
				$this->session->unset_userdata($key); 	
			}

			redirect('login');
		}
	} 
} 

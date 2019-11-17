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
		$data["page_title"]       = "Dashboard";
		$data["total_users"]       = $this->user_model->get_users()->num_rows();
		$data["total_population"] = $this->resident_model->fetch_resident()->num_rows();
		$data["total_household"]  = $this->household_model->fetch_household()->num_rows();
		$this->load->view('admin/index', $data); 
	}

	public function logout()
  {    
		$user_id = $this->session->userdata('user_id');
		$update_logout_date = $this->user_model->update_logout_date($user_id); 
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

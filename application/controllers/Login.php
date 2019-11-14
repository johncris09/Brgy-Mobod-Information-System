<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class Login extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "Login";
		$this->load->view('login', $data); 
	} 

	public function login()
	{
		$user_info = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);
		$login = $this->login_model->login($user_info);
		if($login > 0)
		{ 
			$this->login_history($user_info);
			$data["response"] =  true;
		}
		else
		{
			$data["response"] = false;
		}

		echo json_encode($data);
	}

	public function login_history($user_info)
	{
		return $this->login_model->login_history($user_info); 
	}
}
  

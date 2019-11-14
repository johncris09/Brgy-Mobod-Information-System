<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class Login extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		// redirect to login if user is unauthorized
		if ($this->session->userdata('user_id')) {
			redirect('bis');
		}
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
			$this->set_session($user_info);
			$data["response"] =  true;
		}
		else
		{
			$data["response"] = false;
		}

		echo json_encode($data);
	}

	private function login_history($user_info)
	{
		return $this->login_model->login_history($user_info); 
	}

	private function set_session($user_info)
	{
		$user_info = $this->login_model->get_user_info($user_info); 
		 
		foreach($user_info as $row)
		{
			$array = array(
				'user_id'         => $row["user_id"],
				'first_name'      => $row["first_name"],
				'last_name'       => $row["last_name"],
				'middle_name'     => $row["middle_name"],
				'email'           => $row["email"],
				'username'        => $row["username"],
				'user_type'       => $row["user_type"],
				'profile_picture' => $row["profile_picture"],
				'position_id'     => $row["position"],
				'date_registered' => $row["date_registered"],
			);
		} 
		$this->session->set_userdata( $array ); 
		
	}


}
  

<?php
defined('BASEPATH') or exit('No direct script access allowed');

 

class User extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "User";
		$this->load->view('admin/user', $data); 
	}

	
	public function load_user()
	{
		$user  = $this->user_model->get_users();
		$output = '';

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="user_data" class="table " cellspacing="0" width="100%">
					<thead class="  ">
						<tr>
							<th>ID</th> 
							<th>Profile Picture</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Email</th>
							<th>Username</th> 
							<th>User Type</th>
							<th>Date Registered</th>
							<th>Position</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
		';

		if ($user->num_rows() > 0) {
			foreach ($user->result_array() as $row) {
				$output .= '
						<tr>
							<td>' . $row['user_id'] . '</td> 
							<td>' . ucfirst($row['profile_picture']) . '</td>
							<td>' . ucfirst($row['last_name']) . '</td>
							<td>' . ucfirst($row['first_name']) . '</td>
							<td>' . ucfirst($row['middle_name']) . '</td>
							<td>' . ucfirst($row['email']) . '</td>
							<td>' . ucfirst($row['username']) . '</td>
							<td>' . ucfirst($row['user_type']) . '</td>
							<td>' . date_format(date_create($row['date_registered']),'M d, Y') . '</td> 
							<td>' . ucfirst($row['position']) . '</td> 
							<td><a title="Edit" href="' . base_url() . 'user/edit_user/' . $row['user_id'] . '" class=" text-warning h5"><i class="fa fa-edit"></i></a></td>
							<td><a href="#" title="Delete"  id="' . $row['user_id'] . '" class="text-danger h5 delete_user"><i class="fa fa-trash"></i></a></td>
						</tr> 
				';
			}
		} 

		$output .= '
					</tbody>
				</table>
			</div>
		';

		echo json_encode($output);
	}
 

	public function add_user()
	{
		$data["page_title"] = "Add User";
		$data["user_type"] =  $this->user_type_model->get_all_user_type();
		$data["position"] =  $this->position_model->fetch_position();
		$this->load->view('admin/add_user', $data); 
	} 
	public function insert_user()
	{
		$user_info = array(
			'last_name'       => $_POST['last_name'],
			'first_name'      => $_POST['first_name'],
			'middle_name'     => $_POST['middle_name'],
			'email'           => empty($_POST['email']) ? null : $_POST['email'] ,
			'username'        => $_POST['username'],
			'password'        => md5($_POST['password']),
			'user_type'       => $_POST['user_type'],
			'position'        => $_POST['position'],
			'date_registered' => date('Y-m-d H:i:s', time()),  
		);

		$insert_user = $this->user_model->insert_user($user_info);
		if ($insert_user > 0) {
			$data = [
				'response' => true,
				'title'    => "Successfully Added",
				'content'  => "New Record Successfully Added!",
				'icon'     => 'fa fa-check',
				'type'     => 'green',
				'btnClass' => 'blue-gradient btn-rounded z-depth-1a',
			];
		} else {
			$data = [
				'response' => false,
				'title'    => "Error!",
				'content'  => "Something went wrong",
				'icon'     => 'fa fa-warning',
				'type'     => 'red',
				'btnClass' => 'btn-danger',
			];
		}

		echo json_encode($data);
	}

	
	public function edit_user($user_id)
	{
		$user_info = array(
			'user_id' => $user_id,
		);
		$data["page_title"] = "Edit User";
		$data['user']  = $this->user_model->get_user_info($user_info)[0];
		$data["user_type"] =  $this->user_type_model->get_all_user_type();
		$data["position"] =  $this->position_model->fetch_position();
		$this->load->view('admin/edit_user', $data); 
	}

	public function update_user($user_id)
	{ 
		$user_info = array(
			'user_id'         => $_POST['user_id'],
			'last_name'       => $_POST['last_name'],
			'first_name'      => $_POST['first_name'],
			'middle_name'     => $_POST['middle_name'],
			'email'           => empty($_POST['email']) ? null : $_POST['email'],
			'username'        => $_POST['username'], 
			'user_type'       => $_POST['user_type'],
			'position'        => $_POST['position'], 
		);

		$update_user = $this->user_model->update_user($user_info);
		if ($update_user) {
			$data = [
				'response' => true,
				'title'    => "Successfully Updated",
				'content'  => "New Record Successfully Updated!",
				'icon'     => 'fa fa-check',
				'type'     => 'green',
				'btnClass' => 'blue-gradient btn-rounded z-depth-1a',
			];
		} else {
			$data = [
				'response' => false,
				'title'    => "Error!",
				'content'  => "Something went wrong",
				'icon'     => 'fa fa-warning',
				'type'     => 'red',
				'btnClass' => 'btn-danger',
			];
		}

		echo json_encode($data);
	}

	
	public function delete_user($user_id)
	{
		$user_info = array(
			'user_id' => $user_id
		);
		$data = '';

		$delete_user = $this->user_model->delete_user($user_info);
		if ($delete_user > 0) {
			$data = [
				'response' => true,
				'title'    => "Successfully Deleted",
				'content'  => "New Record Successfully Deleted!",
				'icon'     => 'fa fa-check',
				'type'     => 'green',
				'btnClass' => 'blue-gradient btn-rounded z-depth-1a',
			];
		} else {
			$data = [
				'response' => false,
				'title'    => "Error!",
				'content'  => "Something went wrong",
				'icon'     => 'fa fa-warning',
				'type'     => 'red',
				'btnClass' => 'btn-danger',
			];
		}

		echo json_encode($data);
	}

	public function print()
	{  
		$file_name = "User";
		$data["print_title"] = "List of Users";  
		$user  = $this->user_model->get_users();
		$output = '';

		$output .= '
			<table class="text-dark table table-bordered table-striped table-sm" style="font-size: 12px;">
				<thead>
					<tr class="bg-secondary text-white">  
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Email</th>
						<th>Username</th> 
						<th>User Type</th>
						<th>Date Registered</th>
						<th>Position</th> 
					</tr>
				</thead>
				<tbody>
		';

		if ($user->num_rows() > 0) {
			foreach ($user->result_array() as $row) {
				$output .= '
						<tr  >  
							<td>' . ucfirst($row['last_name']) . '</td>
							<td>' . ucfirst($row['first_name']) . '</td>
							<td>' . ucfirst($row['middle_name']) . '</td>
							<td>' . ucfirst($row['email']) . '</td>
							<td>' . ucfirst($row['username']) . '</td>
							<td>' . ucfirst($row['user_type']) . '</td>
							<td>' . date_format(date_create($row['date_registered']),'M d, Y') . '</td> 
							<td>' . ucfirst($row['position']) . '</td> 
						</tr> 
				';
			}
		} 

		$output .= '
					</tbody>
				</table>
			</div>
		';

		$data["print"] = $output; 
		
		// $this->load->view('report/report', $data);
		
		$this->pdf->load_view('report/report', $data);
		$this->pdf->render();
		$this->pdf->stream($file_name.'.pdf'); 
 
	}

}
 
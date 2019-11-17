<?php
defined('BASEPATH') or exit('No direct script access allowed');

 

class Resident extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "Resident";
		$this->load->view('admin/resident', $data); 
	}

	
	public function load_resident()
	{
		$resident  = $this->resident_model->fetch_resident();
		$output = '';   

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="resident_data" class="table " cellspacing="0" width="100%">
					<thead class="  ">
						<tr>
							<th>ID</th> 
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Extension</th>
							<th>Birthplace</th>
							<th>Birthdate</th>
							<th>Gender</th>
							<th>Civil Status</th>
							<th>Citizenship</th>
							<th>Occupation</th>
							<th>Religion</th> 
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
		';

		if ($resident->num_rows() > 0) {
			foreach ($resident->result_array() as $row) {
				$output .= '
						<tr>
							<td>' . $row['resident_id'] . '</td> 
							<td>' . ucfirst($row['last_name']) . '</td> 
							<td>' . ucfirst($row['first_name']) . '</td> 
							<td>' . ucfirst($row['middle_name']) . '</td>
							<td>' . ucfirst($row['extension']) . '</td> 
							<td>' . ucfirst($row['birthplace']) . '</td> 
							<td>' . ucfirst($row['birthdate']) . '</td>
							<td>' . ucfirst($row['gender']) . '</td>
							<td>' . ucfirst($row['civil_status']) . '</td> 
							<td>' . ucfirst($row['citizenship']) . '</td> 
							<td>' . ucfirst($row['occupation']) . '</td>
							<td>' . ucfirst($row['religion']) . '</td>
							<td><a title="Edit" href="' . base_url() . 'resident/edit_resident/' . $row['resident_id'] . '" class="text-warning h5"><i class="fa fa-edit"></i></a></td>
							<td><a href="#" title="Delete"  id="' . $row['resident_id'] . '" class="text-danger h5 delete_resident"><i class="fa fa-trash"></i></a></td>
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

	
	public function add_resident()
	{
		$data["page_title"] = "Add Resident";
		$data["household"] = $this->household_model->fetch_household();
		$this->load->view('admin/add_resident', $data); 
	} 

	public function insert_resident()
	{
		$resident_info = array(
			'last_name'         => $_POST['last_name'],
			'first_name'        => $_POST['first_name'],
			'middle_name'       => $_POST['middle_name'],
			'extension'         => $_POST['extension'],
			'birthplace'        => $_POST['birthplace'],
			'birthdate'         => $_POST['birthdate'],
			'gender'            => $_POST['gender'],
			'civil_status'      => $_POST['civil_status'],
			'citizenship'       => $_POST['citizenship'],
			'occupation'        => $_POST['occupation'],
			'religion'          => $_POST['religion'],
			'oic'               => $this->session->userdata('user_id'),
			'date_accomplished' => date('Y-m-d H:i:s', time()),
		);

		$insert_resident = $this->resident_model->insert_resident($resident_info);
		if ($insert_resident > 0) {
			$residence_household_info = array(
				'resident_id'  => $insert_resident,
				'household_id' => $_POST['household'], 
			);

			// insert to residence_household
			$this->residence_household_model->insert_residence_household($residence_household_info);

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

	public function edit_resident($resident_id)
	{ 
		$data["page_title"] = "Edit Resident";
		$data["household"] = $this->household_model->fetch_household();
		$data["resident"] = $this->resident_model->get_resident($resident_id); 
		$this->load->view('admin/edit_resident', $data); 
	}

	
	public function update_resident($resident_id)
	{ 
		$resident_info = array(
			'resident_id'  => $resident_id,
			'last_name'    => $_POST['last_name'],
			'first_name'   => $_POST['first_name'],
			'middle_name'  => $_POST['middle_name'],
			'extension'    => $_POST['extension'],
			'birthplace'   => $_POST['birthplace'],
			'birthdate'    => $_POST['birthdate'],
			'gender'       => $_POST['gender'],
			'civil_status' => $_POST['civil_status'],
			'citizenship'  => $_POST['citizenship'],
			'occupation'   => $_POST['occupation'],
			'religion'     => $_POST['religion'],
		);  

		$update_resident = $this->resident_model->update_resident($resident_info);
		if ($update_resident) {
			$residence_household_info = array(
				'resident_id'  => $resident_id,
				'household_id' => $_POST['household'], 
			);

			// update to residence_household
			$this->residence_household_model->update_residence_household($residence_household_info);
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

	

	public function delete_resident($resident_id)
	{
		$resident_info = array(
			'resident_id' => $resident_id
		);
		$data = '';
		
		$this->residence_household_model->delete_residence_household($resident_info);

		$delete_resident = $this->resident_model->delete_resident($resident_info);
		if ($delete_resident > 0) {
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

}
 
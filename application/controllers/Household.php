<?php
defined('BASEPATH') or exit('No direct script access allowed');

 
class Household extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "Household";
		$this->load->view('admin/household', $data); 
	}
	 

	public function load_household()
	{
		$household  = $this->household_model->fetch_household();
		$output = '';

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="household_data" class="table " cellspacing="0" width="100%">
					<thead class="  ">
						<tr>
							<th>ID</th> 
							<th>Purok</th>
							<th>Household #</th> 
							<th>View</th> 
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
		';

		if ($household->num_rows() > 0) {
			foreach ($household->result_array() as $row) {
				$output .= '
						<tr>
							<td>' . $row['household_id'] . '</td>  
							<td>' . ucfirst($row['purok']) . '</td> 
							<td>' . $row['household_number'] . '</td> 
							<td><a title="View" href="' . base_url() . 'residence_household/view_residence_household/' . $row['household_id'] . '" class=" text-primary h5"><i class="fa fa-eye"></i></a></td>
							<td><a title="Edit" href="' . base_url() . 'household/edit_household/' . $row['household_id'] . '" class=" text-warning h5"><i class="fa fa-edit"></i></a></td>
							<td><a href="#" title="Delete"  id="' . $row['household_id'] . '" class="text-danger h5 delete_household"><i class="fa fa-trash"></i></a></td>
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

	
	public function add_household()
	{
		$data["page_title"] = "Add Household";
		$data["purok"] =  $this->purok_model->fetch_purok(); 
		$this->load->view('admin/add_household', $data); 
	} 

	
	public function insert_household()
	{
		$household_info = array(
			'purok_id'       => $_POST['purok'],
			'household_number'      => $_POST['household_no'], 
		); 

		$insert_household = $this->household_model->insert_household($household_info);
		if ($insert_household > 0) {
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
	
	public function edit_household($household_id)
	{
		$data["page_title"] = "Edit household";
		$data['household']  = $this->household_model->get_household($household_id);
		$data["purok"]      = $this->purok_model->fetch_purok();
		$this->load->view('admin/edit_household', $data); 
	}

	

	public function update_household($household_id)
	{
		$household_info = array(
			'household_id'     => $household_id,
			'purok_id'         => $_POST['purok'],
			'household_number' => $_POST['household_no'],
		);

		$update_household = $this->household_model->update_household($household_info);
		if ($update_household) {
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

	
	
	public function delete_household($household_id)
	{
		$household_info = array(
			'household_id' => $household_id
		);
		$data = '';

		$delete_household = $this->household_model->delete_household($household_info);
		if ($delete_household > 0) {
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
 

<?php
defined('BASEPATH') or exit('No direct script access allowed');

 

class Position extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
	}
	
  public function index()
  {
		$data["page_title"] = "Position";
		$this->load->view('admin/position', $data); 
	}

	
	public function load_position()
	{
		$position  = $this->position_model->fetch_position();
		$output = '';

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="position_data" class="table " cellspacing="0" width="100%">
					<thead class="  ">
						<tr>
							<th>ID</th> 
							<th>position</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
		';

		if ($position->num_rows() > 0) {
			foreach ($position->result_array() as $row) {
				$output .= '
						<tr>
							<td>' . $row['position_id'] . '</td> 
							<td>' . ucfirst($row['position']) . '</td>
							<td><a title="Edit" href="' . base_url() . 'position/edit_position/' . $row['position_id'] . '" class=" text-warning h5"><i class="fa fa-edit"></i></a></td>
							<td><a href="#" title="Delete"  id="' . $row['position_id'] . '" class="text-danger h5 delete_position"><i class="fa fa-trash"></i></a></td>
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

	public function add_position()
	{
		$data["page_title"] = "Add Position";
		$this->load->view('admin/add_position', $data); 
	}

	
	public function insert_position()
	{
		$position_info = array(
			'position' => $_POST['position'], 
		);

		$insert_position = $this->position_model->insert_position($position_info);
		if ($insert_position > 0) {
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

	public function edit_position($position_id)
	{
		$data["page_title"] = "Edit Position";
		$data['position']  = $this->position_model->get_position($position_id);
		$this->load->view('admin/edit_position', $data); 
	}

	public function update_position($position_id)
	{
		$position_info = array(
			'position_id'   => $position_id,
			'position' => $_POST['position'], 
		);

		$update_position = $this->position_model->update_position($position_info);
		if ($update_position) {
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
 


}

 
<?php
defined('BASEPATH') or exit('No direct script access allowed');
 

class Purok extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		$data["page_title"] = "Purok";
		$this->load->view('admin/purok', $data); 
	}
	
	public function load_purok()
	{
		$purok  = $this->purok_model->fetch_purok();
		$output = '';

		$output .= '
			<div class="table-responsive table-responsive-data2">
				<table id="purok_data" class="table " cellspacing="0" width="100%">
					<thead class="  ">
						<tr>
							<th>ID</th> 
							<th>Purok</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
		';

		if ($purok->num_rows() > 0) {
			foreach ($purok->result_array() as $row) {
				$output .= '
						<tr>
							<td>' . $row['purok_id'] . '</td> 
							<td>' . ucfirst($row['purok']) . '</td>
							<td><a title="Edit" href="' . base_url() . 'purok/edit_purok/' . $row['purok_id'] . '" class="text-warning h5"><i class="fa fa-edit"></i></a></td>
							<td><a href="#" title="Delete"  id="' . $row['purok_id'] . '" class="text-danger h5 delete_purok"><i class="fa fa-trash"></i></a></td>
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

	public function add_purok()
	{
		$data["page_title"] = "Add Purok";
		$this->load->view('admin/add_purok', $data); 
	}

	public function insert_purok()
	{
		$purok_info = array(
			'purok' => $_POST['purok'], 
		);

		$insert_purok = $this->purok_model->insert_purok($purok_info);
		if ($insert_purok > 0) {
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

	public function edit_purok($purok_id)
	{
		$data["page_title"] = "Edit Purok";
		$data['purok']  = $this->purok_model->get_purok($purok_id);
		$this->load->view('admin/Edit_purok', $data); 
	}

	public function update_purok($purok_id)
	{
		$purok_info = array(
			'purok_id'   => $purok_id,
			'purok' => $_POST['purok'], 
		);

		$update_purok = $this->purok_model->update_purok($purok_info);
		if ($update_purok) {
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

	public function delete_purok($purok_id)
	{
		$purok_info = array(
			'purok_id' => $purok_id
		);
		$data = '';

		$delete_purok = $this->purok_model->delete_purok($purok_info);
		if ($delete_purok > 0) {
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
		$file_name = "purok";
		$data["print_title"] = "List of Puroks";  
		$purok = $this->purok_model->fetch_purok(); 
		$output = '';

		$output .= '
		<table class="table table-sm table-bordered table-striped">
					<thead>
						<tr class="bg-secondary text-white"> 
							<th>Purok</th> 
						</tr>
					</thead>
					<tbody>
		';

		if ($purok->num_rows() > 0) {
			foreach ($purok->result_array() as $row) {
				$output .= '
						<tr> 
							<td>' . ucfirst($row['purok']) . '</td>
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

 
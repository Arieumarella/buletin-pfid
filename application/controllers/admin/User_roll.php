<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_roll extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dinamis');
		if($this->session->userdata('login') != TRUE){
			redirect('/admin/login', 'refresh');
		}

	}

	public function index()
	{
		$tmp['tittle'] = 'User Roll';
		$tmp['content'] = 'users_roll';
		$tmp['dataRoll'] = $this->M_dinamis->add_all('t_role', '*', 'id', 'asc');
		$this->load->view('admin/tamplate.php', $tmp);
	}

	public function save()
	{
		$rollName = $this->input->post('rollName');

		$dataInsert = array(
			'name' => $rollName,
			'created_at' => date('Y-m-d h:i:s')
		);

		$pross = $this->M_dinamis->save('t_role', $dataInsert);


		if ($pross) {
			$this->session->set_flashdata('psn','
				<div class="alert alert-success alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-check"></i> Berhasi. Berhasil menyimpan data.</h6>
				</div>
				');
		}

		$res = array(

			'code' => $pross == true ? 200:500,
			'msg' => 'Ada yg erorr hubungi developer'
		);

		echo json_encode($res);
	}


	public function getById()
	{
		$id = $this->input->post('id');

		$where = array(
			'id' => $id
		);

		$data = $this->M_dinamis->getById('t_role', $where);

		echo json_encode($data);
	}

	public function saveEdit()
	{
		$id = $this->input->post('id');
		$rollName = $this->input->post('rollName');

		$where = array(
			'id' => $id
		);

		$dataEdit = array(
			'name' => $rollName,
			'updated_at' => date('Y-m-d h:i:s')
		);

		$pross = $this->M_dinamis->update('t_role', $dataEdit, $where);

		if ($pross) {
			$this->session->set_flashdata('psn','
				<div class="alert alert-success alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-check"></i> Berhasi. Berhasil menyimpan data.</h6>
				</div>
				');
		}

		$res = array(

			'code' => $pross == true ? 200:500,
			'msg' => 'Ada yg erorr hubungi developer'
		);

		echo json_encode($res);

	}

	public function hapus()
	{
		$id = $this->input->post('id');

		$where = array(

			'id' => $id

		);

		$pross = $this->M_dinamis->delete('t_role', $where);

		if ($pross) {
			$this->session->set_flashdata('psn','
				<div class="alert alert-success alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-check"></i> Berhasi. Berhasil menghapus data.</h6>
				</div>
				');
		}

		$res = array(

			'code' => $pross == true ? 200:500,
			'msg' => 'Ada yg erorr hubungi developer'
		);

		echo json_encode($res);
	}

}

/* End of file User_roll.php */
/* Location: ./application/controllers/admin/User_roll.php */
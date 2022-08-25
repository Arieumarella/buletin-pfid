<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$tmp['tittle'] = 'Data User';
		$tmp['content'] = 'users';
		$tmp['dataUser'] = $this->M_dinamis->getUser();
		$tmp['dataRoll'] = $this->M_dinamis->add_all('t_role', '*', 'id', 'asc');
		$this->load->view('admin/tamplate.php', $tmp);
	}

	public function save()
	{
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$tlp = $this->input->post('tlp');
		$password = $this->input->post('password');
		$roll = $this->input->post('roll');

		$dataInsert = array(
			'name' => $name,
			'tlp' => $tlp,
			'username' => $username,
			'user_roll' => $roll,
			'password' => password_hash($password, PASSWORD_BCRYPT, ['cost' => 10,]),
			'created_at' => date('Y-m-d h:i:s')
		);

		$pross = $this->M_dinamis->save('t_users', $dataInsert);


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

		$data = $this->M_dinamis->getById('t_users', $where);

		echo json_encode($data);
	}

	public function saveEdit()
	{

		$id = $this->input->post('id');
		$rollEdit = $this->input->post('rollEdit');
		$tlpEdit = $this->input->post('tlpEdit');
		$usernameEdit = $this->input->post('usernameEdit');
		$nameEdit = $this->input->post('nameEdit');

		$where = array(
			'id' => $id
		);

		$dataEdit = array(
			'name' => $nameEdit,
			'user_roll' => $rollEdit,
			'tlp' => $tlpEdit,
			'username' => $usernameEdit,
			'updated_at' => date('Y-m-d h:i:s')
		);

		$pross = $this->M_dinamis->update('t_users', $dataEdit, $where);

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

		$pross = $this->M_dinamis->delete('t_users', $where);

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

/* End of file Users.php */
/* Location: ./application/controllers/admin/Users.php */
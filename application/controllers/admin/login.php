<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dinamis');
		// if($this->session->userdata('logged') != TRUE){
		// 	redirect(base_url("C_login"));
		// }

	}

	public function index()
	{
		$this->load->view('admin/login');
	}


	public function prosesLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$where = array(

			'username' => $username
		);

		$data = $this->M_dinamis->countDataById('t_users', $where);

		if ($data != '0') {
			
			$data = $this->M_dinamis->getById('t_users', $where);

			if(password_verify($password, $data->password)){

				$dataSession = array(
					'id' => $data->id,
					'username' => $data->name,
					'user_roll' => $data->user_roll,
					'login' => true
				);

				$this->session->set_userdata($dataSession);

				redirect('/admin/Dashboard', 'refresh');

			}

			$this->session->set_flashdata('psn','
				<div class="alert alert-danger alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-ban"></i> Gagal Password Salah.!</h6>
				</div>');
			redirect('/admin/login', 'refresh');
		}

		$this->session->set_flashdata('psn','
			<div class="alert alert-danger alert-sm alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h6><i class="icon fa fa-ban"></i> Gagal Username Tidak Terdaftar.!</h6>
			</div>');
		redirect('/admin/login', 'refresh');

	}


	public function logOut()
	{
		$this->session->sess_destroy();
		redirect('/admin/login', 'refresh');
	}



}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */
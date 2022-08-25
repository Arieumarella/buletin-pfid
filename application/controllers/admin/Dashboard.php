<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$tmp['tittle'] = 'Dashboard';
		$tmp['content'] = 'dashboard';
		$this->load->view('admin/tamplate.php', $tmp);
	}

	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
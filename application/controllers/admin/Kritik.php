<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik extends CI_Controller {

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

		$tmp['tittle'] = 'List Kritik';
		$tmp['content'] = 'listKritik';
		$tmp['dataKritik'] = $this->M_dinamis->add_all('t_kritik', '*', 'id', 'desc');
		$this->load->view('admin/tamplate.php', $tmp);
		
	}

}

/* End of file Kritik.php */
/* Location: ./application/controllers/admin/Kritik.php */
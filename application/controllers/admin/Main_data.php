<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_data extends CI_Controller {

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
		$tmp['tittle'] = 'Main Data';
		$tmp['content'] = 'main_data';

		$where = array(

			'id' => '1'
		);

		$tmp['main_data'] = $this->M_dinamis->getById('t_home', $where);
		$this->load->view('admin/tamplate.php', $tmp);
	}

	public function getData()
	{
		$where = array(

			'id' => '1'
		);

		$data = $this->M_dinamis->getById('t_home', $where);

		echo json_encode($data);
	}


	public function save()
	{

		$headerTittle = $this->input->post('headerTittle');
		$headerDescript = $this->input->post('headerDescript');
		$contentTittle = $this->input->post('contentTittle');
		$contentDescript = $this->input->post('contentDescript');
		$email = $this->input->post('email');
		$tlp = $this->input->post('tlp');
		$address = $this->input->post('address');
		

		$dataUbah = array(

			'header_tittle' => $headerTittle,
			'header_descript' => $headerDescript,
			'address' => $address,
			'email' => $email,
			'tlp' => $tlp,
			'tittle_content' => $contentTittle,
			'decript_content' => $contentDescript,
			'updated_at' => date('Y-m-d h:i:s')
		);

		$where = array(

			'id' => '1'
		);


		$pross = $this->M_dinamis->update('t_home', $dataUbah, $where);

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


}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
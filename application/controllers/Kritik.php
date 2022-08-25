<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dinamis');
	}

	public function index()
	{

		$data = array(
			'tittle' => 'Kritik & Saran',
			'content' => 'page_kritik',	
			'dataWebsite' => $this->M_dinamis->getById('t_home', ['id' => '1']),
			'photoBody' => $this->M_dinamis->getByRow('t_imgbody', '*'),
			'dataPhoto' => $this->M_dinamis->getByRow('t_picttittle', '*'),
		);
		$this->load->view('index_front', $data);
		
	}

	public function inputKritik()
	{
		$contact_name = $this->input->post('contact_name');
		$contact_email = $this->input->post('contact_email');
		$hp = $this->input->post('hp');
		$contact_message = $this->input->post('contact_message');

		$dataInput = array(
			'name' => $contact_name,
			'email' => $contact_email,
			'hp' => $hp,
			'message' => $contact_message,
			'created_at' => date('Y-m-d h:i:s')
		);

		$pross = $this->M_dinamis->save('t_kritik', $dataInput);

		if ($pross == true) {
			$this->session->set_flashdata('psn','
				<div class="alert alert-success alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-check"></i> Kritik dan saran anda telah kami terima. Terimakasih telah memeberikan kritik dan saran untuk kami.</h6>
				</div>
				');
		}else{
			$this->session->set_flashdata('psn','
				<div class="alert alert-danger alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-ban"></i> Gagal Menyimpan data</h6>
				</div>');
		}

		redirect('/Kritik', 'refresh');
	}

}

/* End of file Kritik.php */
/* Location: ./application/controllers/Kritik.php */
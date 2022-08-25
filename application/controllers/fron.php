<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fron extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dinamis');
		$this->load->library('pagination');
		// if($this->session->userdata('logged') != TRUE){
		// 	redirect(base_url("C_login"));
		// }

	}

	public function index($page=null)
	{

		$config['base_url'] = base_url().'Fron/index/';
		$config['total_rows'] =  $this->M_dinamis->getCountAll('t_artikel');
		$config['per_page'] = 8;
		$config['full_tag_open'] = '<ul class="nav justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = array('class' => 'nav-link');
		$config['num_tag_open'] = '<li class="nav-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="nav-item"><a class="nav-link active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="nav-item">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="nav-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="nav-item">';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="nav-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="nav-item">';
		$config['next_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data = array(
			'tittle' => 'BULETIN PFID',
			'content' => 'page_home',
			'dataWebsite' => $this->M_dinamis->getById('t_home', ['id' => '1']),
			'dataPhoto' => $this->M_dinamis->getByRow('t_picttittle', '*'),
			'photoBody' => $this->M_dinamis->getByRow('t_imgbody', '*'),
			'dataArticel' => $this->M_dinamis->getPaginateion('t_artikel',$config['per_page'],$page)
		);
		$this->load->view('index_front', $data);
	}


	public function getById($id = null)
	{
		if ($id == null) {
			redirect('/Fron/index', 'refresh');
		}

		$data = array(
			'tittle' => 'BULETIN PFID',
			'content' => 'page_detail',
			'idArticle' => $id,
			'dataWebsite' => $this->M_dinamis->getById('t_home', ['id' => '1']),
			'listArticle' => $this->M_dinamis->getByLimit('t_artikel', 4, 'id', 'desc'),
			'dataPhoto' => $this->M_dinamis->getByRow('t_picttittle', '*'),
			'dataDetail' => $this->M_dinamis->getById('t_artikel', ['id' => $id]),			
		);
		$this->load->view('index_front', $data);

	}


	public function updatePwngunjung()
	{
		$data = $this->M_dinamis->getById('t_home', ['id' => '1']);

		$where = array(
			'id' => '1'
		);

		$dataUpdate = array(

			'jml_pengunjung' => $data->jml_pengunjung+1
		);

		$pros = $this->M_dinamis->update('t_home', $dataUpdate, $where);

		$res = array(

			'code'=>200
		);

		echo json_encode($res);

	}

	public function updateArticleView($idArticle = NULL)
	{
		if ($idArticle == null) {
			echo json_encode(['code' => 401]);
			return;
		}

		$data = $this->M_dinamis->getById('t_artikel', ['id' => $idArticle]);

		$where = array(
			'id' => $idArticle
		);

		$dataUpdate = array(

			'viwers' => $data->viwers+1
		);

		$pros = $this->M_dinamis->update('t_artikel', $dataUpdate, $where);

		$res = array(

			'code'=>200
		);

		echo json_encode($res);


	}


	public function Download($file='')
	{
		force_download('assets/fileBuletin/'.$file,NULL);
	}

}

/* End of file fron.php */
/* Location: ./application/controllers/fron.php */
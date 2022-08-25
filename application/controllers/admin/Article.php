<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

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
		$tmp['tittle'] = 'Data Article';
		$tmp['content'] = 'article';
		$tmp['dataArticle'] = $this->M_dinamis->add_all('t_artikel', '*', 'id', 'asc');
		$this->load->view('admin/tamplate.php', $tmp);
	}

	public function save()
	{
		$t_article = $this->input->post('t_article');
		$d_article = $this->input->post('d_article');
		$edisi = $this->input->post('edisi');

		$imageExtention = pathinfo($_FILES["coverArticel"]['name'], PATHINFO_EXTENSION);
		$image = time().'_'.'cover.'.$imageExtention; //Filename
		$config = array(
			'upload_path' => "./assets/imgUpload",   //here folder name added Upload file Destination 
			'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",  //some added Accepted types
			'overwrite' => TRUE,
			'file_name' => $image
		);
		$this->load->library('upload', $config); 

		if($this->upload->do_upload('coverArticel'))
		{
			
		} else {

			$this->session->set_flashdata('psn','
				<div class="alert alert-danger alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-ban"></i> Error '.$this->upload->display_errors().'.!</h6>
				</div>');
			redirect('/admin/Article', 'refresh');

		}


		$image2 =  time().'_'.'buletin.pdf'; 
		$config = array(
			'upload_path' => "./assets/fileBuletin", 
			'allowed_types' => "pdf",
			'overwrite' => TRUE,
			'file_name' => $image2
		);


		$this->upload->initialize($config);

		if($this->upload->do_upload('fileArticel'))
		{
			
		} else {

			$this->session->set_flashdata('psn','
				<div class="alert alert-danger alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-ban"></i> Error '.$this->upload->display_errors().'.!</h6>
				</div>');
			redirect('/admin/Article', 'refresh');

		}

		$dataInsert = array(
			'tittle_artikel' => $t_article,
			'descript_artikel' => $d_article,
			'edisi' => $edisi,
			'pict_artikel' => $image,
			'file' => $image2,
			'created_at' => date('Y-m-d h:i:s')
		);

		$pross = $this->M_dinamis->save('t_artikel', $dataInsert);

		if ($pross == true) {
			$this->session->set_flashdata('psn','
				<div class="alert alert-success alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-check"></i> Berhasi. Berhasil menyimpan data.</h6>
				</div>
				');
		}else{
			$this->session->set_flashdata('psn','
				<div class="alert alert-danger alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-ban"></i> Error Insert Database Error.!</h6>
				</div>');
		}

		redirect('/admin/Article', 'refresh');

	}


	public function saveEdit()
	{
		$t_article = $this->input->post('t_article');
		$d_article = $this->input->post('d_article');
		$edisi = $this->input->post('edisi');
		$id = $this->input->post('id');
		$coverName = '';
		$fileName = ''; 

		if ($_FILES['coverArticel']['name'] != '')
		{

			$imageExtention = pathinfo($_FILES["coverArticel"]['name'], PATHINFO_EXTENSION);
			$coverName = time().'_'.'cover.'.$imageExtention; //Filename
			$config = array(
					'upload_path' => "./assets/imgUpload",   //here folder name added Upload file Destination 
				'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",  //some added Accepted types
				'overwrite' => TRUE,
				'file_name' => $coverName
			);
			$this->load->library('upload', $config); 

			if($this->upload->do_upload('coverArticel'))
			{
				
			} else {

				$this->session->set_flashdata('psn','
					<div class="alert alert-danger alert-sm alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h6><i class="icon fa fa-ban"></i> Error '.$this->upload->display_errors().'.!</h6>
					</div>');
				redirect('/admin/Article', 'refresh');

			}
		}

		if ($_FILES['fileArticel']['name'] != '' )
		{
			

			$fileName =  time().'_'.'buletin.pdf'; 
			$config = array(
				'upload_path' => "./assets/fileBuletin", 
				'allowed_types' => "pdf",
				'overwrite' => TRUE,
				'file_name' => $fileName
			);


			if ($_FILES['coverArticel']['name'] != '') {
				$this->upload->initialize($config);
			}else{
				$this->load->library('upload', $config);	
			}


			if($this->upload->do_upload('fileArticel'))
			{

			} else {

				$this->session->set_flashdata('psn','
					<div class="alert alert-danger alert-sm alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h6><i class="icon fa fa-ban"></i> Error '.$this->upload->display_errors().'.!</h6>
					</div>');
				redirect('/admin/Article', 'refresh');

			}



		}

		$t_article = $this->input->post('t_article');
		$d_article = $this->input->post('d_article');
		$edisi = $this->input->post('edisi');
		$id = $this->input->post('id');

		$where = array(

			'id' => $id
		);


		$dataUbah = array(
			'tittle_artikel' => $t_article,
			'descript_artikel' => $d_article,
			'edisi' => $edisi,
			'updated_at' => date('Y-m-d h:i:s')
		);

		if ($_FILES['coverArticel']['name'] != '') {
			$dataUbah['pict_artikel'] = $coverName;
		}

		if ($_FILES['fileArticel']['name'] != '') {
			$dataUbah['file'] = $fileName;
		}


		$pross = $this->M_dinamis->update('t_artikel', $dataUbah, $where);

		if ($pross == true) {
			$this->session->set_flashdata('psn','
				<div class="alert alert-success alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-check"></i> Berhasi. Berhasil menyimpan data.</h6>
				</div>
				');
		}else{
			$this->session->set_flashdata('psn','
				<div class="alert alert-danger alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-ban"></i> Error Insert Database Error.!</h6>
				</div>');
		}

		redirect('/admin/Article', 'refresh');

	}

	public function getById()
	{
		$id = $this->input->post('id');

		$where = array(
			'id' => $id
		);

		$data = $this->M_dinamis->getById('t_artikel', $where);

		echo json_encode($data);
	}

	public function hapus()
	{
		$id = $this->input->post('id');

		$where = array(

			'id' => $id

		);

		$pross = $this->M_dinamis->delete('t_artikel', $where);

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

/* End of file Article.php */
/* Location: ./application/controllers/admin/Article.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImageBody extends CI_Controller {

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
		$tmp['tittle'] = 'Image Body';
		$tmp['content'] = 'Img_body';
		$tmp['dataPicture'] = $this->M_dinamis->add_all('t_imgbody', '*', 'id', 'asc');
		$this->load->view('admin/tamplate.php', $tmp);
	}


	public function save()
	{
		$imageExtention = pathinfo($_FILES["pictX"]['name'], PATHINFO_EXTENSION);
		$image = time().'_'.'picture.'.$imageExtention; //Filename
		$config = array(
			'upload_path' => "./assets/list_picture",   //here folder name added Upload file Destination 
			'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",  //some added Accepted types
			'overwrite' => TRUE,
			'file_name' => $image
		);
		$this->load->library('upload', $config); 

		if($this->upload->do_upload('pictX'))
		{
			
		} else {

			$this->session->set_flashdata('psn','
				<div class="alert alert-danger alert-sm alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h6><i class="icon fa fa-ban"></i> Error '.$this->upload->display_errors().'.!</h6>
				</div>');
			redirect('/admin/Picture', 'refresh');

		}


		$dataInsert = array(

			'name' => $image,
			'created_at' => date('Y-m-d h:i:s')

		);

		$pross = $this->M_dinamis->save('t_imgbody', $dataInsert);

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

		redirect('/admin/ImageBody', 'refresh');
	}


	public function hapus()
	{
		$id = $this->input->post('id');

		$where = array(

			'id' => $id

		);

		$pross = $this->M_dinamis->delete('t_imgbody', $where);

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

/* End of file Picture.php */
/* Location: ./application/controllers/admin/Picture.php */
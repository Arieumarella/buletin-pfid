<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_csrf extends CI_Controller {

	public function index()
	{
		$data = array(
			'name' => $this->security->get_csrf_token_name(),
			'token' =>  $this->security->get_csrf_hash()
		);

		echo json_encode($data);
	}

}

/* End of file Get_csrf.php */
/* Location: ./application/controllers/admin/Get_csrf.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stripMap extends CI_Controller {

	public function index()
	{
		$tmp['tittle'] = 'Main Data';
		$tmp['content'] = 'stripMap';

		$this->load->view('admin/tamplate.php', $tmp);
	}

}

/* End of file stripMap.php */
/* Location: ./application/controllers/admin/stripMap.php */
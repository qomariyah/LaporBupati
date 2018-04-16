<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//Do your magic here
	}

	public function index() {
		$data['title'] = "Tentang Lapor Bupati - Lapor Bupati";
		$data['content'] = "tentang-lb";
		$data['judul'] = "Tentang Lapor Bupati";
		$data['breadcrumb'] = "Tentang Lapor Bupati";
		$this->load->view('view_front/lbfront', $data);
	}

}

/* End of file Tentang.php */
/* Location: ./application/controllers/front/Tentang.php */
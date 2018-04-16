<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mpengaturan');
	}

	public function index(){
        $data = array(
			"title"			=> "Pengaturan - Admin Lapor Bupati",
			"content"		=> "pengaturan",
			"breadcrumb"	=> "Pengaturan",
			"Pengaturan"		=> "active",
			"data_pengaturan"	=> $this->mpengaturan->read()
		);
        $this->load->view('view_admin/lbadmin', $data);
	}

}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/admin/Pengaturan.php */
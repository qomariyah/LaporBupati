<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mkomentar');
	}

	public function index(){
		$data = array(
			"title"				=> "Data Komentar - Admin Lapor Bupati",
			"content"			=> "semua-komentar",
			"breadcrumb"		=> "Data Komentar",
			"Komentar"			=> "active",
			"semua_komentar" 	=> "active"
		);
        $this->load->view('view_admin/lbadmin', $data);
	}

    public function komentar_hari_ini(){
    	$data = array(
			"title"				=> "Data Komentar Hari Ini - Admin Lapor Bupati",
			"content"			=> "komentar-hari-ini",
			"breadcrumb"		=> "Data Komentar Hari Ini",
			"Komentar"			=> "active",
			"komentar_hari_ini" 	=> "active"
		);
        $this->load->view('view_admin/lbadmin', $data);
    }

}

/* End of file Komentar.php */
/* Location: ./application/controllers/admin/Komentar.php */
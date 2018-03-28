<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masukan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mmasukan');
	}

	public function index(){
		$data = array(
			"title"			=> "Data Masukan - Admin Lapor Bupati",
			"content"		=> "semua-masukan",
			"breadcrumb"	=> "Data Masukan",
			"masukan"		=> "active",
			"dmasukan"		=> "active",
			"datamasukan"	=> $this->mmasukan->read()->result()
		);
        $this->load->view('view_admin/lbadmin', $data);
	}

    public function masukan_hari_ini(){
    	$data = array(
			"title"			=> "Data Masukan Hari Ini - Admin Lapor Bupati",
			"content"		=> "masukan-hari-ini",
			"breadcrumb"	=> "Data Masukan Hari Ini",
			"masukan"		=> "active",
			"dmasukan"		=> "active"
		);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function masukan_bulan_ini(){
    	$data = array(
			"title"			=> "Data Masukan Bulan Ini - Admin Lapor Bupati",
			"content"		=> "masukan-bulan-ini",
			"breadcrumb"	=> "Data Masukan Bulan Ini",
			"masukan"		=> "active",
			"dmasukan"		=> "active"
		);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function detail_masukan(){
    	$data = array(
			"title"			=> "Detail Masukan - Admin Lapor Bupati",
			"content"		=> "detail-masukan",
			"breadcrumb"	=> "Detail Masukan",
			"masukan"		=> "active",
			"dmasukan"		=> "active"
		);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function tambah_masukan(){
    	$data = array(
			"title"			=> "Masukan - Admin Lapor Bupati",
			"content"		=> "tambah-masukan",
			"breadcrumb"	=> "Tambah Masukan",
			"masukan"		=> "active",
			"dmasukan"		=> "active"
		);
        $this->load->view('view_admin/lbadmin', $data);
    }

}

/* End of file Masukan.php */
/* Location: ./application/controllers/admin/Masukan.php */
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

    public function hari_ini($offset = 0){
    	$data = array(
			"title"				=> "Data Komentar Hari Ini - Admin Lapor Bupati",
			"content"			=> "komentar-hari-ini",
			"breadcrumb"		=> "Data Komentar Hari Ini",
			"Komentar"			=> "active",
			"komentar_hari_ini" 	=> "active"
		);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function tambah(){
    	$data = array(
    		'id_admin'      => $this->session->userdata('id_admin'),
            'id_aduan'      => $this->input->post('id'),
            'komentar'      => $this->input->post('komentar'),
            'role'          => 1
    	);
    	$this->mkomentar->insert($data);
    	$this->session->set_flashdata('notif', 'Tanggapan berhasil ditambahkan');
        $this->session->set_flashdata('type', 'success');
        redirect('sysadmin/aduan/detail/'.$this->input->post('id'),'refresh');
    }

}

/* End of file Komentar.php */
/* Location: ./application/controllers/admin/Komentar.php */
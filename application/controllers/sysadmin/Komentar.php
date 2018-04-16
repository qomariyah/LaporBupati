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

    public function delete(){
    	$id = $this->input->post('id');
    	$id_aduan = $this->input->post('id_aduan');
    	$uri = $this->input->post('uri');
    	$this->mkomentar->delete($id);
    	$this->session->set_flashdata('notif', 'Tanggapan berhasil dihapus');
        $this->session->set_flashdata('type', 'success');
    	if ($uri == 'detail') {
    		redirect('sysadmin/aduan/detail/'.$id_aduan,'refresh');
    	}
    }

    public function update(){
    	$id_aduan = $this->input->post('id_aduan');
    	$id = $this->input->post('id_komentar');
    	$uri = $this->input->post('uri');
    	$data = array(
    		'komentar'		=> $this->input->post('komentar')
    	);
    	$this->mkomentar->update($data, $id);
    	$this->session->set_flashdata('notif', 'Tanggapan berhasil dihapus');
        $this->session->set_flashdata('type', 'success');
    	if ($uri == 'detail') {
    		redirect('sysadmin/aduan/detail/'.$id_aduan,'refresh');
    	}
    }

}

/* End of file Komentar.php */
/* Location: ./application/controllers/admin/Komentar.php */
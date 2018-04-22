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
			"content"		=> "masukan",
			"breadcrumb"	=> "Data Masukan",
			"masukan"		=> "active",
			"dmasukan"		=> "active",
			"datamasukan"	=> $this->mmasukan->read()->result()
		);
        $this->load->view('view_admin/lbadmin', $data);
	}

    public function tambah(){
    	$data = array(
			"title"			=> "Masukan - Admin Lapor Bupati",
			"content"		=> "tambah-masukan",
			"breadcrumb"	=> "Tambah Masukan",
			"masukan"		=> "active",
			"dmasukan"		=> "active"
		);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function delete(){
    	$id = $this->input->post('id');
    	$q = $this->mmasukan->delete($id);
    	if ($q) {
    		$this->session->set_flashdata('notif', 'Data masukan berhasil dihapus');
    		$this->session->set_flashdata('type', 'success');
    		redirect('sysadmin/masukan','refresh');
    	}else{
    		$this->session->set_flashdata('notif', 'Data masukan gagal dihapus');
    		$this->session->set_flashdata('type', 'error');
    		redirect('sysadmin/masukan','refresh');
    	}
    }

}

/* End of file Masukan.php */
/* Location: ./application/controllers/admin/Masukan.php */
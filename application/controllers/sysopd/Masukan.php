<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masukan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mmasukan');
	}

    public function tambah(){
    	$data = array(
			"title"			=> "Masukan - Admin Lapor Bupati",
			"content"		=> "tambah-masukan",
			"breadcrumb"	=> "Tambah Masukan",
			"masukan"		=> "active",
			"dmasukan"		=> "active"
		);
        $this->load->view('view_opd/lbopd', $data);
    }

    public function create(){
    	$data = array(
    		'email'		=> $this->input->post('email'),
    		'masukan'	=> $this->input->post('masukan')
    	);
    	$q = $this->mmasukan->create($data);

    	if ($q) {
    		$this->session->set_flashdata('notif', 'Terima kasih atas masukan, kritik dan saran anda');
        	$this->session->set_flashdata('type', 'success');
        	redirect('sysopd/masukan/tambah','refresh');
    	}else{
    		$this->session->set_flashdata('notif', 'Masukan gagal dikirim');
        	$this->session->set_flashdata('type', 'error');
        	redirect('sysopd/masukan/tambah','refresh');
    	}
    }

}

/* End of file Masukan.php */
/* Location: ./application/controllers/admin/Masukan.php */
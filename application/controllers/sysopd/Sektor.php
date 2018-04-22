<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sektor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('msektor');
        $this->load->model('maktivitas');
        if ($this->session->flashdata('permission' != 'granted')) {
            redirect('403','refresh');
        }
	}

	public function index(){
		$data['title'] = "Data Sektor - Admin Lapor Bupati";
        $data['content'] = "sektor";
        $data['breadcrumb'] = "Data Sektor";
        $data['Sektor'] = "active";
        $data['ssektor'] = "active";
        $data['data_sektor'] = $this->msektor->read();
        $this->load->view('view_opd/lbopd', $data);
	}

}

/* End of file Sektor.php */
/* Location: ./application/controllers/admin/Sektor.php */
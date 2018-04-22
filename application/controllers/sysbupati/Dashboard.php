<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != 'loginberhasil'){
            redirect(base_url('sysadminlogin/oauth'));
        }
	}

	public function index(){
		$data['title'] = "Admin Lapor Bupati";
        $data['content'] = "dashboard";
        $data['breadcrumb'] = "Dashboard";
        $data['Dashboard'] = "active";
        $data['aktivitas'] = $this->maktivitas->read();
        $data['jml_aktivitas'] = $this->maktivitas->read();
		$this->load->view('view_bupati/lbbupati', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
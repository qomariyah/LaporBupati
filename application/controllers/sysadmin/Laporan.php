<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index(){
		$data['title'] = "Cetak Laporan Aduan - Admin Lapor Bupati";
        $data['content'] = "laporan";
        $data['breadcrumb'] = "Laporan";
        $data['laporan'] = "active";
        $data['laporan_hari_ini'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */
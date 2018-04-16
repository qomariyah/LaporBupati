<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('mfront');
		$this->load->model('mmasukan');
	}

	public function index() {
		$data['title'] = "Kontak - Lapor Bupati";
		$data['content'] = "kontak";
		$data['judul'] = "Kontak";
		$data['breadcrumb'] = "Kontak";
		$this->load->view('view_front/lbfront', $data);
	}

	public function kirimmasukan(){
		$data = array (
			'email'		=> $this->input->post('email'),
			'masukan'	=> $this->input->post('masukan')
		);
		$this->mmasukan->create($data);
		redirect('kontak');
	}

}

/* End of file Masukan.php */
/* Location: ./application/controllers/front/Masukan.php */
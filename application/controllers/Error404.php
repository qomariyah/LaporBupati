<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$data = array (
                    'title' => 'Halaman Tidak Ditemukan',
                    'content' => 'error-404-page',
                );
		$this->output->set_status_header('404');
		$this->load->view('404.php', $data);
	}

}

/* End of file Error404.php */
/* Location: ./application/controllers/Error404.php */
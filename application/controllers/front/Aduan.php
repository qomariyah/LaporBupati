<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aduan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('maduan');
		$this->load->model('mkomentar');
	}

	public function index(){
		
	}

	public function aduan_saya() {
		$data['title'] = "Aduan Saya - Lapor Bupati";
		$data['content'] = "lihat-aduan-saya";
		$this->load->view('view_front/lbfront', $data);
	}

	public function detail($id) {
		$cek = $this->maduan->getAduanById(base64_decode($id))->num_rows();
		if ($cek <= 0) {
			$this->load->view('404');
		}else {
			$data['title'] = "Detail Aduan - Lapor Bupati";
			$data['content'] = "detail-aduan";
			$data['aduan'] = $this->maduan->getAduanById(base64_decode($id))->result();
			$data['komentar'] = $this->mkomentar->komentarById(base64_decode($id))->result();
			$this->load->view('view_front/lbfront', $data);
		}
	}

}

/* End of file Aduan.php */
/* Location: ./application/controllers/front/Aduan.php */
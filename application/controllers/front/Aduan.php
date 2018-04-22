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

	public function tambah(){
		$nm_file = "aduan_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/aduan/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3672';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
        $this->upload->initialize($config);

        if(isset($_FILES['lampiran']['name'])){
        	$this->upload->do_upload('lampiran');
        	$data_upload = $this->upload->data();

        	$data = array(
        		'id_user'	=> $this->session->userdata('id_user'),
        		'aduan'		=> $this->input->post('aduan'),
        		'lampiran'	=> $data_upload['file_name'],
        		'kategori'	=> $this->input->post('kategori'),
	            'dibaca' => '0'
        	);

        	$q = $this->maduan->tambah($data);
        	if ($q) {
        		$this->session->set_flashdata('notif', 'Aduan berhasil dikirim. Aduan akan diperiksa admin sebelum dipublikasikan');
                $this->session->set_flashdata('type', 'success');
        	}else{
        		$this->session->set_flashdata('notif', 'Aduan gaga; dikirim');
                $this->session->set_flashdata('type', 'error');
        	}
        	redirect(site_url(),'refresh');

        }else{
        	$data = array(
        		'id_user'	=> $this->session->userdata('id_user'),
        		'aduan'		=> $this->input->post('aduan'),
        		'kategori'	=> $this->input->post('kategori'),
	            'dibaca' => '0'
        	);

        	$q = $this->maduan->tambah($data);
        	if ($q) {
        		$this->session->set_flashdata('notif', 'Aduan berhasil dikirim. Aduan akan diperiksa admin sebelum dipublikasikan');
                $this->session->set_flashdata('type', 'success');
        	}else{
        		$this->session->set_flashdata('notif', 'Aduan gaga; dikirim');
                $this->session->set_flashdata('type', 'error');
        	}
        	redirect(site_url(),'refresh');
	    }
	}

}

/* End of file Aduan.php */
/* Location: ./application/controllers/front/Aduan.php */
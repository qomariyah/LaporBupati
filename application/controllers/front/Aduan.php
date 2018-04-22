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

	public function data($offset = 0){
      $data['title'] = "Aduan - Lapor Bupati";
      $data['content'] = "aduan";
      $data['judul'] = "Aduan";

      $q = $this->input->get('cari');

      if (!isset($q)) {
         $config['base_url'] = site_url('aduan/data/');
         $config['total_rows'] = $this->maduan->jmlAduanFront();
         $config['per_page'] = 3;
         $config['uri_segment'] = 3;
         $config['num_links'] = 5;
         $config['full_tag_open'] = '<ul class="pagination">';
         $config['full_tag_close'] = '</ul>';
         $config['first_link'] = 'First';
         $config['first_tag_open'] = '<li class="waves-effect">';
         $config['first_tag_close'] = '</li>';
         $config['last_link'] = 'Last';
         $config['last_tag_open'] = '<li class="waves-effect">';
         $config['last_tag_close'] = '</li>';
         $config['next_link'] = '&gt;';
         $config['next_tag_open'] = '<li class="waves-effect">';
         $config['next_tag_close'] = '</li>';
         $config['prev_link'] = '&lt;';
         $config['prev_tag_open'] = '<li class="waves-effect">';
         $config['prev_tag_close'] = '</li>';
         $config['cur_tag_open'] = '<li class="waves-effect active"><a href="#">';
         $config['cur_tag_close'] = '</a></li>';
         $config['num_tag_open'] = '<li class="waves-effect">';
         $config['num_tag_close'] = '</li>';
         
         $this->pagination->initialize($config);
         $data['pagination'] = $this->pagination->create_links();
         $data['data_aduan'] = $this->maduan->aduanFront($config['per_page'], $offset);
         $data['jml_data'] = $this->maduan->jmlAduanFront();
      }else{
         $config['base_url'] = site_url('aduan/data/');
         $config['total_rows'] = $this->maduan->jmlCariAduanFront($q);
         $config['per_page'] = 3;
         $config['uri_segment'] = 3;
         $config['num_links'] = 5;
         $config['full_tag_open'] = '<ul class="pagination">';
         $config['full_tag_close'] = '</ul>';
         $config['first_link'] = 'First';
         $config['first_tag_open'] = '<li class="waves-effect">';
         $config['first_tag_close'] = '</li>';
         $config['last_link'] = 'Last';
         $config['last_tag_open'] = '<li class="waves-effect">';
         $config['last_tag_close'] = '</li>';
         $config['next_link'] = '&gt;';
         $config['next_tag_open'] = '<li class="waves-effect">';
         $config['next_tag_close'] = '</li>';
         $config['prev_link'] = '&lt;';
         $config['prev_tag_open'] = '<li class="waves-effect">';
         $config['prev_tag_close'] = '</li>';
         $config['cur_tag_open'] = '<li class="waves-effect active"><a href="#">';
         $config['cur_tag_close'] = '</a></li>';
         $config['num_tag_open'] = '<li class="waves-effect">';
         $config['num_tag_close'] = '</li>';
         
         $this->pagination->initialize($config);
         $data['pagination'] = $this->pagination->create_links();
         $data['data_aduan'] = $this->maduan->cariAduanFront($q, $config['per_page'], $offset);
         $data['jml_data'] = $this->maduan->jmlCariAduanFront($q);
         if ($this->maduan->jmlCariAduanFront($q) > 0) {
            $this->session->set_flashdata('q', 'Menampilkan hasil pencarian <b>'.$q.'</b> '.$this->maduan->jmlCariAduanFront($q).' ditemukan');
         }else{
            $this->session->set_flashdata('q', 'Menampilkan hasil pencarian <b>'.$q.'</b> ');
         }
      }

      $this->load->view('view_front/lbfront', $data);
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
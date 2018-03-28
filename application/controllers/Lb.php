<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lb extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('mfront');
		$this->load->model('mopd');
		$this->load->model('maduan');
	}

	public function create_captcha(){
        $option = array (
            'img_path'		=> './files/captcha/',
            'img_url'		=> base_url('files/captcha'),
            'img_width'		=> '190',
            'img_height'	=> '45',
            'word_length'	=> 4,
            'font_size'		=> 20,
            'pool'			=> '0123456789',
            'expiration'	=> 7200
        );

        $cap = create_captcha($option);
        $image = $cap['image'];

        $this->session->set_userdata('captchaword', $cap['word']);
        return $image;
    }

    public function check_captcha(){
        if ($this->input->post('captcha') == $this->session->userdata('captchaword')) {
            return true;
        }else{
            return false;
        }
    }

    public function register_user() {
    	$data = array(
    		'id_user'	=> '',
    		'no_ktp'	=> $this->input->post('ktp'),
    		'nama_user'	=> $this->input->post('nama'),
    		'username'	=> $this->input->post('username'),
    		'password'	=> $this->input->post('pass'),
    		'email' 	=> $this->input->post('email'),
    		'no_telepon'=> $this->input->post('telp')
    	);
    	$this->mfront->register($data);
    }

	public function index() {
		$data['title'] = "Lapor Bupati";
		$data['content'] = "home";
		$data['image'] = $this->create_captcha();
		$data['aduan'] = $this->maduan->get_all_aduan();
		$this->load->view('view_front/lbfront', $data);
	}

	public function tentang_lb() {
		$data['title'] = "Tentang Lapor Bupati - Lapor Bupati";
		$data['content'] = "tentang-lb";
		$data['judul'] = "Tentang Lapor Bupati";
		$data['breadcrumb'] = "Tentang Lapor Bupati";
		$this->load->view('view_front/lbfront', $data);
	}

	public function kontak() {
		$data['title'] = "Kontak - Lapor Bupati";
		$data['content'] = "kontak";
		$data['judul'] = "Kontak";
		$data['breadcrumb'] = "Kontak";
		$this->load->view('view_front/lbfront', $data);
	}

	public function profil() {
		$data['title'] = "Profil Saya - Lapor Bupati";
		$data['content'] = "profil";
		$this->load->view('view_front/lbfront', $data);
	}

	public function petunjuk_syarat() {
		$data['title'] = "Petunjuk & Syarat - Lapor Bupati";
		$data['content'] = "petunjuk-dan-syarat";
		$this->load->view('view_front/lbfront', $data);
	}

	public function data_opd() {
		$data['title'] = "Data OPD - Lapor Bupati";
		$data['content'] = "data-opd";
		$data['judul'] = "Data OPD";
		$data['breadcrumb'] = "Data OPD";
		$data['data_opd'] = $this->mopd->read();
		$this->load->view('view_front/lbfront', $data);
	}

	public function detail_opd() {
		$data['title'] = "Detail OPD - Lapor Bupati";
		$data['content'] = "detail-opd";
		$data['judul'] = "Detail OPD";
		$data['breadcrumb'] = "Detail OPD";
		$this->load->view('view_front/lbfront', $data);
	}

	public function login(){
		if($this->session->userdata('code') == 'loginuserberhasil'){
            redirect(site_url('profil'));
        }
		$data['title'] = "Login - Lapor Bupati";
		$data['content'] = "login";
		$data['error'] = "";
		$data['image'] = $this->create_captcha();
		$this->load->view('view_front/lbfront', $data);
	}

	public function auth(){
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');
		$result = $this->mfront->login($email, $pass);
		if ($result->num_rows() > 0 ) {
			foreach ($result->result() as $row){
                $data_session = array(
                    'id_user' => $row->id_user,
                    'nama_user' => $row->nama_user,
                    'code' => 'loginuserberhasil'
                );
            }
            $this->session->set_userdata($data_session);
            redirect(site_url(),'refresh');
        }else {
        	$data['title'] = "Login - Lapor Bupati";
			$data['content'] = "login";
			$data['error'] = "<p class='alert alert-danger'>Gagal Coeg</p>";
			$data['image'] = $this->create_captcha();
			$this->load->view('view_front/lbfront', $data);
        }
	}

	public function forget_password(){
		$data['title'] = "Lupa Kata Sandi - Lapor Bupati";
		$data['content'] = "forget-password";
		$data['image'] = $this->create_captcha();
		$this->load->view('view_front/lbfront', $data);
	}

	public function register(){
		$data['title'] = "Daftar - Lapor Bupati";
		$data['content'] = "register";
		$data['image'] = $this->create_captcha();
		$this->load->view('view_front/lbfront', $data);
	}

	function logout() {
        $data_session_unset = array(
                'id_user',
                'nama_user',
                'code',
            );
        $this->session->unset_userdata($data_session_unset);
        redirect(site_url(), 'refresh');
    }

}

/* End of file Lb.php */
/* Location: ./application/controllers/Lb.php */
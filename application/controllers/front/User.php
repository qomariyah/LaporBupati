<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Do your magic here
		$this->load->model('muser');
	}

	public function index(){
		
	}

	public function profil() {
		$data['title'] = "Profil Saya - Lapor Bupati";
		$data['content'] = "profil";
		$this->load->view('view_front/lbfront', $data);
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

	public function registeruser() {
    	$data = array(
    		'id_user'	=> '',
    		'no_ktp'	=> $this->input->post('ktp'),
    		'nama_user'	=> $this->input->post('nama'),
    		'username'	=> $this->input->post('username'),
    		'password'	=> $this->input->post('pass'),
    		'email' 	=> $this->input->post('email'),
    		'no_telepon'=> $this->input->post('telp')
    	);
    	$this->muser->register($data);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/front/User.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('muser');
		$this->load->model('mfront');
	}

	public function index(){
		
	}

	public function auth(){
		$email  = $this->input->post('email');
		$pass   = $this->input->post('pass');
		$result = $this->mfront->login($email, $pass);
		if ($result->num_rows() > 0 ) {
			foreach ($result->result() as $row){
                $data_session = array(
                    'id_user' 	=> $row->id_user,
                    'nama_user' => $row->nama_user,
                    'email'		=> $row->email,
                    'no_ktp'	=> $row->no_ktp,
                    'jk'		=> $row->jk,
                    'tmp_lahir'	=> $row->tmp_lahir,
                    'tgl_lahir'	=> $row->tgl_lahir,
                    'password'	=> $row->password,
                    'no_telepon'=> $row->no_telepon,
                    'foto'		=> $row->foto,
                    'thumb'		=> $row->thumb,
                    'alamat'	=> $row->alamat,
                    'bio'		=> $row->bio,
                    'dibuat'	=> $row->dibuat,
                    'code' 		=> 'loginuserberhasil'
                );
            }
            $this->session->set_userdata($data_session);
            redirect(site_url(),'refresh');
        }else {
        	$data['title']		= "Login - Lapor Bupati";
			$data['content']	= "login";

            $this->session->set_flashdata('notif', '<p style="color:white">Email/No. Telepon dan kata sandi tidak cocok!</p>');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url('login'),'refresh');
        }
	}

	public function profil() {
		$data['title'] = "Profil- Lapor Bupati";
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
        $this->session->set_flashdata('notif', '<p style="color:white">Pendaftaran berhasil! periksa email anda untuk mengaktifkan akun</p>');
        $this->session->set_flashdata('type', 'success');
        redirect(site_url('login'),'refresh');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/front/User.php */
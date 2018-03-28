<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sysadminlogin extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('mlogin');

        if($this->session->userdata('status') == 'loginberhasil'){
            redirect(base_url('sysadmin'));
        }
        if($this->session->userdata('level') == 'Administrator'){
            redirect(base_url('sysadmin'));
        }
	}

    public function create_captcha(){
        $option = array (
            'img_path' => './files/captcha/',
            'img_url' => base_url('files/captcha'),
            'img_width' => '150',
            'img_height' => '40',
            'word_length'   => 5,
            'font_size'     => 30,
            'pool' => '0123456789',
            'expiration' => 7200
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

	public function index() {
		$data['title'] = "Lapor Bupati - Admin Login";
        $data['error'] = "";
        $data['image'] = $this->create_captcha();
        $this->load->view('login', $data);
    }

    public function auth() {
        if ($this->input->post('captcha') != $this->session->userdata('captchaword')) {
            $this->session->set_flashdata('error', 'Kode Salah! silahkan masukkan kode yang benar!');
            redirect(base_url('sysadminlogin'),'refresh');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->mlogin->login($username);
            if($result->num_rows() == 1 ){
                foreach ($result->result() as $row){
                    $data = $row->password;
                }
                if (password_verify($password, $data)) {
                    foreach ($result->result() as $row){
                        $data_session = array(
                            'id_admin' => $row->id_admin,
                            'nama_admin' => $row->nama_admin,
                            'level' => $row->level,
                            'foto' => $row->foto,
                            'thumb' => $row->thumbnail,
                            'email' => $row->email,
                            'status' => 'loginberhasil'
                        );
                    }
                    $this->session->set_userdata($data_session);
                    redirect('sysadmin','refresh');
                }else{
                    $this->session->set_flashdata('error', 'Username/password yang anda masukkan salah!');
                    redirect(base_url('sysadminlogin'),'refresh');
                }
            }else{
                $this->session->set_flashdata('error', 'Username/password yang anda masukkan salah!');
                redirect(base_url('sysadminlogin'),'refresh');
            }
        }
    }

    public function oauth() {
        $this->session->set_flashdata('error', 'Anda belum login! silahkan masukkan username & password!');
        redirect(base_url('sysadminlogin'),'refresh');
    }

    function logout() {
        $data_session_unset = array(
                'id_admin',
                'nama_admin',
                'level',
                'foto',
                'thumb',
                'email',
                'status'
            );
        $this->session->unset_userdata($data_session_unset);
        redirect(base_url('sysadminlogin'));
    }

}

/* End of file Adminlogin.php */
/* Location: ./application/controllers/Adminlogin.php */
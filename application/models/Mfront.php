<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mfront extends CI_Model {

	public function register($data){
		$this->db->insert('tb_user', $data);
	}

	public function login($email, $pass){
		$this->db->where('email =', $email)
		->or_where('no_telepon =', $email);
		$this->db->where('password', $pass);
		$this->db->where('aktif', 1);
		return $this->db->get('tb_user');
	}

}

/* End of file Mfront.php */
/* Location: ./application/models/Mfront.php */
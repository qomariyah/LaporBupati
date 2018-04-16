<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmasukan extends CI_Model {

	public function read(){
		return $this->db->get('tb_masukan');
	}

	public function create($data) {
		$this->db->insert('tb_masukan', $data);
	}

}

/* End of file Mmasukan.php */
/* Location: ./application/models/Mmasukan.php */
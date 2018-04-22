<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmasukan extends CI_Model {

	public function read(){
		return $this->db->get('tb_masukan');
	}

	public function create($data) {
		return $this->db->insert('tb_masukan', $data);
	}

	public function delete($id){
		$this->db->where('id_masukan', $id);
		return $this->db->delete('tb_masukan');
	}

}

/* End of file Mmasukan.php */
/* Location: ./application/models/Mmasukan.php */
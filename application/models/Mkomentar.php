<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkomentar extends CI_Model {

	public function insert($data){
		$this->db->insert('tb_komentar', $data);
	}

	public function komentarById($id){
		$this->db->where('id_aduan', $id);
		return $this->db->get('tb_komentar');
	}
	

}

/* End of file Mkomentar.php */
/* Location: ./application/models/Mkomentar.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maktivitas extends CI_Model {

	function read(){
		$this->db->join('tb_admin', 'tb_aktivitas.id_admin = tb_admin.id_admin');
		$this->db->order_by('tb_aktivitas.dibuat', 'desc');
		$this->db->where('dibaca', 0);
		$this->db->limit(10);
		return $this->db->get('tb_aktivitas');
	}

	function create($data){
		$this->db->insert('tb_aktivitas', $data);
	}

}

/* End of file Maktivitas.php */
/* Location: ./application/models/Maktivitas.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msektor extends CI_Model {

	public function read(){
		$this->db->join('tb_admin', 'tb_sektor.id_admin = tb_admin.id_admin');
		$this->db->order_by('sektor', 'asc');
		return $this->db->get('tb_sektor')->result();
	}

	public function create($data){
		$feedback = $this->db->insert('tb_sektor', $data);
		if ($feedback) {
			return true;
		}else{
			return false;
		}
	}

	public function update($id, $data){
    	$this->db->where('id_sektor', $id);
        return $this->db->update('tb_sektor', $data);
    }

	public function getSektor($id){
		$this->db->where('id_sektor', $id);
		return $this->db->get('tb_sektor')->result();
	}

	public function daftarSektor(){
		return $this->db->get('tb_sektor');
	}

	public function get_id_sektor($id) {
        $this->db->where('id_sektor', $id);
        return $this->db->get('tb_sektor')->result_array();
    }

	public function delete($id){
		$this->db->where('id_sektor', $id);
		$this->db->delete('tb_sektor');
	}

}

/* End of file Msektor.php */
/* Location: ./application/models/Msektor.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mopd extends CI_Model {

	public function read(){
		$this->db->order_by('id_opd', 'asc');
		return $this->db->get('tb_opd')->result();
	}

	public function jumlah_opd(){
		return $this->db->get('tb_opd')->num_rows();
	}

	public function get_limit_opd($limit, $offset) {
        return $this->db->get('tb_opd', $limit, $offset)->result();
    }

    public function cariOpd($query, $limit, $offset) {
        $this->db->like('nama_opd', $query, 'BOTH');
        return $this->db->get('tb_opd', $limit, $offset);
    }

    public function jmlCariOpd($query){
        $this->db->like('nama_opd', $query, 'BOTH');
        return $this->db->get('tb_opd');
    }

	public function create($data){
		$this->db->insert('tb_opd', $data);
	}

	public function update($id, $data){
    	$this->db->where('id_opd', $id);
        return $this->db->update('tb_opd', $data);
    }

    public function delete($id){
    	$this->db->where('id_opd', $id);
        return $this->db->delete('tb_opd');
    }

	public function get_id_opd($id) {
        $this->db->where('id_opd', $id); //order by
        return $this->db->get('tb_opd')->result_array();
    }

    public function daftar_opd() {
        $this->db->select('*');
        $this->db->from('tb_opd');
        $this->db->order_by('id_opd');
        return $this->db->get()->result();
    }

}

/* End of file Minstansi.php */
/* Location: ./application/models/Minstansi.php */
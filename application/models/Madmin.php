<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	public function read(){
        $this->db->order_by('id_admin', 'desc');
        return $this->db->get('tb_admin')->result();
    }

    public function jumlah_admin(){
        return $this->db->get('tb_admin')->num_rows();
    }

    public function get_limit_admin($limit, $offset) {
        return $this->db->get('tb_admin', $limit, $offset)->result();
    }

    public function create($data){
    	return $this->db->insert('tb_admin', $data);
    }

    public function delete($id){
    	$this->db->where('id_admin', $id);
        return $this->db->delete('tb_admin');
    }

    public function update($id, $data){
    	$this->db->where('id_admin', $id);
        return $this->db->update('tb_admin', $data);
    }

    public function getadmin($id){
    	$this->db->where('id_admin', $id);
        return $this->db->get('tb_admin')->result();
    }

    public function createID(){
    	$this->db->order_by('id_admin', 'desc');
        return $this->db->get('tb_admin')->result();
    }

    public function aktifkan($id){
    	$data = array(
            'aktif' => '1'
        );
        $this->db->where('id_admin', $id); //where
        return $this->db->update('tb_admin', $data);
    }

    public function nonaktifkan($id){
    	$data = array(
            'aktif' => '0'
        );
        $this->db->where('id_admin', $id); //where
        return $this->db->update('tb_admin', $data);
    }

    public function getAdminopd(){
        $data = $this->db->query("SELECT a.id_admin, a.nama_admin FROM tb_admin a, tb_opd b WHERE a.level = 'Admin OPD' AND a.id_admin NOT IN(SELECT b.id_admin FROM tb_opd) GROUP BY a.id_admin ORDER BY a.nama_admin");
        return $data->result();
    }

    public function autoId(){
        $this->db->order_by('id_admin', 'desc');
        return $this->db->get('tb_admin', 1, 0);
    }

}

/* End of file Mhbadmin.php */
/* Location: ./application/models/Mhbadmin.php */
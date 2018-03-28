<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {

	public function read(){
        $this->db->order_by('id_user', 'desc');
        return $this->db->get('tb_user')->result();
    }

    public function create($data){
        return $this->db->insert('tb_user', $data);
    }

    public function update($id, $data){
        $this->db->where('id_user', $id);
        return $this->db->update('tb_user', $data);
    }

    public function delete($id){
        $this->db->where('id_user', $id);
        return $this->db->delete('tb_user');
    }

    public function get_id_user($id) {
        $this->db->where('id_user', $id);
        return $this->db->get('tb_user');
    }

    public function getUser($id){
    	$this->db->where('id_user', $id);
        return $this->db->get('tb_user')->result();
    }

    public function jumlah_user(){
		return $this->db->get('tb_user')->num_rows();
	}

	public function get_limit_user($limit, $offset) {
        return $this->db->get('tb_user', $limit, $offset)->result();
    }

    public function register($data){
        $this->db->insert('tb_user', $data);
    }

}

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */
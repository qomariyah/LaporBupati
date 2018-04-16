<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {

	public function read(){
        $this->db->select('*, tb_user.dibuat as tanggal, (select count(tb_aduan.id_user) from tb_aduan where tb_user.id_user=tb_aduan.id_user and tb_aduan.status != "masuk" and tb_aduan.status != "bukan kewenangan" and tb_aduan.status != "sampah" group by tb_aduan.id_user) as jmladuan');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
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
        $this->db->select('*, tb_user.dibuat as tanggal, (select count(tb_aduan.id_user) from tb_aduan where tb_user.id_user=tb_aduan.id_user and tb_aduan.status != "masuk" and tb_aduan.status != "bukan kewenangan" and tb_aduan.status != "sampah" group by tb_aduan.id_user) as jmladuan');
        $this->db->from('tb_user');
        $this->db->where('id_user', $id);
        return $this->db->get();
    }

    public function getUser($id){
    	$this->db->where('id_user', $id);
        return $this->db->get('tb_user')->result();
    }

    public function jumlah_user(){
		return $this->db->get('tb_user')->num_rows();
	}

    public function jumlah_user_cari($query){
        $this->db->like('nama_user', $query, 'BOTH');
        return $this->db->get('tb_user')->num_rows();
    }

	public function get_limit_user($limit, $offset) {
        $this->db->select('*, tb_user.dibuat as tanggal, (select count(tb_aduan.id_user) from tb_aduan where tb_user.id_user=tb_aduan.id_user and tb_aduan.status != "masuk" and tb_aduan.status != "bukan kewenangan" and tb_aduan.status != "sampah" group by tb_aduan.id_user) as jmladuan');
        $this->db->from('tb_user');
        $this->db->order_by('id_user', 'desc');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function get_limit_user_cari($query, $limit, $offset) {
        $this->db->select('*, tb_user.dibuat as tanggal, (select count(tb_aduan.id_user) from tb_aduan where tb_user.id_user=tb_aduan.id_user and tb_aduan.status != "masuk" and tb_aduan.status != "bukan kewenangan" and tb_aduan.status != "sampah" group by tb_aduan.id_user) as jmladuan');
        $this->db->from('tb_user');
        $this->db->order_by('id_user', 'desc');
        $this->db->like('tb_user.nama_user', $query, 'BOTH');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function register($data){
        $this->db->insert('tb_user', $data);
    }

}

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */
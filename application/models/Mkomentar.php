<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkomentar extends CI_Model {

	public function komentar($limit, $offset){
		$this->db->select('tb_komentar.komentar, tb_komentar.id_aduan, tb_komentar.dibuat as tanggal, tb_admin.nama_admin, tb_admin.id_admin, tb_admin.thumbnail as foto_admin, tb_opd.singkatan, tb_opd.id_opd, tb_opd.thumb as foto_opd, tb_user.nama_user, tb_user.id_user, tb_user.thumb as foto_user');
		$this->db->from('tb_komentar');
		$this->db->join('tb_admin', 'tb_komentar.id_admin = tb_admin.id_admin', 'left');
		$this->db->join('tb_opd', 'tb_komentar.id_opd = tb_opd.id_opd', 'left');
		$this->db->join('tb_user', 'tb_komentar.id_user = tb_user.id_user', 'left');
		$this->db->order_by('tb_komentar.dibuat', 'desc');
		$this->db->limit($limit, $offset);
		return $this->db->get();
	}

	public function jmlKomentar(){
		return $this->db->get('tb_komentar')->num_rows();
	}

	public function komentarCari($query, $limit, $offset){
		$this->db->select('tb_komentar.komentar, tb_komentar.id_aduan, tb_komentar.dibuat as tanggal, tb_admin.nama_admin, tb_admin.id_admin, tb_admin.thumbnail as foto_admin, tb_opd.singkatan, tb_opd.id_opd, tb_opd.thumb as foto_opd, tb_user.nama_user, tb_user.id_user, tb_user.thumb as foto_user');
		$this->db->from('tb_komentar');
		$this->db->join('tb_admin', 'tb_komentar.id_admin = tb_admin.id_admin', 'left');
		$this->db->join('tb_opd', 'tb_komentar.id_opd = tb_opd.id_opd', 'left');
		$this->db->join('tb_user', 'tb_komentar.id_user = tb_user.id_user', 'left');
		$this->db->order_by('tb_komentar.dibuat', 'desc');
		$this->db->like('tb_komentar.komentar', $query, 'BOTH');
		$this->db->limit($limit, $offset);
		return $this->db->get();
	}

	public function jmlKomentarCari($query){
		$this->db->like('komentar', $query, 'BOTH');
		return $this->db->get('tb_komentar')->num_rows();
	}

	public function insert($data){
		$this->db->insert('tb_komentar', $data);
	}

	public function delete($id){
		$this->db->where('id_komentar', $id);
		return $this->db->delete('tb_komentar');
	}

	public function update($data, $id){
		$this->db->where('id_komentar', $id);
		$this->db->update('tb_komentar', $data);
	}

	public function komentarById($id){
		$this->db->select('tb_komentar.id_komentar, tb_komentar.id_aduan,tb_komentar.komentar, tb_komentar.id_admin, tb_komentar.id_user, tb_komentar.id_opd, tb_komentar.dibuat as tanggal, tb_admin.nama_admin, tb_admin.thumbnail as foto_admin, tb_opd.singkatan, tb_opd.thumb as foto_opd, tb_user.nama_user, tb_user.thumb as foto_user');
		$this->db->from('tb_komentar');
		$this->db->join('tb_admin', 'tb_komentar.id_admin = tb_admin.id_admin', 'left');
		$this->db->join('tb_opd', 'tb_komentar.id_opd = tb_opd.id_opd', 'left');
		$this->db->join('tb_user', 'tb_komentar.id_user = tb_user.id_user', 'left');
		$this->db->where('tb_komentar.id_aduan', $id);
		return $this->db->get();
	}
	

}

/* End of file Mkomentar.php */
/* Location: ./application/models/Mkomentar.php */
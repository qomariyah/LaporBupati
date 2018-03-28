<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapi extends CI_Model {

	public function login($telp, $pass){
		$this->db->where('email =', $telp)
		->or_where('no_telepon =', $telp);
		$this->db->where('password', $pass);
		$this->db->where('aktif', 1);
		return $this->db->get('tb_user');
	}

	public function register($data){
		$this->db->insert('tb_user', $data);
	}

	public function opd(){
		return $this->db->get('tb_opd')->result_array();
	}

	public function aduan(){
		$this->db->select('tb_aduan.id_aduan, tb_aduan.id_sektor, tb_aduan.id_user, tb_aduan.aduan, tb_aduan.kategori, tb_aduan.lampiran, tb_aduan.longitude, tb_aduan.latitude, tb_aduan.dibuat, tb_aduan.status, tb_user.nama_user, tb_user.thumb, (select count(tb_komentar.id_aduan) from tb_komentar where tb_komentar.id_aduan=tb_aduan.id_aduan group by tb_komentar.id_aduan) as jmlkomen, (select count(tb_aduan.id_user) from tb_aduan where tb_user.id_user=tb_aduan.id_user and tb_aduan.status != "masuk" and tb_aduan.status != "sampah" group by tb_aduan.id_user) as jmladuan');

		$this->db->join('tb_user', 'tb_user.id_user = tb_aduan.id_user', 'left');
		$this->db->join('tb_komentar', 'tb_komentar.id_aduan = tb_aduan.id_aduan', 'left');
		$this->db->where('tb_aduan.status !=', 'masuk');
		$this->db->where('tb_aduan.status !=', 'sampah');
		$this->db->where('tb_aduan.rahasia', 0);
		$this->db->order_by('tb_aduan.dibuat', 'desc');
		$this->db->group_by('tb_aduan.id_aduan');
		return $this->db->get('tb_aduan')->result();
	}

	public function aduansaya($id){
		$this->db->select('tb_aduan.id_aduan, tb_aduan.id_sektor, tb_aduan.id_user, tb_aduan.aduan, tb_aduan.kategori, tb_aduan.lampiran, tb_aduan.longitude, tb_aduan.latitude, tb_aduan.dibuat, tb_aduan.status, tb_user.nama_user, tb_user.thumb, (select count(tb_komentar.id_aduan) from tb_komentar where tb_komentar.id_aduan=tb_aduan.id_aduan group by tb_komentar.id_aduan) as jmlkomen, (select count(tb_aduan.id_user) from tb_aduan where tb_user.id_user=tb_aduan.id_user and tb_aduan.status != "masuk" and tb_aduan.status != "sampah" group by tb_aduan.id_user) as jmladuan');

		$this->db->join('tb_user', 'tb_user.id_user = tb_aduan.id_user', 'left');
		$this->db->join('tb_komentar', 'tb_komentar.id_aduan = tb_aduan.id_aduan', 'left');
		$this->db->where('tb_aduan.status !=', 'masuk');
		$this->db->where('tb_aduan.status !=', 'sampah');
		$this->db->where('tb_aduan.id_user', $id);
		$this->db->where('tb_aduan.rahasia', 1)
		->or_where('tb_aduan.rahasia =', 0);
		$this->db->order_by('tb_aduan.dibuat', 'desc');
		$this->db->group_by('tb_aduan.id_aduan');
		return $this->db->get('tb_aduan')->result();
	}

	public function cariaduan($q){
		$this->db->select('tb_aduan.id_aduan, tb_aduan.id_sektor, tb_aduan.id_user, tb_aduan.aduan, tb_aduan.kategori, tb_aduan.lampiran, tb_aduan.longitude, tb_aduan.latitude, tb_aduan.dibuat, tb_aduan.status, tb_user.nama_user, tb_user.thumb, (select count(tb_komentar.id_aduan) from tb_komentar where tb_komentar.id_aduan=tb_aduan.id_aduan group by tb_komentar.id_aduan) as jmlkomen, (select count(tb_aduan.id_user) from tb_aduan where tb_user.id_user=tb_aduan.id_user and tb_aduan.status != "masuk" and tb_aduan.status != "sampah" group by tb_aduan.id_user) as jmladuan');
		
		$this->db->join('tb_user', 'tb_user.id_user = tb_aduan.id_user', 'left');
		$this->db->join('tb_komentar', 'tb_komentar.id_aduan = tb_aduan.id_aduan', 'left');
		$this->db->where('tb_aduan.status !=', 'masuk');
		$this->db->where('tb_aduan.status !=', 'sampah');
		$this->db->where('tb_aduan.rahasia', 0);
		$this->db->order_by('tb_aduan.dibuat', 'desc');
		$this->db->group_by('tb_aduan.id_aduan');
		$this->db->like('aduan', $q, 'BOTH');
		return $this->db->get('tb_aduan')->result();
	}

	public function tambahaduan($data){
		$this->db->insert('tb_aduan', $data);
	}

	public function loadkomentar($id){
		$this->db->where('id_aduan', $id);
		return $this->db->get('tb_komentar')->result();
	}

	public function loadnotif($id){
		$this->db->where('id_user', $id);
		return $this->db->get('tb_pemberitahuan')->result();
	}
}

/* End of file Mapi.php */
/* Location: ./application/models/Mapi.php */
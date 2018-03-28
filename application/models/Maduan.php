<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maduan extends CI_Model {

	public function get_all_aduan() {
		$this->db->where('tb_aduan.status !=', 'masuk');
		$this->db->where('tb_aduan.status !=', 'sampah');
		$this->db->order_by('tb_aduan.dibuat', 'desc');
		$this->db->join('tb_user', 'tb_user.id_user = tb_aduan.id_user', 'left');
		return $this->db->get('tb_aduan')->result();
	}	

	public function getAduanById($id){
		$this->db->where('id_aduan', $id);
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		return $this->db->get('tb_aduan');
	}

	public function aduanTerbaru(){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->limit(10);
		$this->db->order_by('tanggal', 'desc');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		return $this->db->get();
	}

	public function aduanHariIni($skrg){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->where('date(tb_aduan.dibuat)', $skrg);
		$this->db->where('status', 'masuk');
		$this->db->order_by('tanggal', 'desc');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		return $this->db->get();
	}

	public function aduanMasuk(){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->order_by('tanggal', 'desc');
		$this->db->where('tb_aduan.status', 'masuk');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		return $this->db->get();
	}

	public function aduanDiverifikasi(){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->order_by('tanggal', 'desc');
		$this->db->where('tb_aduan.status', 'diverifikasi');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		return $this->db->get();
	}

	public function disposisi($data){
		$this->db->insert('tb_disposisi', $data);
	}

	public function verifikasi($id){
		$data = array('status' => 'diverifikasi');
		$this->db->where('id_aduan', $id);
		$this->db->update('tb_aduan', $data);
	}

	public function updateAduanDisposisi($id){
		$data = array(
			'status' => 'didisposisikan'
		);
		$this->db->where('id_aduan', $id);
		$this->db->update('tb_aduan', $data);
	}

	public function semuaAduan(){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->order_by('tb_aduan.dibuat', 'desc');
		$this->db->join('tb_user', 'tb_user.id_user = tb_aduan.id_user', 'left');
		return $this->db->get();
	}

}

/* End of file Maduan.php */
/* Location: ./application/models/Maduan.php */
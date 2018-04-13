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

	//fungsi aduan hari ini

	public function aduanHariIni($skrg, $limit, $offset){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->where('date(tb_aduan.dibuat)', $skrg);
		$this->db->where('status', 'masuk');
		$this->db->order_by('tanggal', 'desc');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		$this->db->limit($limit, $offset);
		return $this->db->get();
	}

	public function cariAduanHariIni($query, $skrg, $limit, $offset){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->where('date(tb_aduan.dibuat)', $skrg);
		$this->db->where('status', 'masuk');
		$this->db->order_by('tanggal', 'desc');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		$this->db->like('tb_aduan.aduan', $query, 'BOTH');
		$this->db->limit($limit, $offset);
		return $this->db->get();
	}

	public function rowAduanHariIni($skrg){
		$this->db->where('date(tb_aduan.dibuat)', $skrg);
		$this->db->where('status', 'masuk');
		return $this->db->get('tb_aduan');
	}

	public function rowCariAduanHariIni($query, $skrg){
		$this->db->where('date(tb_aduan.dibuat)', $skrg);
		$this->db->where('status', 'masuk');
		$this->db->like('aduan', $query, 'BOTH');
		return $this->db->get('tb_aduan');
	}

	//fungsi aduan dengan status

	public function aduanStatusPage($status, $limit, $offset){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->order_by('tanggal', 'desc');
		$this->db->where('tb_aduan.status', $status);
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		return $this->db->get('tb_aduan', $limit, $offset);
	}

	public function cariAduan($query, $status, $limit, $offset){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->order_by('tanggal', 'desc');
		$this->db->where('tb_aduan.status', $status);
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		$this->db->like('tb_aduan.aduan', $query, 'BOTH');
		$this->db->limit($limit, $offset);
		return $this->db->get();
	}

	public function jmlAduanStatus($status){
		$this->db->where('tb_aduan.status', $status);
		return $this->db->get('tb_aduan');
	}

	public function jmlCariAduan($query, $status){
		$this->db->where('status', $status);
		$this->db->like('aduan', $query, 'BOTH');
		return $this->db->get('tb_aduan');
	}

	//Aduan disposisi

	public function aduanDisposisi($limit, $offset){
		$this->db->select('*, tb_aduan.dibuat as tanggal, tb_user.thumb as userfoto');
		$this->db->from('tb_aduan');
		$this->db->order_by('tanggal', 'desc');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		$this->db->join('tb_disposisi', 'tb_aduan.id_aduan = tb_disposisi.id_aduan');
		$this->db->join('tb_opd', 'tb_opd.id_opd = tb_disposisi.id_opd');
		$this->db->where('tb_aduan.status', 'didisposisikan');
		$this->db->limit($limit, $offset);
		$this->db->group_by('tb_aduan.id_aduan');
		return $this->db->get();
	}

	public function cariAduanDisposisi($query, $offset, $limit){
		$this->db->select('*, tb_aduan.dibuat as tanggal, tb_user.thumb as userfoto');
		$this->db->from('tb_aduan');
		$this->db->order_by('tanggal', 'desc');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		$this->db->join('tb_disposisi', 'tb_aduan.id_aduan = tb_disposisi.id_aduan');
		$this->db->join('tb_opd', 'tb_opd.id_opd = tb_disposisi.id_opd');
		$this->db->where('tb_aduan.status', 'didisposisikan');
		$this->db->like('tb_aduan.aduan', $query, 'BOTH');
		$this->db->limit($limit, $offset);
		$this->db->group_by('tb_aduan.id_aduan');
		return $this->db->get();
	}

	public function rowCariAduanDisposisi($query){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->join('tb_disposisi', 'tb_aduan.id_aduan = tb_disposisi.id_aduan');
		$this->db->where('tb_aduan.status', 'didisposisikan');
		$this->db->like('tb_aduan.aduan', $query, 'BOTH');
		$this->db->group_by('tb_aduan.id_aduan');
		return $this->db->get();
	}

	public function rowAduanDisposisi(){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->join('tb_disposisi', 'tb_aduan.id_aduan = tb_disposisi.id_aduan');
		$this->db->where('tb_aduan.status', 'didisposisikan');
		$this->db->group_by('tb_aduan.id_aduan');
		return $this->db->get();
	}

	//Semua Aduan

	public function rowAduanSemua(){
		return $this->db->get('tb_aduan');
	}

	public function aduanSemua($limit, $offset){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->order_by('tanggal', 'desc');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		$this->db->limit($limit, $offset);
		return $this->db->get();
	}

	public function cariAduanSemua($query, $limit, $offset){
		$this->db->select('*, tb_aduan.dibuat as tanggal');
		$this->db->from('tb_aduan');
		$this->db->order_by('tanggal', 'desc');
		$this->db->join('tb_user', 'tb_aduan.id_user = tb_user.id_user');
		$this->db->limit($limit, $offset);
		$this->db->like('tb_aduan.aduan', $query, 'BOTH');
		return $this->db->get();
	}

	public function rowCariAduanSemua($query){
		$this->db->like('aduan', $query, 'BOTH');
		return $this->db->get('tb_aduan');
	}

	public function disposisi($data){
		$this->db->insert('tb_disposisi', $data);
	}

	public function updateStatus($id, $status){
		$data = array('status' => $status);
		$this->db->where('id_aduan', $id);
		$query = $this->db->update('tb_aduan', $data);
		return $query;
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmasukan extends CI_Model {

	public function read(){
		return $this->db->get('tb_masukan');
	}

}

/* End of file Mmasukan.php */
/* Location: ./application/models/Mmasukan.php */
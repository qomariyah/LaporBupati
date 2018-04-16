<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengaturan extends CI_Model {

	public function read(){
		return $this->db->get('tb_pengaturan')->result();
	}

}

/* End of file Mpengaturan.php */
/* Location: ./application/models/Mpengaturan.php */
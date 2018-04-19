<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	function login($username) {
        $where = array(
            'username' => $username,
            'aktif' => '1'
        );
        $this->db->where($where);
        return $this->db->get('tb_admin');
    }

    public function adminOpd($id){
    	$this->db->where('id_admin', $id);
    	return $this->db->get('tb_opd');
    }

}

/* End of file Mlogin.php */
/* Location: ./application/models/Mlogin.php */
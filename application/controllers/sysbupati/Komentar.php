<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mkomentar');
	}

    public function tambah(){
    	$data = array(
    		'id_admin'      => $this->session->userdata('id_admin'),
            'id_aduan'      => $this->input->post('id'),
            'komentar'      => $this->input->post('komentar'),
            'role'          => 1
    	);
    	$this->mkomentar->insert($data);
    	$this->session->set_flashdata('notif', 'Tanggapan berhasil ditambahkan');
        $this->session->set_flashdata('type', 'success');
        redirect('sysbupati/aduan/detail/'.$this->input->post('id'),'refresh');
    }

    public function delete(){
    	$id = $this->input->post('id');
    	$id_aduan = $this->input->post('id_aduan');
    	$uri = $this->input->post('uri');
    	$this->mkomentar->delete($id);
    	$this->session->set_flashdata('notif', 'Tanggapan berhasil dihapus');
        $this->session->set_flashdata('type', 'success');
    	if ($uri == 'detail') {
    		redirect('sysbupati/aduan/detail/'.$id_aduan,'refresh');
    	}
    }

    public function update(){
    	$id_aduan = $this->input->post('id_aduan');
    	$id = $this->input->post('id_komentar');
    	$uri = $this->input->post('uri');
    	$data = array(
    		'komentar'		=> $this->input->post('komentar')
    	);
    	$this->mkomentar->update($data, $id);
    	$this->session->set_flashdata('notif', 'Tanggapan berhasil diubah');
        $this->session->set_flashdata('type', 'success');
    	if ($uri == 'detail') {
    		redirect('sysbupati/aduan/detail/'.$id_aduan,'refresh');
    	}
    }

}

/* End of file Komentar.php */
/* Location: ./application/controllers/admin/Komentar.php */
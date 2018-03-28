<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sektor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('msektor');
        $this->load->model('maktivitas');
        if ($this->session->flashdata('permission' != 'granted')) {
            redirect('403','refresh');
        }
	}

	public function index(){
		$data['title'] = "Data Sektor - Admin Lapor Bupati";
        $data['content'] = "sektor";
        $data['breadcrumb'] = "Data Sektor";
        $data['Sektor'] = "active";
        $data['ssektor'] = "active";
        $data['data_sektor'] = $this->msektor->read();
        $this->load->view('view_admin/lbadmin', $data);
	}

    public function tambah(){
        $data['title'] = "Tambah Data Sektor - Admin Lapor Bupati";
        $data['content'] = "tambah-sektor";
        $data['breadcrumb'] = "Tambah Data Sektor";
        $data['Sektor'] = "active";
        $data['tsektor'] = "active";
        $data['data_sektor'] = $this->msektor->read();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function edit($id){
        $data['title'] = "Edit Data Sektor - Admin Lapor Bupati";
        $data['content'] = "edit-sektor";
        $data['breadcrumb'] = "Edit Data Sektor";
        $data['Sektor'] = "active";
        $data['tsektor'] = "active";
        $data['data_sektor'] = $this->msektor->get_id_sektor($id);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function create(){
        $aktivitas = array(
            'id_aktivitas'  => '',
            'id_admin'      => $this->session->userdata('id_admin'),
            'aktivitas'     => 'Membuat sektor baru bernama '.$this->input->post('sektor')
        );
        $this->maktivitas->create($aktivitas);
        $data = array(
            'id_sektor' => '',
            'sektor'    => $this->input->post('sektor'),
            'id_admin'  => $this->session->userdata('id_admin')
        );
        if ($this->msektor->create($data)) {
            $this->session->set_flashdata('notif', 'Data sektor berhasil ditambahkan');
            $this->session->set_flashdata('type', 'success');
        }else{
            $this->session->set_flashdata('notif', 'Data sektor gagal ditambahkan');
            $this->session->set_flashdata('type', 'error');
        }
        redirect('sysadmin/sektor');
    }

    public function update(){
        $data = array(
            'sektor'    => $this->input->post('sektor'),
            'id_admin'  => $this->session->userdata('id_admin')
        );
        $id = $this->input->post('id_sektor');
        $this->msektor->update($id, $data);
        $aktivitas = array(
            'id_aktivitas' => '',
            'id_admin'     => $this->session->userdata('id_admin'),
            'aktivitas'    => 'Mengubah sektor '.$this->input->post('sektor_lama').' menjadi '.$this->input->post('sektor')
        );
        $this->maktivitas->create($aktivitas);
        $this->session->set_flashdata('notif', 'Data sektor berhasil diubah');
        $this->session->set_flashdata('type', 'success');
        redirect('sysadmin/sektor');
    }

    public function delete(){
        $id = $this->input->post('id_sektor');
        $this->msektor->delete($id);
        $aktivitas = array(
            'id_aktivitas' => '',
            'id_admin'     => $this->session->userdata('id_admin'),
            'aktivitas'    => 'Menghapus sektor '.$this->input->post('sektor')
        );
        $this->maktivitas->create($aktivitas);
        $this->session->set_flashdata('notif', 'Data sektor berhasil dihapus');
        $this->session->set_flashdata('type', 'success');
        redirect('sysadmin/sektor');
    }

}

/* End of file Sektor.php */
/* Location: ./application/controllers/admin/Sektor.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mkomentar');
	}

	public function data($offset = 0){
		$data["title"] = "Data Komentar - Admin Lapor Bupati";
		$data["content"]	= "komentar";
		$data["breadcrumb"] = "Data Komentar";
		$data["Komentar"] = "active";
		$data["semua_komentar"] = "active";

        $query = $this->input->get('cari');

        if (!isset($query)) {
            $jmldata = $this->mkomentar->jmlKomentar();
            $config['base_url'] = site_url('sysopd/komentar/data/');
            $config['total_rows'] = $jmldata;
            $config['per_page'] = 20;
            $config['use_page_number'] = FALSE;
            $config['num_links'] = 5;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'Prev';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';

            @$awal = $offset+1;
            @$dari = $config['per_page']+$offset+1;
            $this->pagination->initialize($config);

            $this->session->set_flashdata('query', $jmldata.' data');

            $data['pagination'] = $this->pagination->create_links();
            $data['data_komentar'] = $this->mkomentar->komentar($config['per_page'], $offset)->result();
            $data['jml_data_komentar'] = $this->mkomentar->jmlKomentar();
        }else{
            $jmldata = $this->mkomentar->jmlKomentarCari($query);
            $config['base_url'] = site_url('sysopd/komentar/data?cari='.$query);
            $config['total_rows'] = $jmldata;
            $config['per_page'] = 20;
            $config['use_page_number'] = FALSE;
            $config['page_query_string'] = TRUE;
            $config['num_links'] = 5;
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'Prev';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $offset = $this->input->get('per_page')+1;
            $dari = $offset+19;
            $this->session->set_flashdata('query', 'Hasil pencarian untuk <b>"'.$query.'"</b> '.$jmldata.' data');

            $data['pagination'] = $this->pagination->create_links();
            $data['data_komentar'] = $this->mkomentar->komentarCari($query, $config['per_page'], $offset-1)->result();
            $data['jml_data_komentar'] = $jmldata;
        }

        $this->load->view('view_admin/lbadmin', $data);
	}

    public function tambah(){
    	$data = array(
    		'id_opd'      => $this->session->userdata('id_opd'),
            'id_aduan'      => $this->input->post('id'),
            'komentar'      => $this->input->post('komentar'),
            'role'          => 1
    	);
    	$this->mkomentar->insert($data);
    	$this->session->set_flashdata('notif', 'Tanggapan berhasil ditambahkan');
        $this->session->set_flashdata('type', 'success');
        redirect('sysopd/aduan/detail/'.$this->input->post('id'),'refresh');
    }

    public function delete(){
    	$id = $this->input->post('id');
    	$id_aduan = $this->input->post('id_aduan');
    	$uri = $this->input->post('uri');
    	$this->mkomentar->delete($id);
    	$this->session->set_flashdata('notif', 'Tanggapan berhasil dihapus');
        $this->session->set_flashdata('type', 'success');
    	if ($uri == 'detail') {
    		redirect('sysopd/aduan/detail/'.$id_aduan,'refresh');
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
    		redirect('sysopd/aduan/detail/'.$id_aduan,'refresh');
    	}
    }

}

/* End of file Komentar.php */
/* Location: ./application/controllers/admin/Komentar.php */
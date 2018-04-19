<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aduan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
        $this->load->model('maduan');
        $this->load->model('mopd');
        $this->load->model('mkomentar');
        $this->load->model('msektor');
	}

	//aduan
	public function hari_ini($offset = 0){
		$data['title'] = "Aduan Masuk Hari Ini - Admin Lapor Bupati";
        $data['content'] = "aduan-hari-ini";
        $data['breadcrumb'] = "Data Aduan Masuk Hari Ini";
        $data['Aduan'] = "active";
        $data['aduan_hari_ini'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $this->session->set_flashdata('query', '');

        $id = $this->session->userdata('id_opd');
        $query = $this->input->get('cari');
        $hari = date('Y-m-d');

        if (empty($query)) {
            $config['base_url'] = site_url('sysopd/aduan/masuk');
            $config['total_rows'] = $this->maduan->jmlAduanOpdHari($id, 'didisposisikan',$hari);
            $config['per_page'] = 10;
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

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->aduanOpdHari($id, 'didisposisikan', $config['per_page'], $offset, $hari)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlAduanOpdHari($id, 'didisposisikan', $hari);

        }else{
            $config['per_page'] = 10;
            $config['base_url'] = site_url('sysopd/aduan/masuk?cari='.$query);
            $config['total_rows'] = $this->maduan->jmlCariAduanOpd($query, $id, 'didisposisikan', $hari);
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

            $offset = $this->input->get('per_page');
            $this->session->set_flashdata('query', 'Hasil pencarian untuk <b>"'.$query.'"</b>');

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->cariAduanOpd($query, $id, 'didisposisikan', $config['per_page'], $offset, $hari)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlCariAduanOpd($query, $id, 'didisposisikan', $hari);
        }

        $this->load->view('view_opd/lbopd', $data);
    }

    public function masuk($offset = 0){
        $data['title'] = "Aduan Masuk - Admin Lapor Bupati";
        $data['content'] = "aduan-masuk";
        $data['breadcrumb'] = "Data Aduan Masuk";
        $data['Aduan'] = "active";
        $data['aduan_masuk'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $this->session->set_flashdata('query', '');

        $id = $this->session->userdata('id_opd');
        $query = $this->input->get('cari');

        if (empty($query)) {
            $config['base_url'] = site_url('sysopd/aduan/masuk');
            $config['total_rows'] = $this->maduan->jmlAduanOpd($id, 'didisposisikan');
            $config['per_page'] = 10;
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

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->aduanOpd($id, 'didisposisikan', $config['per_page'], $offset)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlAduanOpd($id, 'didisposisikan');

        }else{
            $config['per_page'] = 10;
            $config['base_url'] = site_url('sysopd/aduan/masuk?cari='.$query);
            $config['total_rows'] = $this->maduan->jmlCariAduanOpd($query, $id, 'didisposisikan');
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

            $offset = $this->input->get('per_page');
            $this->session->set_flashdata('query', 'Hasil pencarian untuk <b>"'.$query.'"</b>');

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->cariAduanOpd($query, $id, 'didisposisikan', $config['per_page'], $offset)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlCariAduanOpd($query, $id, 'didisposisikan');
        }

        $this->load->view('view_opd/lbopd', $data);
    }

    public function penanganan($offset = 0){
        $data['title'] = "Aduan Dalam Penanganan - Admin Lapor Bupati";
        $data['content'] = "aduan-penanganan";
        $data['breadcrumb'] = "Data Aduan Dalam Penanganan";
        $data['Aduan'] = "active";
        $data['aduan_dalam_penanganan'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $this->session->set_flashdata('query', '');

        $id = $this->session->userdata('id_opd');
        $query = $this->input->get('cari');

        if (empty($query)) {
            $config['base_url'] = site_url('sysopd/aduan/penanganan');
            $config['total_rows'] = $this->maduan->jmlAduanOpd($id, 'penanganan');
            $config['per_page'] = 10;
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

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->aduanOpd($id, 'penanganan', $config['per_page'], $offset)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlAduanOpd($id, 'penanganan');

        }else{
            $config['per_page'] = 10;
            $config['base_url'] = site_url('sysopd/aduan/penanganan?cari='.$query);
            $config['total_rows'] = $this->maduan->jmlCariAduanOpd($query, $id, 'penanganan');
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

            $offset = $this->input->get('per_page');
            $this->session->set_flashdata('query', 'Hasil pencarian untuk <b>"'.$query.'"</b>');

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->cariAduanOpd($query, $id, 'penanganan', $config['per_page'], $offset)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlCariAduanOpd($query, $id, 'penanganan');
        }

        $this->load->view('view_opd/lbopd', $data);
    }

     public function selesai($offset = 0){
        $data['title'] = "Aduan Selesai - Admin Lapor Bupati";
        $data['content'] = "aduan-selesai";
        $data['breadcrumb'] = "Data Aduan Selesai";
        $data['Aduan'] = "active";
        $data['aduan_selesai'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $this->session->set_flashdata('query', '');

        $id = $this->session->userdata('id_opd');
        $query = $this->input->get('cari');

        if (empty($query)) {
            $config['base_url'] = site_url('sysopd/aduan/selesai');
            $config['total_rows'] = $this->maduan->jmlAduanOpd($id, 'selesai');
            $config['per_page'] = 10;
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

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->aduanOpd($id, 'selesai', $config['per_page'], $offset)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlAduanOpd($id, 'selesai');

        }else{
            $config['per_page'] = 10;
            $config['base_url'] = site_url('sysopd/aduan/selesai?cari='.$query);
            $config['total_rows'] = $this->maduan->jmlCariAduanOpd($query, $id, 'selesai');
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

            $offset = $this->input->get('per_page');
            $this->session->set_flashdata('query', 'Hasil pencarian untuk <b>"'.$query.'"</b>');

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->cariAduanOpd($query, $id, 'selesai', $config['per_page'], $offset)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlCariAduanOpd($query, $id, 'selesai');
        }

        $this->load->view('view_opd/lbopd', $data);
    }

    public function semua($offset = 0){
        $data['title'] = "Data Semua Aduan - Admin Lapor Bupati";
        $data['content'] = "aduan-semua";
        $data['breadcrumb'] = "Data Semua Aduan";
        $data['Aduan'] = "active";
        $data['semua_aduan'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $this->session->set_flashdata('query', '');

        $id = $this->session->userdata('id_opd');
        $query = $this->input->get('cari');

        if (empty($query)) {
            $config['base_url'] = site_url('sysopd/aduan/semua');
            $config['total_rows'] = $this->maduan->jmlAduanOpdSemua($id);
            $config['per_page'] = 10;
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

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->aduanOpdSemua($id, $config['per_page'], $offset)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlAduanOpdSemua($id);

        }else{
            $config['per_page'] = 10;
            $config['base_url'] = site_url('sysopd/aduan/semua?cari='.$query);
            $config['total_rows'] = $this->maduan->jmlCariAduanOpdSemua($query, $id);
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

            $offset = $this->input->get('per_page');
            $this->session->set_flashdata('query', 'Hasil pencarian untuk <b>"'.$query.'"</b>');

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->cariAduanOpdSemua($query, $id, $config['per_page'], $offset)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->jmlCariAduanOpdSemua($query, $id);
        }

        $this->load->view('view_opd/lbopd', $data);
    }

    public function detail($id){
        $data['title'] = "Detail Data Aduan - Admin Lapor Bupati";
        $data['content'] = "detail-data-aduan";
        $data['breadcrumb'] = "Detail Data Aduan";
        $data['Aduan'] = "active";
        $data['data_aduan'] = $this->maduan->getAduanById($id)->result();
        $data['data_komentar'] = $this->mkomentar->komentarById($id)->result();
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $this->load->view('view_opd/lbopd', $data);
    }

    public function status(){
        $id = $this->input->post('id_aduan');
        $status = $this->input->post('status');
        $id_opd = $this->input->post('id_opd');

        if ($this->maduan->updateStatus($id, $status)) {
            if ($status == 'penanganan') {
                $this->session->set_flashdata('notif', 'Status aduan berhasil diubah ke penanganan');
            }elseif($status == 'selesai'){
                $this->session->set_flashdata('notif', 'Aduan telah selsesai ditangani');
            }
            $this->session->set_flashdata('type', 'success');
            $data['id_aduan'] = $id;
            if ($status == 'penanganan') {
                $data['komentar'] = "Aduan anda dalam penanganan";
            }elseif($status == 'selesai'){
                $data['komentar'] = "Aduan anda telah selesai ditangani";
            }
            $data['id_opd'] = $id_opd;
            $data['role'] = 1;
            $this->mkomentar->insert($data);
            redirect('sysopd/aduan/detail/'.$id,'refresh');
        }else{
            $this->session->set_flashdata('notif', 'Aduan gagal ubah status');
            $this->session->set_flashdata('type', 'error');
            redirect('sysopd/aduan/detail/'.$id,'refresh');
        }
    }

}

/* End of file Aduan.php */
/* Location: ./application/controllers/sysopd/Aduan.php */
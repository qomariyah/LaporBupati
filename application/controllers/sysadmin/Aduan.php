<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aduan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Do your magic here
        $this->load->model('maduan');
        $this->load->model('mopd');
        $this->load->model('mkomentar');
        $this->load->model('msektor');

        if($this->session->userdata('status') != 'loginberhasil'){
            redirect(base_url('sysadminlogin/oauth'));
        }
	}

	public function index(){
		
	}

	public function tambah(){

	}

	public function create(){

	}

	public function edit(){

	}

	public function update(){

	}

	public function delete(){

	}

	public function search(){

	}

	public function hari_ini(){
		$data['title'] = "Data Aduan Hari Ini - Admin Lapor Bupati";
        $data['content'] = "aduan-hari-ini";
        $data['breadcrumb'] = "Data Aduan Hari Ini";
        $data['Aduan'] = "active";
        $data['aduan_hari_ini'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $data['data_aduan'] = $this->maduan->aduanHariIni(date('Y-m-d'))->result();
        $data['jml_data_aduan_hari_ini'] = $this->maduan->aduanHariIni(date('Y-m-d'))->num_rows();
		$this->load->view('view_admin/lbadmin', $data);
	}

    public function detail(){
        $data['title'] = "Detail Data Aduan - Admin Lapor Bupati";
        $data['content'] = "detail-data-aduan";
        $data['breadcrumb'] = "Detail Data Aduan";
        $data['Aduan'] = "active";
        $data['aduan_hari_ini'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function masuk(){
        $data['title'] = "Data Aduan Masuk - Admin Lapor Bupati";
        $data['content'] = "aduan-masuk";
        $data['breadcrumb'] = "Data Aduan Masuk";
        $data['Aduan'] = "active";
        $data['aduan_masuk'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        if ($this->input->get('cari') == "") {
            $config['base_url'] = site_url('sysadmin/aduan/masuk');
            $config['total_rows'] = $this->maduan->aduanStatus("masuk")->num_rows();
            $config['per_page'] = 1;
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
            $data['data_aduan'] = $this->maduan->aduanStatusPage($config['per_page'], "masuk")->result();
            $data['jml_data_aduan_masuk'] = $this->maduan->aduanStatusPage($config['per_page'], "masuk")->num_rows();
        }else{

            $query = $this->input->get('cari');

            $config['base_url'] = site_url('sysadmin/aduan/masuk?cari='.$query);
            $config['total_rows'] = $this->maduan->jmlCariAduan($query, "masuk")->num_rows();
            $config['per_page'] = 1;
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

            $data['pagination'] = $this->pagination->create_links();
            $data['data_aduan'] = $this->maduan->cariAduan($query, "masuk", $config['per_page'])->result();
            $data['jml_data_aduan_masuk'] = $this->maduan->cariAduan($query, "masuk", $config['per_page'])->num_rows();
        }

        $this->load->view('view_admin/lbadmin', $data);
    }

    public function diverifikasi(){
        $data['title'] = "Data Aduan Diterima - Admin Lapor Bupati";
        $data['content'] = "aduan-diverivikasi";
        $data['breadcrumb'] = "Data Aduan Diverivikasi";
        $data['Aduan'] = "active";
        $data['aduan_diverifikasi'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $data['data_aduan'] = $this->maduan->aduanStatus("diverifikasi")->result();
        $data['jml_data_aduan_diverifikasi'] = $this->maduan->aduanStatus("diverifikasi")->num_rows();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function didisposiskan(){
        $data['title'] = "Data Aduan Disposisi - Admin Lapor Bupati";
        $data['content'] = "aduan-didisposisikan";
        $data['breadcrumb'] = "Data Aduan Disposisi";
        $data['Aduan'] = "active";
        $data['aduan_didisposiskan'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        if ($this->input->get('cari') == '') {
            $data['data_aduan'] = $this->maduan->aduanDisposisi()->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->aduanDisposisi()->num_rows();
        }else{
            $query = $this->input->get('cari');
            $data['data_aduan'] = $this->maduan->cariAduanDisposisi($query)->result();
            $data['jml_data_aduan_disposisi'] = $this->maduan->cariAduanDisposisi($query)->num_rows();
        }
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function penanganan(){
        $data['title'] = "Data Aduan dalam Penanganan - Admin Lapor Bupati";
        $data['content'] = "aduan-dalam-penanganan";
        $data['breadcrumb'] = "Data Aduan dalam Penanganan";
        $data['Aduan'] = "active";
        $data['aduan_dalam_penanganan'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $data['data_aduan'] = $this->maduan->aduanStatus("penanganan")->result();
        $data['jml_data_aduan_penanganan'] = $this->maduan->aduanStatus("penanganan")->num_rows();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function selesai(){
        $data['title'] = "Data Aduan Selesai - Admin Lapor Bupati";
        $data['content'] = "aduan-selesai";
        $data['breadcrumb'] = "Data Aduan Selesai";
        $data['Aduan'] = "active";
        $data['aduan_selesai'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $data['data_aduan'] = $this->maduan->aduanStatus("selesai")->result();
        $data['jml_data_aduan_selesai'] = $this->maduan->aduanStatus("selesai")->num_rows();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function bukan_kewenangan(){
        $data['title'] = "Data Aduan Bukan Kewenangan - Admin Lapor Bupati";
        $data['content'] = "aduan-bukan-kewenangan";
        $data['breadcrumb'] = "Data Aduan Bukan Kewenangan";
        $data['Aduan'] = "active";
        $data['aduan_bukan_kewenangan'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $data['data_aduan'] = $this->maduan->aduanStatus("bukan kewenangan")->result();
        $data['jml_data_aduan_bukan_kewenangan'] = $this->maduan->aduanStatus("bukan kewenangan")->num_rows();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function tempat_sampah(){
        $data['title'] = "Tempat Sampah Aduan - Admin Lapor Bupati";
        $data['content'] = "aduan-tempat-sampah";
        $data['breadcrumb'] = "Tempat Sampah Aduan";
        $data['Aduan'] = "active";
        $data['aduan_tempat_sampah'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $data['data_aduan'] = $this->maduan->aduanStatus("sampah")->result();
        $data['jml_data_aduan_sampah'] = $this->maduan->aduanStatus("sampah")->num_rows();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function semua(){
        $data['title'] = "Data Semua Aduan - Admin Lapor Bupati";
        $data['content'] = "semua-aduan";
        $data['breadcrumb'] = "Data Semua Aduan";
        $data['Aduan'] = "active";
        $data['semua_aduan'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['daftar_sektor'] = $this->msektor->daftarSektor()->result();
        $data['data_aduan'] = $this->maduan->aduanSemua()->result();
        $data['jml_semua_aduan'] = $this->maduan->aduanSemua()->num_rows();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function disposisi(){
        $uri = $this->input->post('uri');
        $data = array(
            'id_aduan' => $this->input->post('id_aduan'),
            'id_opd' => $this->input->post('id_opd'),
            'id_admin' => $this->session->userdata('id_admin')
        );

        $opd = $this->mopd->get_id_opd($this->input->post('id_opd'));
        foreach ($opd as $key) {
            $nama_opd = $key['singkatan'];
        }

        $komen1 = array(
            'id_admin'      => $this->session->userdata('id_admin'),
            'id_aduan'      => $this->input->post('id_aduan'),
            'komentar'      => 'Aduan diverifikasi oleh admin Lapor Bupati',
            'role'          => 1
        );
        $komen2 = array(
            'id_admin'      => $this->session->userdata('id_admin'),
            'id_aduan'      => $this->input->post('id_aduan'),
            'komentar'      => 'Aduan didisposisikan ke '.$nama_opd,
            'role'          => 1
        );

        if ($this->maduan->updateStatus($this->input->post('id_aduan'), 'didisposisikan')) {
            if ($uri == 'diverifikasi'){
                $this->mkomentar->insert($komen2);
            }else{
                $this->mkomentar->insert($komen1);
                $this->mkomentar->insert($komen2);
            }
            $this->maduan->disposisi($data);
            $this->maduan->updateStatus($this->input->post('id_aduan'), 'didisposisikan');
            $this->session->set_flashdata('notif', 'Aduan berhasil didisposisikan ke '.$nama_opd);
            $this->session->set_flashdata('type', 'success');
            redirect('sysadmin/aduan/'.$uri,'refresh');
        }else{
            $this->session->set_flashdata('notif', 'Aduan gagal didisposisikan ke '.$nama_opd);
            $this->session->set_flashdata('type', 'error');
            redirect('sysadmin/aduan/'.$uri,'refresh');
        }
        
    }

    public function verifikasi($id){
        if ($this->maduan->updateStatus($id, 'diverifikasi')) {
            $this->session->set_flashdata('notif', 'Aduan berhasil diverifikasi');
            $this->session->set_flashdata('type', 'success');
            $data = array(
                'id_aduan' => $id,
                'komentar' => 'Aduan diverifikasi oleh admin Lapor Bupati',
                'id_admin' => $this->session->userdata('id_admin'),
                'role'     => 1
            );
            $this->mkomentar->insert($data);
            redirect('sysadmin/aduan/'.$this->uri->segment(5),'refresh');
        }else{
            $this->session->set_flashdata('notif', 'Aduan gagal diverifikasi');
            $this->session->set_flashdata('type', 'error');
            redirect('sysadmin/aduan/'.$this->uri->segment(5),'refresh');
        }
    }

    public function sampah(){
        $uri = $this->input->post('uri');
        $id = $this->input->post('id_aduan');
        $komentar = $this->input->post('komentar');
        $data = array(
            'id_aduan' => $id,
            'komentar' => 'Aduan anda masuk ke tempat sampah karena '.$komentar,
            'id_admin' => $this->session->userdata('id_admin'),
            'role'     => 1
        );

        if ($this->maduan->updateStatus($id, 'sampah')) {
            $this->mkomentar->insert($data);
            $this->session->set_flashdata('notif', 'Aduan berhasil masuk ke tempat sampah');
            $this->session->set_flashdata('type', 'success');
            redirect('sysadmin/aduan/'.$uri,'refresh');
        }else{
            $this->session->set_flashdata('notif', 'Aduan gagal masuk ke tempat sampah');
            $this->session->set_flashdata('type', 'error');
            redirect('sysadmin/aduan/'.$uri,'refresh');
        }
    }

}

/* End of file Aduan */
/* Location: ./application/controllers/admin/Aduan */
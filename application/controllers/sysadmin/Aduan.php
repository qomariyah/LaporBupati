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
        $data['data_aduan'] = $this->maduan->aduanMasuk()->result();
        $data['jml_data_aduan_masuk'] = $this->maduan->aduanMasuk()->num_rows();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function diverifikasi(){
        $data['title'] = "Data Aduan Diterima - Admin Lapor Bupati";
        $data['content'] = "aduan-diverivikasi";
        $data['breadcrumb'] = "Data Aduan Diverivikasi";
        $data['Aduan'] = "active";
        $data['aduan_diverifikasi'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['data_aduan'] = $this->maduan->aduanDiverifikasi()->result();
        $data['jml_data_aduan_diverifikasi'] = $this->maduan->aduanDiverifikasi()->num_rows();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function didisposiskan(){
        $data['title'] = "Data Aduan Disposisi - Admin Lapor Bupati";
        $data['content'] = "aduan-didisposisikan";
        $data['breadcrumb'] = "Data Aduan Disposisi";
        $data['Aduan'] = "active";
        $data['aduan_didisposiskan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function penanganan(){
        $data['title'] = "Data Aduan dalam Penanganan - Admin Lapor Bupati";
        $data['content'] = "aduan-dalam-penanganan";
        $data['breadcrumb'] = "Data Aduan dalam Penanganan";
        $data['Aduan'] = "active";
        $data['aduan_dalam_penanganan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function selesai(){
        $data['title'] = "Data Aduan Selesai - Admin Lapor Bupati";
        $data['content'] = "aduan-selesai";
        $data['breadcrumb'] = "Data Aduan Selesai";
        $data['Aduan'] = "active";
        $data['aduan_selesai'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function bukan_kewenangan(){
        $data['title'] = "Data Aduan Bukan Kewenangan - Admin Lapor Bupati";
        $data['content'] = "aduan-bukan-kewenangan";
        $data['breadcrumb'] = "Data Aduan Bukan Kewenangan";
        $data['Aduan'] = "active";
        $data['aduan_bukan_kewenangan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function tempat_sampah(){
        $data['title'] = "Tempat Sampah Aduan - Admin Lapor Bupati";
        $data['content'] = "aduan-tempat-sampah";
        $data['breadcrumb'] = "Tempat Sampah Aduan";
        $data['Aduan'] = "active";
        $data['aduan_tempat_sampah'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function semua(){
        $data['title'] = "Data Semua Aduan - Admin Lapor Bupati";
        $data['content'] = "semua-aduan";
        $data['breadcrumb'] = "Data Semua Aduan";
        $data['Aduan'] = "active";
        $data['semua_aduan'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['data_aduan'] = $this->maduan->semuaAduan()->result();
        $data['jml_semua_aduan'] = $this->maduan->semuaAduan()->num_rows();
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
            'komentar'      => 'Aduan telah diverifikasi oleh Administrator',
            'role'          => 1
        );
        $komen2 = array(
            'id_admin'      => $this->session->userdata('id_admin'),
            'id_aduan'      => $this->input->post('id_aduan'),
            'komentar'      => 'Aduan telah didisposisikan ke '.$nama_opd,
            'role'          => 1
        );
        $this->mkomentar->insert($komen1);
        $this->mkomentar->insert($komen2);
        $this->maduan->disposisi($data);
        $this->maduan->updateAduanDisposisi($this->input->post('id_aduan'));
        $this->session->set_flashdata('notif', 'Aduan berhasil didisposisikan ke '.$nama_opd);
        $this->session->set_flashdata('type', 'success');
        redirect('sysadmin/aduan/'.$uri,'refresh');
    }

    public function verifikasi($id){
        $this->maduan->verifikasi($id);
        $data = array(
            'id_aduan' => $id,
            'komentar' => 'Aduan diverivikasi oleh admin Lapor Bupati',
            'id_admin' => $this->session->userdata('id_admin')
        );
        $this->mkomentar->insert($data);
        redirect('lbadmin/'.$this->uri->segment(3),'refresh');
    }

}

/* End of file Aduan */
/* Location: ./application/controllers/admin/Aduan */
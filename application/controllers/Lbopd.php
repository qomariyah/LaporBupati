<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lbopd extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('maduan');
		$this->load->model('mopd');
		//Do your magic here
	}

	public function index(){
		$data['title'] = "Admin OPD Lapor Bupati";
        $data['content'] = "dashboard";
        $data['breadcrumb'] = "Dashboard";
        $data['Dashboard'] = "active";
		$this->load->view('view_opd/lbopd', $data);
	}

	//aduan
	public function aduan_hari_ini(){
		$data['title'] = "Data Aduan Hari Ini - Admin Lapor Bupati";
        $data['content'] = "aduan-hari-ini";
        $data['breadcrumb'] = "Data Aduan Hari Ini";
        $data['Aduan'] = "active";
        $data['aduan_hari_ini'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
		$this->load->view('view_opd/lbopd', $data);
	}

    public function detail_aduan_hari_ini(){
        $data['title'] = "Detail Data Aduan Hari Ini - Admin Lapor Bupati";
        $data['content'] = "detail-data-aduan-hari-ini";
        $data['breadcrumb'] = "Detail Data Aduan Hari Ini";
        $data['Aduan'] = "active";
        $data['aduan_hari_ini'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $this->load->view('view_opd/lbopd', $data);
    }

    public function aduan_diterima(){
        $data['title'] = "Data Aduan Diterima - Admin Lapor Bupati";
        $data['content'] = "aduan-diterima";
        $data['breadcrumb'] = "Data Aduan Diterima";
        $data['Aduan'] = "active";
        $data['aduan_diterima'] = "active";
        $this->load->view('view_opd/lbopd', $data);
    }

    public function aduan_didisposiskan(){
        $data['title'] = "Data Aduan Disposisi - Admin Lapor Bupati";
        $data['content'] = "aduan-didisposisikan";
        $data['breadcrumb'] = "Data Aduan Disposisi";
        $data['Aduan'] = "active";
        $data['aduan_didisposiskan'] = "active";
        $this->load->view('view_opd/lbopd', $data);
    }

    public function aduan_dalam_penanganan(){
        $data['title'] = "Data Aduan dalam Penanganan - Admin Lapor Bupati";
        $data['content'] = "aduan-dalam-penanganan";
        $data['breadcrumb'] = "Data Aduan dalam Penanganan";
        $data['Aduan'] = "active";
        $data['aduan_dalam_penanganan'] = "active";
        $this->load->view('view_opd/lbopd', $data);
    }

    public function aduan_selesai(){
        $data['title'] = "Data Aduan Selesai - Admin Lapor Bupati";
        $data['content'] = "aduan-selesai";
        $data['breadcrumb'] = "Data Aduan Selesai";
        $data['Aduan'] = "active";
        $data['aduan_selesai'] = "active";
        $this->load->view('view_opd/lbopd', $data);
    }

    public function aduan_bukan_kewenangan(){
        $data['title'] = "Data Aduan Bukan Kewenangan - Admin Lapor Bupati";
        $data['content'] = "aduan-bukan-kewenangan";
        $data['breadcrumb'] = "Data Aduan Bukan Kewenangan";
        $data['Aduan'] = "active";
        $data['aduan_bukan_kewenangan'] = "active";
        $this->load->view('view_opd/lbopd', $data);
    }

    public function tempat_sampah_aduan(){
        $data['title'] = "Tempat Sampah Aduan - Admin Lapor Bupati";
        $data['content'] = "aduan-tempat-sampah";
        $data['breadcrumb'] = "Tempat Sampah Aduan";
        $data['Aduan'] = "active";
        $data['aduan_tempat_sampah'] = "active";
        $this->load->view('view_opd/lbopd', $data);
    }

    public function semua_aduan(){
        $data['title'] = "Data Semua Aduan - Admin Lapor Bupati";
        $data['content'] = "semua-aduan";
        $data['breadcrumb'] = "Data Semua Aduan";
        $data['Aduan'] = "active";
        $data['semua_aduan'] = "active";
        $this->load->view('view_opd/lbopd', $data);
    }

}

/* End of file Lbopd.php */
/* Location: ./application/controllers/Lbopd.php */
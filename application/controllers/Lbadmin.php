<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lbadmin extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('madmin');
        $this->load->model('mopd');
        $this->load->model('msektor');
        $this->load->model('maktivitas');
        $this->load->model('muser');
        $this->load->model('maduan');
        $this->load->model('mkomentar');


        $jml_data_aduan_hari_ini = $this->maduan->aduanHariIni(date('Y-m-d'))->num_rows();

        if($this->session->userdata('status') != 'loginberhasil'){
            redirect(base_url('sysadminlogin/oauth'));
        }
	}

    function elfinder_init(){
        $this->load->helper('general_helper');
        $opts = initialize_elfinder();
        $this->load->library('elfinder_lib', $opts);   
    }

    public function filemanager(){
        $data['title'] = "File Manager";
        $data['content'] = "filemanager";
        $data['breadcrumb'] = "File Manager";
        $data['Filemanager'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

	public function index(){
		$data['title'] = "Admin Lapor Bupati";
        $data['content'] = "dashboard";
        $data['breadcrumb'] = "Dashboard";
        $data['Dashboard'] = "active";
        $data['aktivitas'] = $this->maktivitas->read();
        $data['jml_aktivitas'] = $this->maktivitas->read();
		$this->load->view('view_admin/lbadmin', $data);
	}

	public function administrator($offset = 0){
        $config['base_url'] = site_url('lbadmin/administrator');
        $config['total_rows'] = $this->madmin->jumlah_admin();
        $config['per_page'] = 8;
        $config['use_page_number'] = TRUE;
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

		$data['title'] = "Data Adimistrator - Admin Lapor Bupati";
        $data['content'] = "administrator";
        $data['breadcrumb'] = "Data Administrator";
        $data['Administrator'] = "active";
        $data['data_administrator'] = "active";
        $data['data_admin'] = $this->madmin->get_limit_admin($config['per_page'], $offset);
        $data['link_admin'] = $this->pagination->create_links();
		$this->load->view('view_admin/lbadmin', $data);
	}

	public function tambah_administrator(){
		$data['title'] = "Tambah Data Adimistrator - Admin Lapor Bupati";
        $data['content'] = "tambah-administrator";
        $data['breadcrumb'] = "Tambah Data Adimistrator";
        $data['Administrator'] = "active";
        $data['tambah_administrator'] = "active";
        $data['data_id'] = $this->madmin->createID();
		$this->load->view('view_admin/lbadmin', $data);
	}

    public function create_admin(){
        $nm_file = "admin_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/administrator/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3672';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
        $this->upload->initialize($config);
        if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/administrator/source/'.$data_upload['file_name'],
                    'new_image' => './files/administrator/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '100%',
                    'height' => 200,
                    'width' => 200
                );
                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();
                $data = array(
                    'id_admin'   => $this->input->post('id_admin'),
                    'username'   => $this->input->post('username'),
                    'password'   => $this->input->post('pass'),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'email'      => $this->input->post('email'),
                    'foto'       => $data_upload['file_name'],
                    'thumbnail'  => $nm_file.'_thumb'.$data_upload['file_ext'],
                    'alamat'     => $this->input->post('alamat'),
                    'nama_admin' => $this->input->post('nama_admin'),
                    'level'      => $this->input->post('level'),
                    'aktif'      => '0'
                );
                $this->madmin->create($data);
                redirect('lbadmin/administrator/tambah_berhasil');
            }else{
                $data = array(
                    'id_admin'   => $this->input->post('id_admin'),
                    'username'   => $this->input->post('username'),
                    'password'   => $this->input->post('pass'),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'email'      => $this->input->post('email'),
                    'alamat'     => $this->input->post('alamat'),
                    'nama_admin' => $this->input->post('nama_admin'),
                    'level'      => $this->input->post('level'),
                    'aktif'      => '0'
                );
                $this->madmin->create($data);
                redirect('lbadmin/administrator/tambah-berhasil');
            }
        }
    }

	public function edit_admin($id){
		$data['title'] = "Edit Data Adimistrator - Admin Lapor Bupati";
        $data['content'] = "edit-administrator";
        $data['breadcrumb'] = "Edit Data Adimistrator";
        $data['Administrator'] = "active";
        $data['data_admin'] = $this->madmin->getadmin($id);
		$this->load->view('view_admin/lbadmin', $data);
	}

	public function update_admin(){
		$nm_file = "admin_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/administrator/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3672';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
        $this->upload->initialize($config);
        if(!empty($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/administrator/source/'.$data_upload['file_name'],
                    'new_image' => './files/administrator/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '100%',
                    'height' => 200,
                    'width' => 200
                );
                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();
                $data = array(
                    'username'   => $this->input->post('username'),
                    'password'   => $this->input->post('pass'),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'email'      => $this->input->post('email'),
                    'foto'       => $data_upload['file_name'],
                    'thumbnail'  => $nm_file.'_thumb'.$data_upload['file_ext'],
                    'alamat'     => $this->input->post('alamat'),
                    'nama_admin' => $this->input->post('nama_admin'),
                    'level'      => $this->input->post('level')
                );
                $id = $this->input->post('id_admin');
                $this->madmin->update($id, $data);
				$foto = $this->input->post('ft');
				$thumb = $this->input->post('tm');
				$path1 = "./files/administrator/source/".$foto;
				$path2 = "./files/administrator/thumb/".$thumb;
				unlink($path1);
				unlink($path2);
                redirect('lbadmin/administrator/tambah-berhasil');
            }
        }else{
        	$data = array(
                    'username'   => $this->input->post('username'),
                    'password'   => $this->input->post('pass'),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'email'      => $this->input->post('email'),
                    'alamat'     => $this->input->post('alamat'),
                    'nama_admin' => $this->input->post('nama_admin'),
                    'level'      => $this->input->post('level')
                );
            $id = $this->input->post('id_admin');
            $this->madmin->update($id, $data);
            redirect('lbadmin/administrator/update-berhasil');
        }
	}

	public function aktifkan_admin($id){
		$this->madmin->aktifkan($id);
		redirect('lbadmin/administrator/berhasil');
	}
	public function nonaktifkan_admin($id){
		$this->madmin->nonaktifkan($id);
		redirect('lbadmin/administrator/berhasil');
	}

	public function delete_admin($id){
		$foto = $this->uri->segment(4);
		$thumb = $this->uri->segment(5);
		$path1 = "./files/administrator/source/".$foto;
		$path2 = "./files/administrator/thumb/".$thumb;
		unlink($path1);
		unlink($path2);
		$this->madmin->delete($id);
		redirect('lbadmin/administrator/hapus-berhasil');
	}

    public function opd(){
        $config['base_url'] = site_url('lbadmin/opd/page/');
        $config['total_rows'] = $this->mopd->jumlah_opd();
        $config['per_page'] = 4;
        $config['uri_segment'] = 4;
        $config['use_page_number'] = false;
        $config['num_links'] = 2;
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

        $form = $this->uri->segment(4);
        $data['title'] = "Data OPD - Admin Lapor Bupati";
        $data['content'] = "opd";
        $data['breadcrumb'] = "Data OPD";
        $data['dopd'] = "active";
        $data['opd'] = "active";
        $data['data_opd'] = $this->mopd->get_limit_opd($config['per_page'], $form);
        $data['link_opd'] = $this->pagination->create_links();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function tambahopd(){
        $data['title'] = "Tambah Data OPD - Admin Lapor Bupati";
        $data['content'] = "tambah-opd";
        $data['breadcrumb'] = "Tambah Data OPD";
        $data['opd'] = "active";
        $data['topd'] = "active";
        $data['adminopd'] = $this->madmin->getAdminopd();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function create_opd(){
        $nm_file = "opd_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/opd/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
        $this->upload->initialize($config);
        if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/opd/source/'.$data_upload['file_name'],
                    'new_image' => './files/opd/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '100%',
                    'height' => 200,
                    'width' => 200
                );
                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();
                $data = array(
                    'id_opd'      => $this->input->post('id_opd'),
                    'nama_opd'    => $this->input->post('nama_opd'),
                    'singkatan'   => $this->input->post('singkatan_opd'),
                    'deskripsi'   => $this->input->post('deskripsi_opd'),
                    'nama_kepala' => $this->input->post('kepala_opd'),
                    'alamat'      => $this->input->post('alamat_opd'),
                    'foto'        => $data_upload['file_name'],
                    'thumb'       => $nm_file.'_thumb'.$data_upload['file_ext'],
                    'no_telp'     => $this->input->post('telp_opd'),
                    'email'       => $this->input->post('email_opd'),
                    'fax'         => $this->input->post('fax_opd'),
                    'website'     => $this->input->post('website_opd'),
                    'id_admin'    => $this->input->post('id_admin')
                );
                $this->mopd->create($data);
                redirect('lbadmin/opd/tambah_berhasil');
            }else{
                $data = array(
                    'id_opd'      => $this->input->post('id_opd'),
                    'nama_opd'    => $this->input->post('nama_opd'),
                    'singkatan'   => $this->input->post('singkatan_opd'),
                    'deskripsi'   => $this->input->post('deskripsi_opd'),
                    'nama_kepala' => $this->input->post('kepala_opd'),
                    'alamat'      => $this->input->post('alamat_opd'),
                    'no_telp'     => $this->input->post('telp_opd'),
                    'email'       => $this->input->post('email_opd'),
                    'fax'         => $this->input->post('fax_opd'),
                    'website'     => $this->input->post('website_opd'),
                    'id_admin'    => $this->input->post('id_admin')
                );
                $this->mopd->create($data);
                redirect('lbadmin/opd/tambah-berhasil');
            }
        }
    }

    public function detail_opd($id){
        $data['title'] = "Informasi Detail OPD";
        $data['content'] = "detail-opd";
        $data['breadcrumb'] = "Detail OPD";
        $data['dopd'] = "active";
        $data['opd'] = "active";
        $data['detailopd'] = $this->mopd->get_id_opd($id);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function edit_opd($id){
        $data['title'] = "Edit Data OPD - Admin Lapor Bupati";
        $data['content'] = "edit-opd";
        $data['breadcrumb'] = "Edit Data OPD";
        $data['opd'] = "active";
        $data['adminopd'] = $this->madmin->getAdminopd();
        $data['dataopd'] = $this->mopd->get_id_opd($id);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function update_opd(){
        $nm_file = "opd_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/opd/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
        $this->upload->initialize($config);
        if(!empty($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/opd/source/'.$data_upload['file_name'],
                    'new_image' => './files/opd/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '100%',
                    'height' => 200,
                    'width' => 200
                );
                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();
                $data = array(
                    'nama_opd'    => $this->input->post('nama_opd'),
                    'singkatan'   => $this->input->post('singkatan_opd'),
                    'deskripsi'   => $this->input->post('deskripsi_opd'),
                    'nama_kepala' => $this->input->post('kepala_opd'),
                    'alamat'      => $this->input->post('alamat_opd'),
                    'foto'        => $data_upload['file_name'],
                    'thumb'       => $nm_file.'_thumb'.$data_upload['file_ext'],
                    'no_telp'     => $this->input->post('telp_opd'),
                    'email'       => $this->input->post('email_opd'),
                    'fax'         => $this->input->post('fax_opd'),
                    'website'     => $this->input->post('website_opd'),
                    'id_admin'    => $this->input->post('id_admin')
                );
                $id = $this->input->post('id_opd');
                $this->mopd->update($id, $data);
                $foto = $this->input->post('ft_opd');
                $thumb = $this->input->post('tm_opd');
                $path1 = "./files/opd/source/".$foto;
                $path2 = "./files/opd/thumb/".$thumb;
                unlink($path1);
                unlink($path2);
                redirect('lbadmin/opd/update-berhasil');
            }
        }else{
            $data = array(
                    'nama_opd'    => $this->input->post('nama_opd'),
                    'singkatan'   => $this->input->post('singkatan_opd'),
                    'deskripsi'   => $this->input->post('deskripsi_opd'),
                    'nama_kepala' => $this->input->post('kepala_opd'),
                    'alamat'      => $this->input->post('alamat_opd'),
                    'no_telp'     => $this->input->post('telp_opd'),
                    'email'       => $this->input->post('email_opd'),
                    'fax'         => $this->input->post('fax_opd'),
                    'website'     => $this->input->post('website_opd'),
                    'id_admin'    => $this->input->post('id_admin')
                );
                $id = $this->input->post('id_opd');
                $this->mopd->update($id, $data);
                redirect('lbadmin/opd/update-berhasil');
        }
    }

    public function delete_opd($id){
        $foto = $this->uri->segment(4);
        $thumb = $this->uri->segment(5);
        $path1 = "./files/opd/source/".$foto;
        $path2 = "./files/opd/thumb/".$thumb;
        unlink($path1);
        unlink($path2);
        $this->mopd->delete($id);
        redirect('lbadmin/opd/hapus-berhasil');
    }

	public function aduan_hari_ini(){
		$data['title'] = "Data Aduan Hari Ini - Admin Lapor Bupati";
        $data['content'] = "aduan-hari-ini";
        $data['breadcrumb'] = "Data Aduan Hari Ini";
        $data['Aduan'] = "active";
        $data['aduan_hari_ini'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['data_aduan'] = $this->maduan->aduanHariIni(date('Y-m-d'))->result();
        $data['jml_data_aduan_hari_ini'] = $this->maduan->aduanHariIni(date('Y-m-d'))->num_rows();
		$this->load->view('view_admin/lbadmin', $data);
	}

    public function detail_aduan_hari_ini(){
        $data['title'] = "Detail Data Aduan Hari Ini - Admin Lapor Bupati";
        $data['content'] = "detail-data-aduan-hari-ini";
        $data['breadcrumb'] = "Detail Data Aduan Hari Ini";
        $data['Aduan'] = "active";
        $data['aduan_hari_ini'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function aduan_masuk(){
        $data['title'] = "Data Aduan Masuk - Admin Lapor Bupati";
        $data['content'] = "aduan-masuk";
        $data['breadcrumb'] = "Data Aduan Masuk";
        $data['Aduan'] = "active";
        $data['aduan_masuk'] = "active";
        $data['daftar_opd'] = $this->mopd->daftar_opd();
        $data['data_aduan'] = $this->maduan->aduanMasuk()->result();
        $data['jml_data_aduan_masuk'] = $this->maduan->aduanMasuk()->num_rows();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function aduan_diverifikasi(){
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

    public function aduan_didisposiskan(){
        $data['title'] = "Data Aduan Disposisi - Admin Lapor Bupati";
        $data['content'] = "aduan-didisposisikan";
        $data['breadcrumb'] = "Data Aduan Disposisi";
        $data['Aduan'] = "active";
        $data['aduan_didisposiskan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function aduan_dalam_penanganan(){
        $data['title'] = "Data Aduan dalam Penanganan - Admin Lapor Bupati";
        $data['content'] = "aduan-dalam-penanganan";
        $data['breadcrumb'] = "Data Aduan dalam Penanganan";
        $data['Aduan'] = "active";
        $data['aduan_dalam_penanganan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function aduan_selesai(){
        $data['title'] = "Data Aduan Selesai - Admin Lapor Bupati";
        $data['content'] = "aduan-selesai";
        $data['breadcrumb'] = "Data Aduan Selesai";
        $data['Aduan'] = "active";
        $data['aduan_selesai'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function aduan_bukan_kewenangan(){
        $data['title'] = "Data Aduan Bukan Kewenangan - Admin Lapor Bupati";
        $data['content'] = "aduan-bukan-kewenangan";
        $data['breadcrumb'] = "Data Aduan Bukan Kewenangan";
        $data['Aduan'] = "active";
        $data['aduan_bukan_kewenangan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function tempat_sampah_aduan(){
        $data['title'] = "Tempat Sampah Aduan - Admin Lapor Bupati";
        $data['content'] = "aduan-tempat-sampah";
        $data['breadcrumb'] = "Tempat Sampah Aduan";
        $data['Aduan'] = "active";
        $data['aduan_tempat_sampah'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function semua_aduan(){
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
        $this->maduan->disposisi($data);
        $this->maduan->updateAduanDisposisi($this->input->post('id_aduan'));
        redirect('lbadmin/'.$uri,'refresh');
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

    public function sektor(){
        $data['title'] = "Data Sektor - Admin Lapor Bupati";
        $data['content'] = "sektor";
        $data['breadcrumb'] = "Data Sektor";
        $data['Sektor'] = "active";
        $data['ssektor'] = "active";
        $data['data_sektor'] = $this->msektor->read();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function tambahsektor(){
        $data['title'] = "Tambah Data Sektor - Admin Lapor Bupati";
        $data['content'] = "tambah-sektor";
        $data['breadcrumb'] = "Tambah Data Sektor";
        $data['Sektor'] = "active";
        $data['tsektor'] = "active";
        $data['data_sektor'] = $this->msektor->read();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function editsektor($id){
        $data['title'] = "Edit Data Sektor - Admin Lapor Bupati";
        $data['content'] = "edit-sektor";
        $data['breadcrumb'] = "Edit Data Sektor";
        $data['Sektor'] = "active";
        $data['tsektor'] = "active";
        $data['data_sektor'] = $this->msektor->get_id_sektor($id);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function create_sektor(){
        $data = array(
            'id_sektor' => '',
            'sektor'    => $this->input->post('sektor'),
            'id_admin'  => $this->session->userdata('id_admin')
        );
        $this->msektor->create($data);
        $aktivitas = array(
            'id_aktivitas'  => '',
            'id_admin'      => $this->session->userdata('id_admin'),
            'aktivitas'     => 'Membuat sektor baru bernama '.$this->input->post('sektor')
        );
        $this->maktivitas->create($aktivitas);
        redirect('lbadmin/sektor/tambah-berhasil');
    }

    public function update_sektor(){
        $data = array(
            'sektor'    => $this->input->post('sektor'),
            'id_admin'  => $this->session->userdata('id_admin')
        );
        $id = $this->input->post('id_sektor');
        $this->msektor->update($id, $data);
        $aktivitas = array(
            'id_aktivitas' => '',
            'id_admin'     => $this->session->userdata('id_admin'),
            'aktivitas'    => 'Mengubah sektor '.str_replace("%20", " ", $this->input->post('sektor_lama')).' menjadi '.$this->input->post('sektor')
        );
        $this->maktivitas->create($aktivitas);
        redirect('lbadmin/sektor/edit-berhasil');
    }

    public function delete_sektor($id){
        $notif['status'] = 'sukses';
        $this->msektor->delete($id);
        $aktivitas = array(
            'id_aktivitas' => '',
            'id_admin'     => $this->session->userdata('id_admin'),
            'aktivitas'    => 'Menghapus sektor '.$this->uri->segment(4)
        );
        $this->maktivitas->create($aktivitas);
        redirect('lbadmin/sektor/hapus-berhasil');
    }

    public function user($offset = 0){
        $config['base_url'] = site_url('lbadmin/user/page/');
        $config['total_rows'] = $this->muser->jumlah_user();
        $config['per_page'] = 10;
        $config['use_page_number'] = false;
        $config['num_links'] = 2;
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

        $data['title'] = "Data User - Admin Lapor Bupati";
        $data['content'] = "user";
        $data['breadcrumb'] = "Data User";
        $data['User'] = "active";
        $data['duser'] = "active";
        $data['data_user'] = $this->muser->get_limit_user($config['per_page'], $offset);
        $data['link_user'] = $this->pagination->create_links();
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function detail_user($id){
        $user = $this->muser->get_id_user($id)->num_rows();
        if ($user > 0) {
            $data['title'] = "Informasi Detail User";
            $data['content'] = "detail-user";
            $data['breadcrumb'] = "Detail User";
            $data['user'] = "active";
            $data['duser'] = "active";
            $data['detailuser'] = $this->muser->get_id_user($id)->result_array();
            $this->load->view('view_admin/lbadmin', $data);
        }else{
            $this->load->view('404');
        }
        
    }

    public function tambah_user(){
        $data['title'] = "Tambah Data User - Admin Lapor Bupati";
        $data['content'] = "tambah-user";
        $data['breadcrumb'] = "Tambah Data User";
        $data['User'] = "active";
        $data['tuser'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function create_user(){
        $nm_file = "user_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/user/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
        $this->upload->initialize($config);
        if(isset($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/user/source/'.$data_upload['file_name'],
                    'new_image' => './files/user/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '100%',
                    'height' => 200,
                    'width' => 200
                );
                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();
                $data = array(
                    'id_user'    => '',
                    'no_ktp'     => $this->input->post('no_ktp'),
                    'nama_user'  => $this->input->post('nama_user'),
                    'jk'         => $this->input->post('jk'),
                    'tmp_lahir'  => $this->input->post('tmp_lahir'),
                    'tgl_lahir'  => $this->input->post('tgl_lahir'),
                    'password'   => $this->input->post('password'),
                    'email'      => $this->input->post('email_user'),
                    'no_telepon' => $this->input->post('telp_user'),
                    'foto'       => $data_upload['file_name'],
                    'thumb'      => $nm_file.'_thumb'.$data_upload['file_ext'],
                    'alamat'     => $this->input->post('alamat'),
                    'bio'        => $this->input->post('bio'),
                    'aktif'      => '0'
                );
                $this->muser->create($data);
                redirect('lbadmin/user/tambah_berhasil');
            }else{
                $data = array(
                    'id_user'    => '',
                    'no_ktp'     => $this->input->post('no_ktp'),
                    'nama_user'  => $this->input->post('nama_user'),
                    'jk'         => $this->input->post('jk'),
                    'tmp_lahir'  => $this->input->post('tmp_lahir'),
                    'tgl_lahir'  => $this->input->post('tgl_lahir'),
                    'username'   => $this->input->post('username'),
                    'password'   => $this->input->post('password'),
                    'email'      => $this->input->post('email_user'),
                    'no_telepon' => $this->input->post('telp_user'),
                    'alamat'     => $this->input->post('alamat'),
                    'bio'        => $this->input->post('bio'),
                    'aktif'      => '0'
                );
                $this->muser->create($data);
                redirect('lbadmin/user/tambah-berhasil');
            }
        }
    }

    public function edit_user($id){
        $data['title'] = "Edit Data User - Admin Lapor Bupati";
        $data['content'] = "edit-user";
        $data['breadcrumb'] = "Edit Data User";
        $data['User'] = "active";
        $data['duser'] = "active";
        $data['datauser'] = $this->muser->get_id_user($id);
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function update_user(){
        $nm_file = "user_".time(); //nama file + fungsi time
        $config['upload_path'] = './files/user/source/'; //folder untuk meyimpan foto
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $nm_file;
        $this->upload->initialize($config);
        if(!empty($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
                $data_upload = $this->upload->data();
                $create_thumb = array(
                    'image_library' => 'gd2',
                    'source_image' => './files/user/source/'.$data_upload['file_name'],
                    'new_image' => './files/user/thumb/'.$data_upload['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '100%',
                    'height' => 200,
                    'width' => 200
                );
                $this->image_lib->initialize($create_thumb);
                $this->image_lib->resize();
                $data = array(
                    'no_ktp'     => $this->input->post('no_ktp'),
                    'nama_user'  => $this->input->post('nama_user'),
                    'jk'         => $this->input->post('jk'),
                    'tmp_lahir'  => $this->input->post('tmp_lahir'),
                    'tgl_lahir'  => $this->input->post('tgl_lahir'),
                    'username'   => $this->input->post('username'),
                    'password'   => $this->input->post('password'),
                    'email'      => $this->input->post('email_user'),
                    'no_telepon' => $this->input->post('telp_user'),
                    'foto'       => $data_upload['file_name'],
                    'thumb'      => $nm_file.'_thumb'.$data_upload['file_ext'],
                    'alamat'     => $this->input->post('alamat'),
                    'bio'        => $this->input->post('bio'),
                );
                $id = $this->input->post('id_user');
                $this->muser->update($id, $data);
                $foto = $this->input->post('ft_user');
                $thumb = $this->input->post('tm_user');
                $path1 = "./files/user/source/".$foto;
                $path2 = "./files/user/thumb/".$thumb;
                unlink($path1);
                unlink($path2);
                redirect('lbadmin/user/update-berhasil');
            }
        }else{
            $data = array(
                    'no_ktp'     => $this->input->post('no_ktp'),
                    'nama_user'  => $this->input->post('nama_user'),
                    'jk'         => $this->input->post('jk'),
                    'tmp_lahir'  => $this->input->post('tmp_lahir'),
                    'tgl_lahir'  => $this->input->post('tgl_lahir'),
                    'username'   => $this->input->post('username'),
                    'password'   => $this->input->post('password'),
                    'email'      => $this->input->post('email_user'),
                    'no_telepon' => $this->input->post('telp_user'),
                    'alamat'     => $this->input->post('alamat'),
                    'bio'        => $this->input->post('bio'),
                );
            $id = $this->input->post('id_user');
            $this->muser->update($id, $data);
            redirect('lbadmin/user/update-berhasil');
        }
    }

    public function delete_user($id){
        $foto = $this->uri->segment(4);
        $thumb = $this->uri->segment(5);
        $path1 = "./files/user/source/".$foto;
        $path2 = "./files/user/thumb/".$thumb;
        unlink($path1);
        unlink($path2);
        $this->muser->delete($id);
        redirect('lbadmin/user/hapus-berhasil');
    }

    public function masukan(){
        $data['title'] = "Data Masukan - Admin Lapor Bupati";
        $data['content'] = "semua-masukan";
        $data['breadcrumb'] = "Data Masukan";
        $data['masukan'] = "active";
        $data['dmasukan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function masukan_hari_ini(){
        $data['title'] = "Data Masukan Hari Ini - Admin Lapor Bupati";
        $data['content'] = "masukan-hari-ini";
        $data['breadcrumb'] = "Data Masukan Hari Ini";
        $data['masukan'] = "active";
        $data['dmasukan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function masukan_bulan_ini(){
        $data['title'] = "Data Masukan Bulan Ini - Admin Lapor Bupati";
        $data['content'] = "masukan-bulan-ini";
        $data['breadcrumb'] = "Data Masukan Bulan Ini";
        $data['masukan'] = "active";
        $data['dmasukan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function detail_masukan(){
        $data['title'] = "Detail Masukan - Admin Lapor Bupati";
        $data['content'] = "detail-masukan";
        $data['breadcrumb'] = "Detail Masukan";
        $data['masukan'] = "active";
        $data['dmasukan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function tambah_masukan(){
        $data['title'] = "Masukan - Admin Lapor Bupati";
        $data['content'] = "tambah-masukan";
        $data['breadcrumb'] = "Masukan";
        $data['masukan'] = "active";
        $data['tmasukan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function semua_komentar(){
        $data['title'] = "Data Komentar - Admin Lapor Bupati";
        $data['content'] = "semua-komentar";
        $data['breadcrumb'] = "Data Komentar";
        $data['Komentar'] = "active";
        $data['semua_komentar'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function komentar_hari_ini(){
        $data['title'] = "Data Komentar Hari Ini - Admin Lapor Bupati";
        $data['content'] = "komentar-hari-ini";
        $data['breadcrumb'] = "Data Komentar Hari Ini";
        $data['Komentar'] = "active";
        $data['komentar_hari_ini'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function laporan(){
        $data['title'] = "Cetak Laporan Aduan - Admin Lapor Bupati";
        $data['content'] = "laporan";
        $data['breadcrumb'] = "Laporan";
        $data['laporan'] = "active";
        $data['laporan_hari_ini'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function komentar_kemarin(){
        $data['title'] = "Data Komentar Kemarin - Admin Lapor Bupati";
        $data['content'] = "komentar-kemarin";
        $data['breadcrumb'] = "Data Komentar Kemarin";
        $data['Komentar'] = "active";
        $data['komentar_kemarin'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    public function pengaturan(){
        $data['title'] = "Pengaturan - Admin Lapor Bupati";
        $data['content'] = "pengaturan";
        $data['breadcrumb'] = "Pengaturan";
        $data['Pengaturan'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

    function logout() {
        $data_session_unset = array(
                'id_admin',
                'nama_admin',
                'level',
                'foto',
                'thumb',
                'email',
                'status'
            );
        $this->session->unset_userdata($data_session_unset);
        redirect(base_url('sysadminlogin'));
    }

}

/* End of file Lbadmin.php */
/* Location: ./application/controllers/Lbadmin.php */
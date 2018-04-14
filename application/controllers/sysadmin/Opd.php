<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mopd');
        $this->load->model('madmin');
	}

	public function index($offsset = 0){
		$query = $this->input->get('cari');
        $perpage = 8;
        $this->session->set_flashdata('query', '');

        if (empty($query)) {
            $config['base_url'] = site_url('sysadmin/opd');
            $config['total_rows'] = $this->mopd->jumlah_opd();
            $config['per_page'] = $perpage;
            $config['uri_segment'] = 3;
            $config['use_page_number'] = TRUE;
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

            $data['title'] = "Data OPD - Admin Lapor Bupati";
            $data['content'] = "opd";
            $data['breadcrumb'] = "Data OPD";
            $data['dopd'] = "active";
            $data['opd'] = "active";
            $data['data_opd'] = $this->mopd->get_limit_opd($config['per_page'], $offsset);
            $data['link_opd'] = $this->pagination->create_links();
        }else{

            $offsset = $this->input->get('per_page');

            $config['base_url'] = site_url('sysadmin/opd?cari='.$query);
            $config['total_rows'] = $this->mopd->jmlCariOpd($query)->num_rows();
            $config['per_page'] = $perpage;
            $config['uri_segment'] = 3;
            $config['use_page_number'] = TRUE;
            $config['page_query_string'] = TRUE;
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

            $data['title'] = "Data OPD - Admin Lapor Bupati";
            $data['content'] = "opd";
            $data['breadcrumb'] = "Data OPD";
            $data['dopd'] = "active";
            $data['opd'] = "active";
            $data['data_opd'] = $this->mopd->cariOpd($query, $perpage, $offsset)->result();
            $data['link_opd'] = $this->pagination->create_links();

            $this->session->set_flashdata('query', 'Hasil pencarian untuk "<b>'.$query.'"</b>');
        }

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

}

/* End of file Opd.php */
/* Location: ./application/controllers/admin/Opd.php */
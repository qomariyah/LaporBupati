<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('muser');
        $this->load->model('maduan');
	}

	public function data($offset = 0){
        $data['title'] = "Data User - Admin Lapor Bupati";
        $data['content'] = "user";
        $data['breadcrumb'] = "Data User";
        $data['User'] = "active";
        $data['duser'] = "active";

        $query = $this->input->get('cari');

        $this->session->set_flashdata('query', '');

		if (!isset($query)) {
            $config['base_url'] = site_url('sysadmin/user/data');
            $config['total_rows'] = $this->muser->jumlah_user();
            $config['per_page'] = 20;
            $config['use_page_number'] = false;
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
            
            $data['data_user'] = $this->muser->get_limit_user($config['per_page'], $offset);
            $data['link_user'] = $this->pagination->create_links();

        }else{
            $config['base_url'] = site_url('sysadmin/user/data?cari='.$query);
            $config['total_rows'] = $this->muser->jumlah_user_cari($query);
            $config['per_page'] = 20;
            $config['use_page_number'] = false;
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
            $this->session->set_flashdata('query', 'Hasil pencarian untuk <b>"'.$query.'"</b>');
            $data['data_user'] = $this->muser->get_limit_user_cari($query, $config['per_page'], $offset);
            $data['link_user'] = $this->pagination->create_links();
        }
        $this->load->view('view_admin/lbadmin', $data);
	}

    public function detail($id){
        $user = $this->muser->get_id_user($id)->num_rows();
        if ($user > 0) {
            $data['title'] = "Informasi Detail User";
            $data['content'] = "detail-user";
            $data['breadcrumb'] = "Detail User";
            $data['User'] = "active";
            $data['duser'] = "active";
            $data['detailuser'] = $this->muser->get_id_user($id)->result_array();
            $data['data_aduan'] = $this->maduan->getAduanByIdUser($id)->result();
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

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Do your magic here
        $this->load->model('madmin');
	}

	public function data($offset = 0){
		$config['base_url'] = site_url('lbadmin/administrator/data');
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

	public function tambah(){
        $last_id = $this->madmin->autoId()->result();
        foreach ($last_id as $key) {
            $id = $key->id_admin;
        }
        $num_id = substr($id, 4, 6)+1;
        $auto_id = "ADM0".$num_id;

        if (strlen($num_id) == 1) {
            $auto_id = "ADM00".$num_id;
        }elseif (strlen($num_id) == 2) {
            $auto_id = "ADM0".$num_id;
        }elseif (strlen($num_id) == 3) {
            $auto_id = "ADM".$num_id;
        }

		$data['title'] = "Tambah Data Adimistrator - Admin Lapor Bupati";
        $data['content'] = "tambah-administrator";
        $data['breadcrumb'] = "Tambah Data Adimistrator";
        $data['Administrator'] = "active";
        $data['tambah_administrator'] = "active";
        $data['id_admin'] = $auto_id;
        $data['data_id'] = $this->madmin->createID();
		$this->load->view('view_admin/lbadmin', $data);
	}

    public function create(){
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
                    'password'   => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
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
                $this->session->set_flashdata('notif', 'Data admin berhasil ditambah');
                $this->session->set_flashdata('type', 'success');
                redirect('sysadmin/administrator');
            }else{
                $data = array(
                    'id_admin'   => $this->input->post('id_admin'),
                    'username'   => $this->input->post('username'),
                    'password'   => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'email'      => $this->input->post('email'),
                    'alamat'     => $this->input->post('alamat'),
                    'nama_admin' => $this->input->post('nama_admin'),
                    'level'      => $this->input->post('level'),
                    'aktif'      => '0'
                );
                $this->madmin->create($data);
                $this->session->set_flashdata('notif', 'Data admin berhasil ditambah');
                $this->session->set_flashdata('type', 'success');
                redirect('sysadmin/administrator');
            }
        }
    }

	public function edit($id){
		$data['title'] = "Edit Data Adimistrator - Admin Lapor Bupati";
        $data['content'] = "edit-administrator";
        $data['breadcrumb'] = "Edit Data Adimistrator";
        $data['Administrator'] = "active";
        $data['data_admin'] = $this->madmin->getadmin($id);
		$this->load->view('view_admin/lbadmin', $data);
	}

	public function update(){
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
                if (empty($this->input->post('pass'))) {
                    $data = array(
                        'username'   => $this->input->post('username'),
                        'no_telepon' => $this->input->post('no_telepon'),
                        'email'      => $this->input->post('email'),
                        'foto'       => $data_upload['file_name'],
                        'thumbnail'  => $nm_file.'_thumb'.$data_upload['file_ext'],
                        'alamat'     => $this->input->post('alamat'),
                        'nama_admin' => $this->input->post('nama_admin'),
                        'level'      => $this->input->post('level')
                    );
                }else{
                    $data = array(
                        'username'   => $this->input->post('username'),
                        'password'   => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                        'no_telepon' => $this->input->post('no_telepon'),
                        'email'      => $this->input->post('email'),
                        'foto'       => $data_upload['file_name'],
                        'thumbnail'  => $nm_file.'_thumb'.$data_upload['file_ext'],
                        'alamat'     => $this->input->post('alamat'),
                        'nama_admin' => $this->input->post('nama_admin'),
                        'level'      => $this->input->post('level')
                    );
                }
                $id = $this->input->post('id_admin');
                $this->madmin->update($id, $data);
				$foto = $this->input->post('ft');
				$thumb = $this->input->post('tm');
				$path1 = "./files/administrator/source/".$foto;
				$path2 = "./files/administrator/thumb/".$thumb;
				unlink($path1);
				unlink($path2);
                $this->session->set_flashdata('notif', 'Data admin berhasil diubah');
                $this->session->set_flashdata('type', 'success');
                redirect('sysadmin/administrator');
            }
        }else{
        	if (empty($this->input->post('pass'))) {
                    $data = array(
                        'username'   => $this->input->post('username'),
                        'no_telepon' => $this->input->post('no_telepon'),
                        'email'      => $this->input->post('email'),
                        'alamat'     => $this->input->post('alamat'),
                        'nama_admin' => $this->input->post('nama_admin'),
                        'level'      => $this->input->post('level')
                    );
                }else{
                    $data = array(
                        'username'   => $this->input->post('username'),
                        'password'   => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
                        'no_telepon' => $this->input->post('no_telepon'),
                        'email'      => $this->input->post('email'),
                        'alamat'     => $this->input->post('alamat'),
                        'nama_admin' => $this->input->post('nama_admin'),
                        'level'      => $this->input->post('level')
                    );
                }
            $id = $this->input->post('id_admin');
            $this->madmin->update($id, $data);
            $this->session->set_flashdata('notif', 'Data admin berhasil diubah');
            $this->session->set_flashdata('type', 'success');
            redirect('sysadmin/administrator');
        }
	}

	public function aktifkan($id){
		$this->madmin->aktifkan($id);
        $this->session->set_flashdata('notif', 'Data admin berhasil diaktifkan');
        $this->session->set_flashdata('type', 'success');
        redirect('sysadmin/administrator');
	}
	public function nonaktifkan($id){
		$this->madmin->nonaktifkan($id);
        $this->session->set_flashdata('notif', 'Data admin berhasil dinonaktifkan');
        $this->session->set_flashdata('type', 'success');
        redirect('sysadmin/administrator');
	}

	public function delete($id){
		$foto = $this->uri->segment(4);
		$thumb = $this->uri->segment(5);
		$path1 = "./files/administrator/source/".$foto;
		$path2 = "./files/administrator/thumb/".$thumb;
		unlink($path1);
		unlink($path2);
		$this->madmin->delete($id);
        $this->session->set_flashdata('notif', 'Data admin berhasil dihapus');
        $this->session->set_flashdata('type', 'success');
        redirect('sysadmin/administrator');
	}

}

/* End of file Administrator.php */
/* Location: ./application/controllers/admin/Administrator.php */
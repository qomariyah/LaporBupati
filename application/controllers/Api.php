<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mapi');
	}

	public function index() {
		
	}

	public function login(){
		$telp = $this->input->post('telp');
		$pass = $this->input->post('pass');
		$hasil = $this->mapi->login($telp, $pass);
		if ($hasil->num_rows() ==1) {
			foreach ($hasil->result_array() as $key) {
				if ($key['aktif'] == 0) {
					$response = array(
						'code' => '2'
					);
				}else if($key['aktif'] == 1){
					$response = array(
						'code' => '1',
						'id_user' => $key['id_user'],
						'no_ktp' => $key['no_ktp'],
						'nama_user' => $key['nama_user'],
						'jk' => $key['jk'],
						'tmp_lahir' => $key['tmp_lahir'],
						'tgl_lahir' => $key['tgl_lahir'],
						'password' => $key['password'],
						'no_telepon' => $key['no_telepon'],
						'alamat' => $key['alamat'],
						'bio' => $key['bio'],
						'dibuat' => $key['dibuat'],
						'email' => $key['email'],
						'foto' => $key['foto']
					);
				}
				echo json_encode($response);
			}
		}else{
			$response = array(
				'code' => '0'
			);
			echo json_encode($response);
		}
	}

	public function register(){
		$data = array(
			'no_ktp' => $this->input->post('ktp'),
			'nama_user' => $this->input->post('nama'),
			'no_telepon' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('pass')
		);
		$this->mapi->register($data);
		$response = array(
			'code' => '1'
		);
		echo json_encode($response);

	}

	public function opd(){
		echo json_encode($this->mapi->opd());
	}

	public function loadkomentar(){
		$id = $this->uri->segment(3);
		echo json_encode($this->mapi->loadkomentar($id));
	}

	public function loadnotif(){
		$id = $this->uri->segment(3);
		echo json_encode($this->mapi->loadnotif($id));
	}

	public function aduan(){
		echo json_encode($this->mapi->aduan());
	}

	public function cariaduan(){
		$query = $this->uri->segment(3);
		$q = str_replace("%20", " ", $query);
		echo json_encode($this->mapi->cariaduan($q));;
	}

	public function aduansaya(){
		$id = $this->uri->segment(3);
		echo json_encode($this->mapi->aduansaya($id));
	}

	public function tambahaduan(){
		$nm_file = "aduan_".time().".jpg"; //nama file + fungsi time
		$image = $this->input->post('foto_aduan');
		$path = "files/aduan/source/".$nm_file;
        if (isset($image)) {
        	$data = array(
	            'id_user' => $this->input->post('id_user'),
				'aduan' => $this->input->post('aduan'),
				'kategori' => $this->input->post('kategori'),
				'rahasia' => $this->input->post('rahasia'),
				'lampiran' => $nm_file,
	            'dibaca' => '0'
	        );
	         $proses = $this->mapi->tambahaduan($data);
	        if(file_put_contents($path, base64_decode($image))){
	            $response = array(
	            	'status' => '1'
	            );
	            echo json_encode($response);
	        }else{
	        	$response = array(
	            	'status' => '0'
	            );
	            echo json_encode($response);
	        }
        }else{
        	$data = array(
	            'id_user' => $this->input->post('id_user'),
				'aduan' => $this->input->post('aduan'),
				'kategori' => $this->input->post('kategori'),
				'rahasia' => $this->input->post('rahasia'),
	            'dibaca' => '0'
	        );
	        $this->mapi->tambahaduan($data);
            $response = array(
            	'status' => '1'
            );
            echo json_encode($response);

        }
	}

	//OPD SECTION

	public function login_opd(){
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$hasil = $this->mapi->login_opd($username);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result_array() as $key) {
				if ($key['aktif'] == 0) {
					$response = array(
						'code' => '2'
					);
				}else if($key['aktif'] == 1){

					foreach ($hasil->result_array() as $row){
	                    $data = $row['password'];
	                }

	                if (password_verify($pass, $data)) {

	                	$opd = $this->mapi->getIdOpd($key['id_admin']);

						foreach ($opd->result_array() as $data) {
							$id_opd = $data['id_opd'];
							$nama_opd = $data['nama_opd'];
							$singkatan = $data['singkatan'];
						}

						$response = array(
							'code'		=> '1',
							'id_admin'	=> $key['id_admin'],
							'id_opd'	=> $id_opd,
							'nama_admin'	=> $key['nama_admin'],
							'foto'		=> $key['foto'],
							'thumb'		=> $key['thumbnail'],
							'telp'		=> $key['no_telepon'],
							'email'		=> $key['email'],
							'alamat'		=> $key['alamat'],
							'level'		=> $key['level'],
							'jk'		=> $key['jk'],
							'opd'		=> $nama_opd,
							'singkatan'	=> $singkatan
						);
	                }else{
	                	$response = array(
							'code' => '0'
						);
	                }
					echo json_encode($response);
				}
			}
		}else{
			$response = array(
				'code' => '0'
			);
			echo json_encode($response);
		}
	}

	//END OF OPD SECTION
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */

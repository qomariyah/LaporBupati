<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opd extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mopd');
		$this->load->model('mfront');
	}

	public function index($offset = 0){
		$config['base_url'] = site_url('opd/page/');
        $config['total_rows'] = $this->mopd->jumlah_opd();
        $config['per_page'] = 10;
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

		$data = array (
			'title'			=> 'Informasi OPD - Lapor Bupati',
			'content'		=> 'data-opd',
			'judul'			=> 'Informasi OPD',
			'breadcrumb'	=> 'Informasi OPD',
			'data_opd'		=> $this->mopd->get_limit_opd($config['per_page'], $offset),
			'link_opd'		=> $this->pagination->create_links()
		);
		$this->load->view('view_front/lbfront', $data);
	}

	public function detail($id){
		$data = array (
			'title'			=> 'Detail OPD - Lapor Bupati',
			'content'		=> 'detail-opd',
			'judul'			=> 'Informasi OPD',
			'breadcrumb'	=> 'Detail OPD',
			'detailopd'		=> $this->mopd->get_id_opd($id)
		);
		$this->load->view('view_front/lbfront', $data);
	}

}

/* End of file Opd.php */
/* Location: ./application/controllers/front/Opd.php */
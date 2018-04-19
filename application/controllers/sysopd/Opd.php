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

	public function data($offsset = 0){
		$query = $this->input->get('cari');
        $perpage = 8;
        $this->session->set_flashdata('query', '');

        if (empty($query)) {
            $config['base_url'] = site_url('sysopd/opd/data');
            $config['total_rows'] = $this->mopd->jumlah_opd();
            $config['per_page'] = $perpage;
            $config['uri_segment'] = 3;
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

            $data['title'] = "Data OPD - Admin Lapor Bupati";
            $data['content'] = "opd";
            $data['breadcrumb'] = "Data OPD";
            $data['dopd'] = "active";
            $data['opd'] = "active";
            $data['data_opd'] = $this->mopd->get_limit_opd($config['per_page'], $offsset);
            $data['link_opd'] = $this->pagination->create_links();
        }else{

            $offsset = $this->input->get('per_page');

            $config['base_url'] = site_url('sysopd/opd/data?cari='.$query);
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

        $this->load->view('view_opd/lbopd', $data);
	}

    public function detail($id){
        $data['title'] = "Informasi Detail OPD";
        $data['content'] = "detail-opd";
        $data['breadcrumb'] = "Detail OPD";
        $data['dopd'] = "active";
        $data['opd'] = "active";
        $data['detailopd'] = $this->mopd->get_id_opd($id);
        $this->load->view('view_admin/lbadmin', $data);
    }

}

/* End of file Opd.php */
/* Location: ./application/controllers/admin/Opd.php */
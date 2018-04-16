<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends CI_Controller {

	function elfinder_init(){
        $this->load->helper('general_helper');
        $opts = initialize_elfinder();
        $this->load->library('elfinder_lib', $opts);   
    }

    public function index(){
        $data['title'] = "File Manager";
        $data['content'] = "filemanager";
        $data['breadcrumb'] = "File Manager";
        $data['Filemanager'] = "active";
        $this->load->view('view_admin/lbadmin', $data);
    }

}

/* End of file Filemanager.php */
/* Location: ./application/controllers/admin/Filemanager.php */
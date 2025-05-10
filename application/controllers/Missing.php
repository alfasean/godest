<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Missing extends CI_Controller  {
	    public function __construct() {
	        parent::__construct();
	        $this->load->library('form_validation');
	    }

	    public function index() {
			if($this->session->userdata('u_id')>0){
				$data['htmlpagejs'] = 'none';
				$data['nmenu'] = 'Not Found';
				$data['title'] = '';
				$data['namalabel'] = $data['nmenu'];

				$data['auth'] = auth_login();

				$this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/sidemenu', $data);
				$this->load->view('admin/templates/sidenav', $data);
				$this->load->view('admin/module/auth/missing', $data);
				$this->load->view('admin/templates/footer', $data);
				$this->load->view('admin/templates/fscript-html-end', $data);
			}else{
				redirect('index');
			}
	    }
	} 
?>
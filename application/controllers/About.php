<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
    }

    public function index() {

        $data['title']   = 'Tentang Kami - ';
        $data['ogurl']   = 'about';
        $data['sistem']  = pengaturan_sistem();

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/menu', $data);
        $this->load->view('frontend/about', $data);
        $this->load->view('frontend/templates/footer', $data);
    }

}

?>
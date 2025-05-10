<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
    }

    public function index() {

        $data['title']   = 'Kontak Kami - ';
        $data['ogurl']   = 'contact';
        $data['sistem']  = pengaturan_sistem();

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/menu', $data);
        $this->load->view('frontend/contact', $data);
        $this->load->view('frontend/templates/footer', $data);
    }

}

?>
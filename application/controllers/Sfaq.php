<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Sfaq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('index_model', 'index');
    }

    public function index() {

        $data['title']   = 'FAQs - ';
        $data['ogurl']   = 'sfaq';
        $data['sistem']  = pengaturan_sistem();

        $data['d_faqs']  = $this->index->get_faqs();

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/menu', $data);
        $this->load->view('frontend/faq', $data);
        $this->load->view('frontend/templates/footer', $data);
    }

}

?>
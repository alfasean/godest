<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
    }

    public function index($tipe = 'default') {

        $this->session->unset_userdata('u_id');

        $this->session->set_flashdata('msg_color', 'primary');
        $this->session->set_flashdata('message', 'Telah keluar.');
        redirect('login');
    }
}

?>
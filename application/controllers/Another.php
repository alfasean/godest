<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Another extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
    }
}

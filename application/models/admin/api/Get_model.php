<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_model extends CI_Model {

    protected $compid;
    protected $today;
    protected $linkimg;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
        $this->today = date('Y-m-d');
        $this->linkimg = '';
    }

    public function get_setting($postjson){

        if (!isset($postjson)) exit();

        $settingapp = pengaturan_sistem();

        return json_encode(array(
            'status' => true, 
            'result' => $settingapp
        ));

    }

}
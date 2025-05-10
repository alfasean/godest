<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sysapp_model extends CI_Model {

    protected $compid;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
    }

    public function edit_proses() {
        $this->db->set([
            'meta_title'            => $this->input->post('meta_title'),
            'meta_description'      => $this->input->post('meta_description'),
            'meta_keywords'         => $this->input->post('meta_keywords'),
            'header_lg'             => $this->input->post('header_lg'),
            'header_sm'             => $this->input->post('header_sm'),
            'm_1'                   => $this->input->post('m_1'),
            'm_2'                   => $this->input->post('m_2'),
            'm_3'                   => $this->input->post('m_3'),
            'about'                 => str_replace_berbahaya($this->input->post('about')),
            'cs_phone'              => $this->input->post('cs_phone'),
            'cs_email'              => $this->input->post('cs_email'),
            'alamat'                => $this->input->post('alamat'),
            'footer_text'           => $this->input->post('footer_text'),
            'footer_copyright'      => $this->input->post('footer_copyright')
        ]);
        $this->db->where('setting_id', 1);
        $res = $this->db->update('_setting');
        return $res;
    }

}
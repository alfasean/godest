<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('admin/setting/sysapp_model', 'mdata');

        $this->compid = 'admin/dashboard/';
    }

    public function index() {
        $data['htmlpagejs'] = 'dashboard';
        $data['nmenu'] = 'Pengaturan';
        $data['title'] = 'Pengaturan';
        $data['namalabel']  = $data['title'].' Sistem';
        $data['compid']     = $this->compid;

        $data['auth']   = auth_login();
        $data['sistem'] = pengaturan_sistem();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/dashboard/index', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function edit_proses() {

        $data['auth']       = auth_login();
        $check = $this->other->check_access_edit($data['auth']);
        if ($check==false) {
            redirect($this->compid);
        }

        $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('meta_description', 'Meta Deskripsi', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('meta_keywords', 'Meta Keyword', 'trim|required|xss_clean|htmlspecialchars');

        $this->form_validation->set_rules('header_lg', 'Label Header', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('header_sm', 'Sub Header', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('m_1', 'Label Informasi 1', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('m_2', 'Label Informasi 3', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('m_3', 'Label Informasi 3', 'trim|required|xss_clean|htmlspecialchars');

        $this->form_validation->set_rules('about', 'Tentang Kami', 'trim');
        
        $this->form_validation->set_rules('cs_phone', 'CS Phone', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('cs_email', 'CS Email', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|xss_clean|htmlspecialchars');
        
        $this->form_validation->set_rules('footer_text', 'Footer Text', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('footer_copyright', 'Footer Copyright', 'trim|required|xss_clean|htmlspecialchars');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', validation_errors());
            redirect($this->compid);
        } else {
            $res = $this->mdata->edit_proses();
            if ($res==true) {
                $this->other->set_sess_success();
                redirect($this->compid);
            }else{
                $this->other->set_sess_err();
                redirect($this->compid);
            }
        }
    }

}

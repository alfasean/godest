<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller {

    protected $compid;

    public function __construct() {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('admin/company/profile_model', 'profile');

        $this->compid = 'admin/company/profile/';
    }

    public function index() {
        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Profile';
        $data['title']      = 'Pengaturan';
        $data['namalabel']  = $data['title'];
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/company/profile/index', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function edit() {
        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Profile';
        $data['title']      = 'Pengaturan';
        $data['namalabel']  = 'Edit Profile';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/company/profile/edit', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function edit_proses() {
        $unama  = $this->input->post('email');

        $this->form_validation->set_rules('nama', 'Nama', 
            'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('email', 'Email', 
            'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('password', 'Password', 
            'trim|xss_clean|htmlspecialchars');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', validation_errors());
            redirect($this->compid.'edit/');
        } else {
            $query = $this->db->get_where('m_admin', ['email_address' => $unama, 'is_del' => 'n', 'admin_id!=' => $this->session->userdata('u_id')])->num_rows();
            if ($query < 1) {
                $res = $this->profile->edit_proses();
                if ($res==true) {
                    $this->other->set_sess_success();
                    redirect($this->compid);
                }else{
                    $this->other->set_sess_err();
                    redirect($this->compid.'edit/');
                }
            } else {
                $this->other->set_sess_war('Proses dihentikan, <b>"'.$unama.'"</b> sudah digunakan.');
                redirect($this->compid.'edit/');
            }
        }
    }

}

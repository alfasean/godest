<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
    }

    public function index() {
        if ($this->session->userdata('u_id')){
            redirect('admin/dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|htmlspecialchars');

        if ($this->form_validation->run() == false) {
            $data['htmlpagejs']     = 'auth';
            $data['htmlclasstemp']  = 'customizer-hide';
            $data['title']          = 'Halaman Login';

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/module/auth/signin', $data);
            $this->load->view('admin/templates/fscript-html-end', $data);
        } else {
            $this->_login();
        }
    }

    private function _login() {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $user       = $this->other->proses_login($email);

        if ($user != null) {
            if ($user['is_status']=='y') {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'u_id'          => $user['admin_id']
                    ];

                    $this->session->set_userdata($data);

                    redirect('login');
                } else {
                    $this->session->set_flashdata('msg_color', 'danger');
                    $this->session->set_flashdata('message', 'Email atau kata sandi tidak sesuai.');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('msg_color', 'warning');
                $this->session->set_flashdata('message', 'Akun tidak aktif, hubungi tim support untuk informasi lebih lanjut.');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', 'Akun tidak terdaftar.');
            redirect('login');
        }
    }
}

?>
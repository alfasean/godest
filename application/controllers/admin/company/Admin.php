<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {

    protected $compid;

    public function __construct() {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('admin/company/admin_model', 'admin');

        $this->compid = 'admin/company/admin/';
    }

    public function index() {
        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Admin';
        $data['title']      = 'Admin';
        $data['namalabel']  = 'Data Admin';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();
        $data['datas']      = $this->admin->get_data();

        $data['uid']       = $this->session->userdata('u_id');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/company/admin/index', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function add() {
        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Admin';
        $data['title']      = 'Admin';
        $data['namalabel']  = 'Tambah Data';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();

        $check = $this->other->check_access_add($data['auth']);
        if ($check==false) {
            redirect($this->compid);
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/company/admin/add', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function add_proses() {
        $unama  = $this->input->post('email');

        $this->form_validation->set_rules('nama', 'Nama', 
            'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('email', 'Email', 
            'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('status', 'Status', 
            'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('p_add', 'Tambah', 
            'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('p_edit', 'Edit', 
            'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('p_del', 'Hapus', 
            'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('password', 'Password', 
            'trim|required|xss_clean|htmlspecialchars|min_length[5]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', validation_errors());
            redirect($this->compid.'add');
        } else {
            $query = $this->db->get_where('m_admin', ['email_address' => $unama, 'is_del' => 'n'])->num_rows();
            if ($query < 1) {
                $res = $this->admin->add_proses();
                if ($res==true) {
                    $this->other->set_sess_success();
                    redirect($this->compid);
                }else{
                    $this->other->set_sess_err();
                    redirect($this->compid.'add');
                }
            } else {
                $this->other->set_sess_war('Proses dihentikan, <b>"'.$unama.'"</b> sudah digunakan.');
                redirect($this->compid.'add');
            }
        }
    }

    public function edit($id = null) {
        if ($id==null) { redirect($this->compid); }
        
        if ($id==1) {
            $this->other->set_sess_deep();
            redirect($this->compid); 
        }

        $dataedit = $this->db->get_where('m_admin', ['admin_id' => $id, 'is_del' => 'n']);
        if ($dataedit->num_rows()==0) {
            $this->other->set_sess_empty();
            redirect($this->compid); 
        }

        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Admin';
        $data['title']      = 'Admin';
        $data['namalabel']  = 'Edit Data';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();

        $check = $this->other->check_access_edit($data['auth']);
        if ($check==false) {
            redirect($this->compid);
        }

        $data['edit']       = $dataedit->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/company/admin/edit', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function edit_proses($id = null) {
        $unama  = $this->input->post('email');

        if ($id==null) { redirect($this->compid); }
        if ($id==1) {
            $this->other->set_sess_deep();
            redirect($this->compid); 
        }

        $dataedit = $this->db->get_where('m_admin', ['admin_id' => $id, 'is_del' => 'n']);
        $rowcheck = $dataedit->row_array();
        if ($dataedit->num_rows()==0) {
            $this->other->set_sess_empty();
            redirect($this->compid); 
        }

        $this->form_validation->set_rules('nama', 'Nama', 
            'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('email', 'Email', 
            'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('status', 'Status', 
            'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('p_add', 'Tambah', 
            'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('p_edit', 'Edit', 
            'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('p_del', 'Hapus', 
            'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('password', 'Password', 
            'trim|xss_clean|htmlspecialchars');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', validation_errors());
            redirect($this->compid.'edit/'.$id);
        } else {
            $query = $this->db->get_where('m_admin', ['email_address' => $unama, 'is_del' => 'n', 'admin_id!=' => $id])->num_rows();
            if ($query < 1) {
                $res = $this->admin->edit_proses($id,$rowcheck['password']);
                if ($res==true) {
                    $this->other->set_sess_success();
                    redirect($this->compid);
                }else{
                    $this->other->set_sess_err();
                    redirect($this->compid.'edit/'.$id);
                }
            } else {
                $this->other->set_sess_war('Proses dihentikan, <b>"'.$unama.'"</b> sudah digunakan.');
                redirect($this->compid.'edit/'.$id);
            }
        }
    }

    public function hapus($id){

        if ($id==1) {
            $this->other->set_sess_deep();
            redirect($this->compid); 
        }
        
        $check = $this->other->check_access_del();
        if ($check==true) {
            $res = $this->other->hapus_data('m_admin','admin_id',$id,'is_del','y');
        }
        
        redirect($this->compid);
    }

}

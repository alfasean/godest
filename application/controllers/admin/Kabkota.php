<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabkota extends CI_Controller {

    protected $compid;

    public function __construct() {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('admin/setting/kabkota_model', 'data');

        $this->compid = 'admin/kabkota/';
    }

    public function index() {
        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Data Kab/Kota';
        $data['title']      = 'Data Kab/Kota';
        $data['namalabel']  = 'Data Kab/Kota';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();
        $data['datas']      = $this->data->get_data();

        $data['uid']       = $this->session->userdata('u_id');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/data/kabkota/index', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function add() {
        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Data Kab/Kota';
        $data['title']      = 'Data Kab/Kota';
        $data['namalabel']  = 'Tambah Data';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();
        $data['d_provinsi'] = $this->db->get_where('reg_provinces', ['is_del' => 'n'])->result_array();

        $check = $this->other->check_access_add($data['auth']);
        if ($check==false) {
            redirect($this->compid);
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/data/kabkota/add', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function add_proses() {

        $this->form_validation->set_rules('idp', 'Provinsi', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean|htmlspecialchars');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', validation_errors());
            redirect($this->compid.'add');
        } else {
            $res = $this->data->add_proses();
            if ($res==true) {
                $this->other->set_sess_success();
                redirect($this->compid);
            }else{
                $this->other->set_sess_err();
                redirect($this->compid.'add');
            }
        }
    }

    public function edit($id = null) {
        if ($id==null) { redirect($this->compid); }
        $dataedit = $this->db->get_where('reg_regencies', ['id' => $id]);
        if ($dataedit->num_rows()==0) {
            $this->other->set_sess_empty();
            redirect($this->compid); 
        }

        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Data Kab/Kota';
        $data['title']      = 'Data Kab/Kota';
        $data['namalabel']  = 'Edit Data';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();
        $data['d_provinsi'] = $this->db->get_where('reg_provinces', ['is_del' => 'n'])->result_array();

        $check = $this->other->check_access_edit($data['auth']);
        if ($check==false) {
            redirect($this->compid);
        }

        $data['edit']       = $dataedit->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/data/kabkota/edit', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function edit_proses($id = null) {

        if ($id==null) { redirect($this->compid); }
        $dataedit = $this->db->get_where('reg_regencies', ['id' => $id]);
        $rowcheck = $dataedit->row_array();
        if ($dataedit->num_rows()==0) {
            $this->other->set_sess_empty();
            redirect($this->compid); 
        }

        $this->form_validation->set_rules('idp', 'Provinsi', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean|htmlspecialchars');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', validation_errors());
            redirect($this->compid.'edit/'.$id);
        } else {
            $res = $this->data->edit_proses($id);
            if ($res==true) {
                $this->other->set_sess_success();
                redirect($this->compid);
            }else{
                $this->other->set_sess_err();
                redirect($this->compid.'edit/'.$id);
            }
        }
    }

    public function hapus($id){
        
        $check = $this->other->check_access_del();
        if ($check==true) {
            $res = $this->other->hapus_data('reg_regencies','id',$id);
        }
        
        redirect($this->compid);
    }

}
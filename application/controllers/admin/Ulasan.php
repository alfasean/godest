<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ulasan extends CI_Controller {

    protected $compid;

    public function __construct() {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('admin/setting/ulasan_model', 'data');

        $this->compid = 'admin/ulasan/';
    }

    public function index() {
        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Ulasan';
        $data['title']      = 'Ulasan';
        $data['namalabel']  = 'Data Ulasan';

        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();
        $data['datas']      = $this->data->get_data();

        $data['uid']       = $this->session->userdata('u_id');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/data/ulasan/index', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function edit($id = null) {
        if ($id==null) { redirect($this->compid); }
        $dataedit = $this->db->get_where('m_ulasan', ['ulasan_id' => $id]);
        if ($dataedit->num_rows()==0) {
            $this->other->set_sess_empty();
            redirect($this->compid); 
        }

        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Ulasan';
        $data['title']      = 'Ulasan';
        $data['namalabel']  = 'Edit Data';
        $data['auth']       = auth_login();

        $data['compid']     = $this->compid;

        $check = $this->other->check_access_edit($data['auth']);
        if ($check==false) {
            redirect($this->compid);
        }

        $data['edit']       = $dataedit->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/data/ulasan/edit', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function edit_proses($id = null) {

        if ($id==null) { redirect($this->compid); }
        $dataedit = $this->db->get_where('m_ulasan', ['ulasan_id' => $id]);
        $rowcheck = $dataedit->row_array();
        if ($dataedit->num_rows()==0) {
            $this->other->set_sess_empty();
            redirect($this->compid); 
        }

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('ulasan', 'Ulasan', 'trim|required|xss_clean|htmlspecialchars');

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
        $dataedit = $this->db->get_where('m_ulasan', ['ulasan_id' => $id])->row_array();
        $check = $this->other->check_access_del();
        if ($check==true) {
            $res = $this->db->delete('m_ulasan', ['ulasan_id' => $id]);
            if($res==true){
                $wid = $this->db->query("SELECT * FROM m_wisata WHERE wisata_id='$dataedit[wisata_id]'")->row_array();
                $this->db->set(['ulasan' => $wid['ulasan']-1]);
                $this->db->where('wisata_id', $wid['wisata_id']);
                $resupdate = $this->db->update('m_wisata');

                if($resupdate==true){
                    $ratupdate = $this->db->query("SELECT AVG(rating) as rata_rata FROM m_ulasan WHERE wisata_id='$wid[wisata_id]' AND rating IS NOT NULL AND rating != '' AND rating != 0")->row_array();
                    $avg = $ratupdate['rata_rata'];
                    $avg = min($avg, 5);
                    $avg = number_format($avg, 1);

                    $this->db->set(['rating' => $avg]);
                    $this->db->where('wisata_id', $wid['wisata_id']);
                    $this->db->update('m_wisata');
                }
            }
        }
        
        redirect($this->compid);
    }

}

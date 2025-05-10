<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model {

    protected $compid;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
    }
	
    public function get_data() {
        $query = $this->db->query("SELECT * FROM m_admin WHERE is_del='n'")->result_array();
        return $query;
    }

    public function add_proses() {

        $tambah = $this->input->post('p_add');
        $edit = $this->input->post('p_edit');
        $hapus = $this->input->post('p_del');
        if ($tambah=='on') { $tambah = 'y'; }else{ $tambah = 'n'; }
        if ($edit=='on') { $edit = 'y'; }else{ $edit = 'n'; }
        if ($hapus=='on') { $hapus = 'y'; }else{ $hapus = 'n'; }

        $data = [
            'p_add'  			=> $tambah,
            'p_edit'  	        => $edit,
            'p_del'             => $hapus,
            'nama_lengkap'  	=> $this->input->post('nama'),
            'email_address'  	=> $this->input->post('email'),
            'password'  		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'is_status'  		=> $this->input->post('status'),
            'created_at'  		=> date('Y-m-d H:i:s')
        ];
        $res = $this->db->insert('m_admin', $data);
        return $res;
    }

    public function edit_proses($id,$passwordlama) {
    	$pass = $this->input->post('password');
        if ($pass=='') {
            $passnya = $passwordlama;
        }else{
            $passnya = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $tambah = $this->input->post('p_add');
        $edit = $this->input->post('p_edit');
        $hapus = $this->input->post('p_del');
        if ($tambah=='on') { $tambah = 'y'; }else{ $tambah = 'n'; }
        if ($edit=='on') { $edit = 'y'; }else{ $edit = 'n'; }
        if ($hapus=='on') { $hapus = 'y'; }else{ $hapus = 'n'; }

        $this->db->set([
            'p_add'             => $tambah,
            'p_edit'            => $edit,
            'p_del'             => $hapus,
            'nama_lengkap'  	=> $this->input->post('nama'),
            'email_address'  	=> $this->input->post('email'),
            'password'  		=> $passnya,
            'is_status'  		=> $this->input->post('status')
        ]);
        $this->db->where('admin_id', $id);
        $res = $this->db->update('m_admin');
        return $res;
    }

}
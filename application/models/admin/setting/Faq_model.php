<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq_model extends CI_Model {

    protected $compid;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
    }
	
    public function get_data() {
        $query = $this->db->query("SELECT * FROM m_faq ORDER BY faq_id DESC")->result_array();
        return $query;
    }

    public function add_proses() {

        $data = [
            'nama_faq'  	    => $this->input->post('nama'),
            'deskripsi'  	    => $this->input->post('deskripsi'),
            'created_at'  		=> date('Y-m-d H:i:s')
        ];
        $res = $this->db->insert('m_faq', $data);
        return $res;
    }

    public function edit_proses($id) {

		$this->db->set([
            'nama_faq'  	=> $this->input->post('nama'),
            'deskripsi'  	=> $this->input->post('deskripsi')
        ]);
        $this->db->where('faq_id', $id);
        $res = $this->db->update('m_faq');

        return $res;

	}

}
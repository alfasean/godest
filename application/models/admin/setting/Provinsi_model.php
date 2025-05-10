<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Provinsi_model extends CI_Model {

    protected $compid;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
    }
	
    public function get_data() {
        $query = $this->db->query("SELECT * FROM reg_provinces WHERE is_del='n' ORDER BY name ASC")->result_array();
        return $query;
    }

    public function add_proses() {
        $data = [
            'name'  	        => $this->input->post('nama')
        ];
        $res = $this->db->insert('reg_provinces', $data);
        return $res;
    }

    public function edit_proses($id) {

		$this->db->set([
            'name'  	    => $this->input->post('nama')
        ]);
        $this->db->where('id', $id);
        $res = $this->db->update('reg_provinces');

        return $res;

	}

}
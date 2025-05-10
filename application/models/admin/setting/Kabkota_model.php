<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabkota_model extends CI_Model {

    protected $compid;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
    }
	
    public function get_data() {
        $query = $this->db->query("SELECT a.*, COALESCE(b.name, 'Provinsi Tidak Ditemukan') AS name_prov FROM reg_regencies a LEFT JOIN reg_provinces b ON a.province_id=b.id WHERE a.is_del='n' ORDER BY b.name ASC")->result_array();
        return $query;
    }

    public function add_proses() {
        $data = [
            'province_id'      	=> $this->input->post('idp'),
            'name'  	        => $this->input->post('nama')
        ];
        $res = $this->db->insert('reg_regencies', $data);
        return $res;
    }

    public function edit_proses($id) {

		$this->db->set([
            'province_id'   => $this->input->post('idp'),
            'name'  	    => $this->input->post('nama')
        ]);
        $this->db->where('id', $id);
        $res = $this->db->update('reg_regencies');

        return $res;

	}

}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ulasan_model extends CI_Model {

    protected $compid;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
    }
	
    public function get_data() {
        $query = $this->db->query("SELECT a.*, b.nama_wisata FROM m_ulasan a 
        JOIN m_wisata b ON a.wisata_id=b.wisata_id ORDER BY ulasan_id DESC")->result_array();
        return $query;
    }

    public function edit_proses($id) {

		$this->db->set([
            'nama_lengkap'  => $this->input->post('nama'),
            'ulasan_text'  	=> $this->input->post('ulasan'),
            'rating'  	    => $this->input->post('rating')
        ]);
        $this->db->where('ulasan_id', $id);
        $res = $this->db->update('m_ulasan');

        $wid = $this->db->query("SELECT wisata_id FROM m_ulasan WHERE ulasan_id='$id'")->row_array();

        $ratupdate = $this->db->query("SELECT AVG(rating) as rata_rata FROM m_ulasan WHERE wisata_id='$wid[wisata_id]' AND rating IS NOT NULL AND rating != '' AND rating != 0")->row_array();

        $avg = $ratupdate['rata_rata'];
        $avg = min($avg, 5);
        $avg = number_format($avg, 1);

        $this->db->set(['rating' => $avg]);
        $this->db->where('wisata_id', $wid['wisata_id']);
        $this->db->update('m_wisata');

        return $res;

	}

}
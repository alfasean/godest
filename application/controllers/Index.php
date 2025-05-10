<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('index_model', 'index');
    }

    public function index() {

        $data['title']   = '';
        $data['ogurl']   = '';
        $data['sistem']  = pengaturan_sistem();
        
        $data['d_wisata']  = $this->index->get_wisata('more', 0, 8);
        $data['d_provinsi']  = $this->index->get_provinsi();

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/menu', $data);
        $this->load->view('frontend/index', $data);
        $this->load->view('frontend/templates/footer', $data);
    }

    public function get_kabkota($id = 0, $ids = 0) {
        $query = $this->db->get_where('reg_regencies', ['province_id' => $id, 'is_del' => 'n'])->result_array();

        echo '<option value="">-- Kabupaten / Kota --</option>';
        foreach ($query as $row) {
            echo '<option value="'.$row['id'].'" '.($row['id']==$ids ? 'selected' : '').'>'.ucwords(strtolower($row['name'])).'</option>';

        }
    }

    public function wisata_more($start,$limit) {
        $data['d_wisata_more'] = $this->index->get_wisata('more', $start, $limit);
        $this->load->view('frontend/more_wisata', $data);
    }

}

?>
<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('index_model', 'index');
    }

    public function index() {

        $data['v_slug'] = $this->input->get('slug');
        $data['v_provinsi'] = $this->input->get('provinsi');
        $data['v_kabkota'] = $this->input->get('kabkota');

        $data['title']   = '';
        $data['ogurl']   = 's?slug='.$data['v_slug'];
        $data['sistem']  = pengaturan_sistem();
        
        $data['d_wisata']  = $this->index->get_wisata('search');
        $data['d_provinsi']  = $this->index->get_provinsi();

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/menu', $data);
        $this->load->view('frontend/search', $data);
        $this->load->view('frontend/templates/footer', $data);
    }

    public function get_kabkota($id = 0, $ids = 0) {
        $query = $this->db->get_where('reg_regencies', ['province_id' => $id, 'is_del' => 'n'])->result_array();

        echo '<option value="">-- Kabupaten / Kota --</option>';
        foreach ($query as $row) {
            echo '<option value="'.$row['id'].'" '.($row['id']==$ids ? 'selected' : '').'>'.ucwords(strtolower($row['name'])).'</option>';

        }
    }
}

?>
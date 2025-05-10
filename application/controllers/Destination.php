<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Destination extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('index_model', 'index');
    }

    public function index($slug = null, $page = 1) {

        $checkdata = $this->db->get_where('m_wisata', ['slug' => $slug, 'is_status' => 'y'])->row_array();

        if(!$checkdata){
            redirect('index');
        }

        $this->db->where('wisata_id', $checkdata['wisata_id']);
        $this->db->update('m_wisata', ['views' => $checkdata['views']+1]);

        $today = date('Y-m-d');
        $ipnya = getUserIP();
        $data['dataip'] = $ipnya;
        $data['page'] = $page;

        $data['title']   = $checkdata['nama_wisata']." - ";
        $data['ogurl']   = $slug;
        $data['sistem']  = pengaturan_sistem();
        
        $data['d_detail']  = $this->index->get_wisata_id($checkdata['wisata_id']);
        $data['d_wisata']  = $this->index->get_wisata_id('more', 0, 8);

        $data['d_terkait']  = $this->index->get_wisata_terkait($checkdata['wisata_id']);

        $data['ulasans'] = $this->get_nested_ulasans($checkdata['wisata_id'], $page);

        $cek_rating = $this->db->get_where('m_ulasan', [
            'ip' => $ipnya,
            'date_at' => $today,
            'wisata_id' => $checkdata['wisata_id']
        ])->row_array();
        
        $existing_rating = $cek_rating['rating'] ?? '';
        $data['existing_rating'] = $existing_rating;
        $existing_nama = $cek_rating['nama_lengkap'] ?? '';
        $data['existing_nama'] = $existing_nama;

        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/menu', $data);
        $this->load->view('frontend/destination', $data);
        $this->load->view('frontend/templates/footer', $data);
    }

    private function get_nested_ulasans($post_id, $page = 1, $parent_id = NULL) {
        // Number of comments per page
        $limit = 3;
        $offset = ($page - 1) * $limit;
    
        // Get the comments with pagination
        $comments = $this->index->get_ulasans($post_id, $parent_id, $limit, $offset);
        
        return $comments;
    }

    // Menyimpan komentar
    public function save_ulasan() {

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('ulasan_text', 'Ulasan', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('rating', 'Rating', 'trim|xss_clean|htmlspecialchars');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', validation_errors());
        } else {
            $id = $this->input->post('wisata_id');
            $ccomments = $this->db->query("SELECT ulasan FROM m_wisata WHERE wisata_id='$id'")->row_array();
            $this->db->set(['ulasan' => $ccomments['ulasan']+1]);
            $this->db->where('wisata_id', $id);
            $this->db->update('m_wisata');

            $data = array(
                'wisata_id'     => $id,
                'ip'            => $this->input->post('ip'),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'ulasan_text'   => $this->input->post('ulasan_text'),
                'rating'        => $this->input->post('rating'),
                'date_at'       => date('Y-m-d'),
                'created_at'    => date('Y-m-d H:i:s')
            );

            $this->index->save_ulasan($data);

            $ratupdate = $this->db->query("SELECT AVG(rating) as rata_rata FROM m_ulasan WHERE wisata_id='$id' AND rating IS NOT NULL AND rating != '' AND rating != 0")->row_array();

            $avg = $ratupdate['rata_rata'];
            $avg = min($avg, 5);
            $avg = number_format($avg, 1);

            $this->db->set(['rating' => $avg]);
            $this->db->where('wisata_id', $id);
            $this->db->update('m_wisata');
        }
        redirect('d/'.$this->input->post('wisata_slug'));
    }

}

?>
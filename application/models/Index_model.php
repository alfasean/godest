<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_model extends CI_Model {

    protected $compid;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
    }
	
    public function get_wisata($type = '', $start = 0, $limit = 12) {
        $data = array();
        $slikes = " ";

        if($type=='more'){
            $limit = " LIMIT $start, $limit ";
        }else{
            $limit = " LIMIT 20 ";
            if($type=='search'){

                $v_slug = $this->input->get('slug');
                $v_provinsi = $this->input->get('provinsi');
                $v_kabkota = $this->input->get('kabkota');

                if($v_provinsi!='' && $v_kabkota!=''){
                    $slikes = " AND (a.nama_wisata LIKE '%$v_slug%' OR b.name LIKE '%$v_slug%' OR c.name LIKE '%$v_slug%') AND a.province_id='$v_provinsi' AND a.kabkota_id='$v_kabkota' ";
                }else if($v_provinsi!='' && $v_kabkota==''){
                    $slikes = " AND (a.nama_wisata LIKE '%$v_slug%' OR b.name LIKE '%$v_slug%' OR c.name LIKE '%$v_slug%') AND a.province_id='$v_provinsi' ";
                }else if($v_provinsi=='' && $v_kabkota!=''){
                    $slikes = " AND (a.nama_wisata LIKE '%$v_slug%' OR b.name LIKE '%$v_slug%' OR c.name LIKE '%$v_slug%') AND a.kabkota_id='$v_kabkota' ";
                }else{
                    $slikes = " AND (a.nama_wisata LIKE '%$v_slug%' OR b.name LIKE '%$v_slug%' OR c.name LIKE '%$v_slug%') ";
                }
            }
        }

        $query = $this->db->query("SELECT a.*, b.name as nama_provinsi, c.name as nama_kabkota 
        FROM m_wisata a 
        JOIN reg_provinces b ON a.province_id=b.id 
        JOIN reg_regencies c ON a.kabkota_id=c.id 
        WHERE a.is_status='y' $slikes ORDER BY a.views DESC $limit ")->result_array();

        foreach($query as $row){

            $fotoutama = $this->db->query("SELECT * FROM m_wisata_foto 
            WHERE wisata_id='$row[wisata_id]' AND utama='y'")->row_array();

            $data[] = array(
                'wisata_id'             => $row['wisata_id'],
                'nama_wisata'           => $row['nama_wisata'],
                'slug'                  => $row['slug'],
                'nama_provinsi'         => ucwords(strtolower($row['nama_provinsi'])),
                'nama_kabkota'          => ucwords(strtolower($row['nama_kabkota'])),
                'rating'                => (empty($row['rating']) || $row['rating'] == 0) ? 'Belum ada rating' : $row['rating'],
                'fotoutama'             => $fotoutama['foto']
            );
        }

        return $data;
    }

    public function get_wisata_terkait($id) {
        $data = array();
    
        // Ambil provinsi_id dan kabkota_id dari id wisata yang diklik
        $current = $this->db->get_where('m_wisata', ['wisata_id' => $id])->row_array();
        if (!$current) return $data;
    
        $province_id = $current['province_id'];
        $kabkota_id = $current['kabkota_id'];
    
        // Ambil wisata terkait berdasarkan kabkota_id atau province_id, selain wisata yang sama
        $this->db->select('a.*, b.name as nama_provinsi, c.name as nama_kabkota');
        $this->db->from('m_wisata a');
        $this->db->join('reg_provinces b', 'a.province_id = b.id');
        $this->db->join('reg_regencies c', 'a.kabkota_id = c.id');
        $this->db->where('a.is_status', 'y');
        $this->db->where('a.wisata_id !=', $id);
        $this->db->group_start();
        $this->db->where('a.kabkota_id', $kabkota_id);
        $this->db->or_where('a.province_id', $province_id);
        $this->db->group_end();
        $this->db->order_by('a.views', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get()->result_array();
    
        // Jika kurang dari 3, ambil data random tambahan
        $jumlah_terkait = count($query);
        if ($jumlah_terkait < 3) {
            $exclude_ids = array_column($query, 'wisata_id');
            $exclude_ids[] = $id;
    
            $this->db->select('a.*, b.name as nama_provinsi, c.name as nama_kabkota');
            $this->db->from('m_wisata a');
            $this->db->join('reg_provinces b', 'a.province_id = b.id');
            $this->db->join('reg_regencies c', 'a.kabkota_id = c.id');
            $this->db->where('a.is_status', 'y');
            if (!empty($exclude_ids)) {
                $this->db->where_not_in('a.wisata_id', $exclude_ids);
            }
            $this->db->order_by('RAND()');
            $this->db->limit(3 - $jumlah_terkait);
            $random = $this->db->get()->result_array();
    
            $query = array_merge($query, $random);
        }
    
        foreach ($query as $row) {
            $fotoutama = $this->db->query("SELECT * FROM m_wisata_foto 
                WHERE wisata_id='$row[wisata_id]' AND utama='y'")->row_array();
    
            $data[] = array(
                'wisata_id'     => $row['wisata_id'],
                'nama_wisata'   => $row['nama_wisata'],
                'slug'          => $row['slug'],
                'nama_provinsi' => ucwords(strtolower($row['nama_provinsi'])),
                'nama_kabkota'  => ucwords(strtolower($row['nama_kabkota'])),
                'rating'        => (empty($row['rating']) || $row['rating'] == 0) ? 'Belum ada rating' : $row['rating'],
                'fotoutama'     => $fotoutama['foto'] ?? null
            );
        }
    
        return $data;
    }    

    public function get_wisata_id($id) {
        $data = array();

        $query = $this->db->query("SELECT a.*, b.name as nama_provinsi, c.name as nama_kabkota 
        FROM m_wisata a 
        JOIN reg_provinces b ON a.province_id=b.id 
        JOIN reg_regencies c ON a.kabkota_id=c.id 
        WHERE a.is_status='y' AND a.wisata_id='$id' ")->result_array();

        foreach($query as $row){

            $galeri = $this->db->query("SELECT * FROM m_wisata_foto 
            WHERE wisata_id='$row[wisata_id]'")->result_array();

            $fotoutama = $this->db->query("SELECT * FROM m_wisata_foto 
            WHERE wisata_id='$row[wisata_id]' AND utama='y'")->row_array();

            if($row['harga_wisata_weekday']!='' && $row['harga_wisata_weekend']!=''){
                $harga_wisata = format_rupiah($row['harga_wisata_weekday']).' - '.format_rupiah($row['harga_wisata_weekend']);
            }else if($row['harga_wisata_weekday']!='' && $row['harga_wisata_weekend']==''){
                $harga_wisata = format_rupiah($row['harga_wisata_weekday']);
            }else if($row['harga_wisata_weekday']=='' && $row['harga_wisata_weekend']!=''){
                $harga_wisata = format_rupiah($row['harga_wisata_weekend']);
            }else{
                $harga_wisata = "";
            }

            $data = array(
                'wisata_id'             => $row['wisata_id'],
                'nama_wisata'           => $row['nama_wisata'],
                'slug'                  => $row['slug'],
                'nama_provinsi'         => ucwords(strtolower($row['nama_provinsi'])),
                'nama_kabkota'          => ucwords(strtolower($row['nama_kabkota'])),
                'situs_resmi'           => $row['situs_resmi'],
                'deskripsi_wisata'      => $row['deskripsi_wisata'],
                'alamat_wisata'         => $row['alamat_wisata'],
                'embed_map'             => $row['embed_map'],
                'nomor_resmi'           => $row['nomor_resmi'],
                'harga_wisata'          => $harga_wisata,
                'is_jadwal'             => $row['is_jadwal'],
                'senin'                 => str_replace("__", " - ", (empty($row['senin'])) ? 'Tutup / Libur' : $row['senin']),
                'selasa'                => str_replace("__", " - ", (empty($row['selasa'])) ? 'Tutup / Libur' : $row['selasa']),
                'rabu'                  => str_replace("__", " - ", (empty($row['rabu'])) ? 'Tutup / Libur' : $row['rabu']),
                'kamis'                 => str_replace("__", " - ", (empty($row['kamis'])) ? 'Tutup / Libur' : $row['kamis']),
                'jumat'                 => str_replace("__", " - ", (empty($row['jumat'])) ? 'Tutup / Libur' : $row['jumat']),
                'sabtu'                 => str_replace("__", " - ", (empty($row['sabtu'])) ? 'Tutup / Libur' : $row['sabtu']),
                'minggu'                => str_replace("__", " - ", (empty($row['minggu'])) ? 'Tutup / Libur' : $row['minggu']),
                'info_jadwal'           => $row['info_jadwal'],
                'views'                 => $row['views'],
                'ulasan'                => $row['ulasan'],
                'rating'                => (empty($row['rating']) || $row['rating'] == 0) ? '5' : $row['rating'],
                'fotoutama'             => $fotoutama['foto'],
                'galeri'                => $galeri
            );
        }

        return $data;
    }

    public function get_provinsi() {
        $query = $this->db->query("SELECT * FROM reg_provinces WHERE is_del='n' ORDER BY name ASC ")->result_array();
        return $query;
    }

    public function get_faqs() {
        $query = $this->db->query("SELECT * FROM m_faq")->result_array();
        return $query;
    }

    public function get_ulasans($post_id, $parent_id = NULL, $limit = 3, $offset = 0) {
        $this->db->select("a.*, COALESCE(nama_lengkap, 'Anonim') AS nama_lengkap");
        $this->db->from("m_ulasan a");
        $this->db->where("a.wisata_id", $post_id);
        $this->db->limit($limit, $offset);
        $this->db->order_by("a.created_at", "DESC");
    
        $query = $this->db->get();
        return $query->result_array();
    }
    

    public function save_ulasan($data) {
        return $this->db->insert('m_ulasan', $data);
    }

}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_model extends CI_Model {

    protected $compid;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
    }
	
    public function get_data() {
        $query = $this->db->query("SELECT * FROM m_wisata ORDER BY wisata_id DESC")->result_array();
        return $query;
    }

    public function add_proses($gambar) {

        $data = [
            'province_id'  	        => $this->input->post('provinsi'),
            'kabkota_id'  	        => $this->input->post('kabkota'),
            'nama_wisata'  	        => $this->input->post('nama'),
            'slug'  	            => url_replace_dash($this->input->post('nama')),
            'situs_resmi'  	        => $this->input->post('url_situs'),
            'deskripsi_wisata'  	=> $this->input->post('deskripsi'),
            'alamat_wisata'  		=> $this->input->post('alamat'),
            'embed_map'  		    => $this->input->post('embedmap'),
            'nomor_resmi'  		    => $this->input->post('no_telp'),
            'harga_wisata_weekday'  => $this->input->post('harga1'),
            'harga_wisata_weekend'  => $this->input->post('harga2'),
            'senin'  		        => $this->input->post('senin').'__'.$this->input->post('senin1'),
            'selasa'  		        => $this->input->post('selasa').'__'.$this->input->post('selasa1'),
            'rabu'  		        => $this->input->post('rabu').'__'.$this->input->post('rabu1'),
            'kamis'  		        => $this->input->post('kamis').'__'.$this->input->post('kamis1'),
            'jumat'  		        => $this->input->post('jumat').'__'.$this->input->post('jumat1'),
            'sabtu'  		        => $this->input->post('sabtu').'__'.$this->input->post('sabtu1'),
            'minggu'  		        => $this->input->post('minggu').'__'.$this->input->post('minggu1'),
            'info_jadwal'  		    => $this->input->post('info_jadwal'),
            'is_jadwal'  		    => $this->input->post('jadwal'),
            'is_status'  		    => $this->input->post('status'),
            'created_at'  		    => date('Y-m-d H:i:s')
        ];
        $res = $this->db->insert('m_wisata', $data);
        $insert_id = $this->db->insert_id();

        $first = true;
        foreach ($gambar as $row) {
            $dataimg = [
                'wisata_id' => $insert_id,
                'foto'      => $row,
                'utama'     => $first ? 'y' : 'n'
            ];
            $this->db->insert('m_wisata_foto', $dataimg);
            $first = false; // Setelah pertama, ubah menjadi false
        }

        return $res;
    }

    public function edit_proses($id) {

		$this->db->set([
            'province_id'  	        => $this->input->post('provinsi'),
            'kabkota_id'  	        => $this->input->post('kabkota'),
            'nama_wisata'  	        => $this->input->post('nama'),
            'slug'  	            => url_replace_dash($this->input->post('nama'),$id),
            'situs_resmi'  	        => $this->input->post('url_situs'),
            'deskripsi_wisata'  	=> $this->input->post('deskripsi'),
            'alamat_wisata'  		=> $this->input->post('alamat'),
            'embed_map'  		    => $this->input->post('embedmap'),
            'nomor_resmi'  		    => $this->input->post('no_telp'),
            'harga_wisata_weekday'  => $this->input->post('harga1'),
            'harga_wisata_weekend'  => $this->input->post('harga2'),
            'senin'  		        => $this->input->post('senin').'__'.$this->input->post('senin1'),
            'selasa'  		        => $this->input->post('selasa').'__'.$this->input->post('selasa1'),
            'rabu'  		        => $this->input->post('rabu').'__'.$this->input->post('rabu1'),
            'kamis'  		        => $this->input->post('kamis').'__'.$this->input->post('kamis1'),
            'jumat'  		        => $this->input->post('jumat').'__'.$this->input->post('jumat1'),
            'sabtu'  		        => $this->input->post('sabtu').'__'.$this->input->post('sabtu1'),
            'minggu'  		        => $this->input->post('minggu').'__'.$this->input->post('minggu1'),
            'info_jadwal'  		    => $this->input->post('info_jadwal'),
            'is_jadwal'  		    => $this->input->post('jadwal'),
            'is_status'  		    => $this->input->post('status')
        ]);
        $this->db->where('wisata_id', $id);
        $res = $this->db->update('m_wisata');

        return $res;

	}

    public function add_gambar_id($gambar) {

        foreach ($gambar as $row) {
            $dataimg = [
                'wisata_id' => $this->input->post('wisata_id'),
                'foto'      => $row,
                'utama'     => 'n'
            ];
            $res = $this->db->insert('m_wisata_foto', $dataimg);
        }

        return $res;
    }

}
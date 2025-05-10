<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Another_model extends CI_Model {

    protected $compid;
    public function __construct() {
        parent::__construct();
        $this->compid = '';
    }

    public function proses_login($username) {
        $this->db->where("email_address='$username' AND is_del='n'");
        return $this->db->get('m_admin')->row_array();
    }

    public function check_access_add($data = array()) {
      if($data['p_add']=='y'){
        return true;
      }else{
        $this->session->set_flashdata('msg_color', 'warning');
        $this->session->set_flashdata('message', 'Tidak ada akses tambah data.');
        return false;
      }
    }

    public function check_access_edit($data = array()) {
      if($data['p_edit']=='y'){
        return true;
      }else{
        $this->session->set_flashdata('msg_color', 'warning');
        $this->session->set_flashdata('message', 'Tidak ada akses edit data.');
        return false;
      }
    }

    public function check_access_del() {
      $data = auth_login();
      if($data['p_del']=='y'){
        return true;
      }else{
        $this->session->set_flashdata('msg_color', 'warning');
        $this->session->set_flashdata('message', 'Tidak ada akses hapus data.');
        return false;
      }
    }

    public function hapus_data($tabel,$field,$id,$setfield='is_del',$del='n') {
      if($del=='n'){
        if($setfield==''){
          $setfield = 'is_del';
        }
        $this->db->set([
            $setfield     => 'y'
        ]);
        $this->db->where($field, $id);
        $res = $this->db->update($tabel);

        if ($res==true) {
          $this->session->set_flashdata('msg_color', 'success');
          $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        }else{
          $this->session->set_flashdata('msg_color', 'danger');
          $this->session->set_flashdata('message', 'Proses gagal, silahkan coba lagi.');
        }
      }else{
        $res = $this->db->delete($tabel, [$field => $id]);
        if ($res==true) {
          $this->session->set_flashdata('msg_color', 'success');
          $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        }else{
          $this->session->set_flashdata('msg_color', 'danger');
          $this->session->set_flashdata('message', 'Proses gagal, silahkan coba lagi.');
        }
      }
      return $res;
    }

    public function set_sess_success($txt = 'default', $color = 'success') {

      if ($txt=='default') {
        $txt = 'Data berhasil disimpan.';
      }else{
        $txt = $txt;
      }

      $this->session->set_flashdata('msg_color', $color);
      $this->session->set_flashdata('message', $txt);
      return true;
    }

    public function set_sess_war($txt = 'default') {

      if ($txt=='default') {
        $txt = 'Proses dihentikan, data sudah digunakan.';
      }else{
        $txt = $txt;
      }

      $this->session->set_flashdata('msg_color', 'warning');
      $this->session->set_flashdata('message', $txt);
      return true;
    }

    public function set_sess_err($txt = 'default') {

      if ($txt=='default') {
        $txt = 'Proses gagal, silahkan coba lagi.';
      }else{
        $txt = $txt;
      }

      $this->session->set_flashdata('msg_color', 'danger');
      $this->session->set_flashdata('message', $txt);
      return true;
    }

    public function set_sess_empty($txt = 'default') {

      if ($txt=='default') {
        $txt = 'Data tidak ditemukan.';
      }else{
        $txt = $txt;
      }

      $this->session->set_flashdata('msg_color', 'danger');
      $this->session->set_flashdata('message', $txt);
      return true;
    }

    public function set_sess_deep($txt = 'default') {

      if ($txt=='default') {
        $txt = 'Perlu akses khusus untuk merubah data ini.';
      }else{
        $txt = $txt;
      }

      $this->session->set_flashdata('msg_color', 'danger');
      $this->session->set_flashdata('message', $txt);
      return true;
    }

    public function set_sess_g2($txt = 'default') {

      if ($txt=='default') {
        $txt = 'Proses dihentikan, data sudah digunakan.';
      }else{
        $txt = $txt;
      }

      $this->session->set_flashdata('msg_color2', 'warning');
      $this->session->set_flashdata('message2', $txt);
      return true;
    }

    public function upload_gambar($nama_name='gambar',$old='new',$dir='components',$namafile = "file_"){

        if ($nama_name=='' || $nama_name==null) { $nama_name = 'gambar'; }

        $path = 'assets/uploaded/'.$dir.'/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2000';
        $config['max_width'] = '3024';
        $config['max_height'] = '3024';
        $config['remove_space'] = TRUE;
        $nmfile = $namafile.time();
        $config['file_name'] = $nmfile;
      
        $this->load->library('upload', $config); 
        $this->upload->initialize($config);
        if($this->upload->do_upload($nama_name)){
          if ($old!='new') {
            $expl = explode("/", $old);
            if (isset($expl[3])) {
                if ($expl[3]!='default-logo.png') {
                    if ($expl[3]!='default-cover.png') {
                        if ($expl[3]!='') {
                            if (file_exists(FCPATH.$old)){ unlink(FCPATH.$old); }
                        }
                        if (file_exists(FCPATH .'assets/uploaded/thumbnails/'.$expl[3])){
                            unlink(FCPATH .'assets/uploaded/thumbnails/'.$expl[3]);
                        }
                    }
                }
            }
          }

          $result = $this->upload->data();
          $this->resize_image($result['full_path']);
          $return = array('result' => 'success', 'path' => $path, 'file' => $result, 'error' => '');
          return $return;
        }else{
          // Jika gagal :
          $return = array('result' => 'failed', 'error' => $this->upload->display_errors());
          return $return;
        }
    }

    public function upload_digital($nama_name='digital',$old='new',$dir='components',$namafile = "file_"){

        if ($nama_name=='' || $nama_name==null) { $nama_name = 'digital'; }

        $path = 'assets/uploaded/'.$dir.'/';
        $config['upload_path'] = $path;

        if ($nama_name=='npwp') {
            $config['allowed_types'] = 'pdf|doc|docx|word|jpg|jpeg|png';
        }else if ($nama_name=='imgpdf') {
            $config['allowed_types'] = 'pdf||jpg|jpeg|png';
        }else{
            $config['allowed_types'] = 'pdf|xls|xlsx|doc|docx|word|ppt|pptx|zip|rar|csv|jpg|jpeg|png';
        }
        
        $config['max_size']  = '8000';
        $config['remove_space'] = TRUE;
        $nmfile = $namafile.time();
        $config['file_name'] = $nmfile;
      
        $this->load->library('upload', $config); 
        $this->upload->initialize($config);
        if($this->upload->do_upload($nama_name)){
          if ($old!='new') {
            $expl = explode("/", $old);
            if (isset($expl[3])) {
                if ($expl[3]!='default-logo.png') {
                    if ($expl[3]!='default-cover.png') {
                        if ($expl[3]!='') {
                            if (file_exists(FCPATH.$old)){ unlink(FCPATH.$old); }
                        }
                        if (file_exists(FCPATH .'assets/uploaded/thumbnails/'.$expl[3])){
                            unlink(FCPATH .'assets/uploaded/thumbnails/'.$expl[3]);
                        }
                    }
                }
            }
          }
          $return = array('result' => 'success', 'path' => $path, 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          $return = array('result' => 'failed', 'error' => $this->upload->display_errors());
          return $return;
        }
    }

    public function resize_image($source) {
      $this->load->library('image_lib');
  
      // Ambil ukuran asli gambar
      $image_info = getimagesize($source);
      $original_width = $image_info[0];
      $original_height = $image_info[1];
  
      // Jika width = 300, jangan lakukan kompresi
      if ($original_width <= 300) {
          // echo json_encode(['success' => 'Gambar sudah berukuran 120px, tidak dikompres.']);
          return;
      }
  
      // Periksa apakah lebar gambar lebih dari 2200px
      if ($original_width > 2200) {
          // Kurangi ukuran menjadi 75% jika width > 2200
          $new_width = round($original_width * 0.75);
          $new_height = round($original_height * 0.75);
      } else {
          // Jika tidak, biarkan ukuran tetap sama
          $new_width = $original_width;
          $new_height = $original_height;
      }
  
      // Kompres gambar utama
      $config['image_library']  = 'gd2';
      $config['source_image']   = $source;
      $config['quality']        = '75%'; // Kompres kualitas
      $config['maintain_ratio'] = TRUE;
      $config['width']          = $new_width;
      $config['height']         = $new_height;
  
      $this->image_lib->initialize($config);
  
      if (!$this->image_lib->resize()) {
          // echo json_encode(['error' => $this->image_lib->display_errors()]);
          return;
      }
      $this->image_lib->clear(); // Reset konfigurasi
  
      // ---------------------------
      // BUAT & SIMPAN THUMBNAIL
      // ---------------------------
  
      $thumbnail_path = 'assets/uploaded/thumbnails/'; // Folder tujuan thumbnail
      if (!is_dir($thumbnail_path)) {
          mkdir($thumbnail_path, 0777, true); // Buat folder jika belum ada
      }
  
      $thumb_name = $thumbnail_path . basename($source); // Nama file thumbnail
  
      // Set width thumbnail = 100px, height otomatis
      $thumb_width = 300; // Lebar fixed
  
      // Konfigurasi thumbnail
      $config_thumb['image_library']  = 'gd2';
      $config_thumb['source_image']   = $source;
      $config_thumb['new_image']      = $thumb_name; // Simpan di folder thumbnail
      $config_thumb['quality']        = '100%'; // Kualitas thumbnail lebih rendah
      $config_thumb['maintain_ratio'] = TRUE; // Biarkan height otomatis
      $config_thumb['width']          = $thumb_width; // Hanya atur width, height otomatis
  
      $this->image_lib->initialize($config_thumb);
  
      if (!$this->image_lib->resize()) {
          // echo json_encode(['error' => $this->image_lib->display_errors()]);
      }
  
      $this->image_lib->clear(); // Reset konfigurasi
  
      // echo json_encode(['success' => 'Gambar berhasil dikompres dan thumbnail dibuat!', 'thumbnail' => $thumb_name]);
    }

}

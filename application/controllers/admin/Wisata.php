<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller {

    protected $compid;

    public function __construct() {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('another_model', 'other');
        $this->load->model('admin/setting/wisata_model', 'data');

        $this->compid = 'admin/wisata/';
    }

    public function index() {
        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Data Wisata';
        $data['title']      = 'Data Wisata';
        $data['namalabel']  = 'Data Wisata';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();
        $data['datas']      = $this->data->get_data();

        $data['uid']       = $this->session->userdata('u_id');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/data/wisata/index', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function get_kabkota($id = 0, $ids = 0) {
        $query = $this->db->get_where('reg_regencies', ['province_id' => $id, 'is_del' => 'n'])->result_array();

        echo '<option value="">-- Choose --</option>';
        foreach ($query as $row) {
            echo '<option value="'.$row['id'].'" '.($row['id']==$ids ? 'selected' : '').'>'.$row['name'].'</option>';

        }
    }

    public function add() {
        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Data Wisata';
        $data['title']      = 'Data Wisata';
        $data['namalabel']  = 'Tambah Data';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();

        $check = $this->other->check_access_add($data['auth']);
        if ($check==false) {
            redirect($this->compid);
        }

        $data['provinsi'] = $this->db->get_where('reg_provinces', ['is_del' => 'n'])->result_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/data/wisata/add', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function add_proses() {

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('kabkota', 'Kab/Kota', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('nama', 'Nama Wisata', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('url_situs', 'Url Situs Resmi', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon Resmi', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('harga1', 'Harga Tiket Weekday', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('harga2', 'Harga Tiket Weekend', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('embedmap', 'Embed Map', 'trim');
        $this->form_validation->set_rules('jadwal', 'Jadwal Operasional', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('senin', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('senin1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('selasa', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('selasa1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('rabu', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('rabu1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('kamis', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('kamis1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('jumat', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('jumat1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('sabtu', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('sabtu1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('minggu', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('minggu1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('info_jadwal', 'Informasi Jadwal Operasional', 'trim|xss_clean|htmlspecialchars');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', validation_errors());
            redirect($this->compid.'add');
        } else {

            $jumlahFile = count($_FILES['gambar']['name']);
            $uploaded_files = [];
            $uploaded_err = [];

            for ($i = 0; $i < $jumlahFile; $i++) {
                if ($_FILES['gambar']['error'][$i] === 0) {
                    // Rename agar bisa diproses satu-satu
                    $_FILES['temp']['name']     = $_FILES['gambar']['name'][$i];
                    $_FILES['temp']['type']     = $_FILES['gambar']['type'][$i];
                    $_FILES['temp']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                    $_FILES['temp']['error']    = $_FILES['gambar']['error'][$i];
                    $_FILES['temp']['size']     = $_FILES['gambar']['size'][$i];
        
                    $upload = $this->other->upload_gambar('temp','new','components','img_');
                    if ($upload['result'] == 'success') {
                        $uploaded_files[] = $upload['path'].$upload['file']['file_name'];
                    } else {
                        $uploaded_err[] = "Upload gagal untuk file ke-" . ($i + 1) . ": " . $upload['error'];
                    }
                }
            }
            $res = $this->data->add_proses($uploaded_files);
            if ($res==true) {
                $this->other->set_sess_success();
                if($uploaded_err){
                    $this->other->set_sess_g2('<b>Tapi ada '.count($uploaded_err).' foto gagal disimpan:</b><br><br>'.implode('<br>', $uploaded_err));
                }
                redirect($this->compid);
            }else{
                $this->other->set_sess_err();
                redirect($this->compid.'add');
            }
        }
    }

    public function edit($id = null) {
        if ($id==null) { redirect($this->compid); }
        $dataedit = $this->db->get_where('m_wisata', ['wisata_id' => $id]);
        if ($dataedit->num_rows()==0) {
            $this->other->set_sess_empty();
            redirect($this->compid); 
        }

        $data['htmlpagejs'] = 'none';
        $data['nmenu']      = 'Data Wisata';
        $data['title']      = 'Data Wisata';
        $data['namalabel']  = 'Edit Data';
        $data['compid']     = $this->compid;

        $data['auth']       = auth_login();

        $check = $this->other->check_access_edit($data['auth']);
        if ($check==false) {
            redirect($this->compid);
        }

        $data['provinsi']   = $this->db->get_where('reg_provinces', ['is_del' => 'n'])->result_array();
        $data['edit']       = $dataedit->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidemenu', $data);
        $this->load->view('admin/templates/sidenav', $data);
        $this->load->view('admin/module/data/wisata/edit', $data);
        $this->load->view('admin/templates/footer', $data);
        $this->load->view('admin/templates/fscript-html-end', $data);
    }

    public function edit_proses($id = null) {

        if ($id==null) { redirect($this->compid); }
        $dataedit = $this->db->get_where('m_wisata', ['wisata_id' => $id]);
        $rowcheck = $dataedit->row_array();
        if ($dataedit->num_rows()==0) {
            $this->other->set_sess_empty();
            redirect($this->compid); 
        }

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('kabkota', 'Kab/Kota', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('nama', 'Nama Wisata', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('url_situs', 'Url Situs Resmi', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon Resmi', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('harga1', 'Harga Tiket Weekday', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('harga2', 'Harga Tiket Weekend', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('embedmap', 'Embed Map', 'trim');
        $this->form_validation->set_rules('jadwal', 'Jadwal Operasional', 'trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('senin', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('senin1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('selasa', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('selasa1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('rabu', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('rabu1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('kamis', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('kamis1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('jumat', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('jumat1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('sabtu', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('sabtu1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('minggu', 'Jam Buka', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('minggu1', 'Jam Tutup', 'trim|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('info_jadwal', 'Informasi Jadwal Operasional', 'trim|xss_clean|htmlspecialchars');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_color', 'danger');
            $this->session->set_flashdata('message', validation_errors());
            redirect($this->compid.'edit/'.$id);
        } else {
            $res = $this->data->edit_proses($id);
            if ($res==true) {
                $this->other->set_sess_success();
                redirect($this->compid);
            }else{
                $this->other->set_sess_err();
                redirect($this->compid.'edit/'.$id);
            }
        }
    }

    public function hapus($id){
        $dataimg = $this->db->get_where('m_wisata_foto', ['wisata_id' => $id])->result_array();
        $check = $this->other->check_access_del();
        if ($check==true) {
            $res = $this->db->delete('m_wisata', ['wisata_id' => $id]);
            if ($res==true) {
                foreach($dataimg as $dimg){
                    $this->db->delete('m_wisata_foto', ['foto_id' => $dimg['foto_id']]);
                    $foto = $dimg['foto'];
                    $foto_thum = str_replace('components', 'thumbnails', $foto);
                    // Hapus file utama
                    if (file_exists(FCPATH . $foto)) {
                        unlink(FCPATH . $foto);
                    }
                    // Hapus versi thum-nya juga
                    if (file_exists(FCPATH . $foto_thum)) {
                        unlink(FCPATH . $foto_thum);
                    }

                }
            }
        }
        
        redirect($this->compid);
    }

    public function update_utama_gambar() {
        $wisata_id = $this->input->post('wisata_id');
        $foto_id = $this->input->post('foto_id');

        // Reset semua menjadi 'n'
        $this->db->where('wisata_id', $wisata_id);
        $this->db->update('m_wisata_foto', ['utama' => 'n']);

        // Set satu yang dipilih menjadi 'y'
        $this->db->where('wisata_id', $wisata_id);
        $this->db->where('foto_id', $foto_id);
        $this->db->update('m_wisata_foto', ['utama' => 'y']);

        echo json_encode(['success' => true]);
    }

    public function hapus_gambar_id($id){
        $dataimg = $this->db->get_where('m_wisata_foto', ['foto_id' => $id])->row_array();
        $datarow = $this->db->get_where('m_wisata_foto', ['wisata_id' => $dataimg['wisata_id']])->num_rows();

        if($datarow==1){
            $this->other->set_sess_err('Minimal 1 gambar untuk setiap wisata!');
        }else{
            $check = $this->other->check_access_del();
            if ($check==true) {
                $this->db->delete('m_wisata_foto', ['foto_id' => $dataimg['foto_id']]);
                $foto = $dataimg['foto'];
                $foto_thum = str_replace('components', 'thumbnails', $foto);
                // Hapus file utama
                if (file_exists(FCPATH . $foto)) {
                    unlink(FCPATH . $foto);
                }
                // Hapus versi thum-nya juga
                if (file_exists(FCPATH . $foto_thum)) {
                    unlink(FCPATH . $foto_thum);
                }

                $cek_utama = $this->db->get_where('m_wisata_foto', ['wisata_id' => $dataimg['wisata_id'], 'utama' => 'y'])->num_rows();

                if ($cek_utama == 0) {
                    // Ambil satu data foto untuk dijadikan utama
                    $foto = $this->db->get_where('m_wisata_foto', ['wisata_id' => $dataimg['wisata_id']])->row_array();
                    
                    if ($foto) {
                        $this->db->where('foto_id', $foto['foto_id']);
                        $this->db->update('m_wisata_foto', ['utama' => 'y']);
                    }
                }

            }
        }
        redirect($this->compid);
    }

    public function add_gambar_id(){
        
        $data['auth'] = auth_login();
        $check = $this->other->check_access_add($data['auth']);
        if ($check==true) {
            $jumlahFile = count($_FILES['gambar']['name']);
            $uploaded_files = [];
            $uploaded_err = [];

            for ($i = 0; $i < $jumlahFile; $i++) {
                if ($_FILES['gambar']['error'][$i] === 0) {
                    // Rename agar bisa diproses satu-satu
                    $_FILES['temp']['name']     = $_FILES['gambar']['name'][$i];
                    $_FILES['temp']['type']     = $_FILES['gambar']['type'][$i];
                    $_FILES['temp']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                    $_FILES['temp']['error']    = $_FILES['gambar']['error'][$i];
                    $_FILES['temp']['size']     = $_FILES['gambar']['size'][$i];
        
                    $upload = $this->other->upload_gambar('temp','new','components','img_');
                    if ($upload['result'] == 'success') {
                        $uploaded_files[] = $upload['path'].$upload['file']['file_name'];
                    } else {
                        $uploaded_err[] = "Upload gagal untuk file ke-" . ($i + 1) . ": " . $upload['error'];
                    }
                }
            }
            $res = $this->data->add_gambar_id($uploaded_files);
            if ($res==true) {
                $this->other->set_sess_success('Gambar berhasil disimpan.');
                if($uploaded_err){
                    $this->other->set_sess_g2('<b>Tapi ada '.count($uploaded_err).' foto gagal disimpan:</b><br><br>'.implode('<br>', $uploaded_err));
                }
                redirect($this->compid);
            }else{
                $this->other->set_sess_err();
                redirect($this->compid);
            }
        }else{
            redirect($this->compid);
        }
    }

}

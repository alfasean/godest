<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function edit_proses() {
		$datalogin = auth_login();
        $pass = $this->input->post('password');
        if ($pass=='') {
            $passnya = $datalogin['password'];
        }else{
            $passnya = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

		$this->db->set([
            'nama_lengkap'          => $this->input->post('nama'),
            'email_address'         => $this->input->post('email'),
            'password'          	=> $passnya
        ]);
        $this->db->where('admin_id', $datalogin['admin_id']);
        $res = $this->db->update('m_admin');
        return $res;

	}
}
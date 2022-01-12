<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	public function aksiDaftar()
	{
		$data = [
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
				'alamat' => $this->input->post('alamat', true),
				'kelamin' => $this->input->post('jk', true),
				'telepon' => $this->input->post('telepon', true),
				'no_ktp' => $this->input->post('ktp', true),
				'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
				'role_id' => $this
		];

		$this->db->insert('customer', $data);
	}

	public function loginAuth($username){
			

			$this->db->select('*');
			$this->db->from('pegawai as c');
			$this->db->join('role r','r.id_role=c.role_id');
			$this->db->join('jabatan j','j.id_jabatan=c.id_jabatan','left');
			$this->db->join('jurusan ju','ju.id_jurusan=c.id_jurusan','left');
			$this->db->join('divisi d','d.id_divisi=c.id_divisi','left');
			$this->db->where('c.username=',$username);
		return	$this->db->get()->row_array();
			
	}



}

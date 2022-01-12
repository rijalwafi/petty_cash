<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {
	public function getPegawaiById($id)
	{
		$this->db->select('*');
		$this->db->from('pegawai as c');
		$this->db->join('role r','r.id_role=c.role_id');
		$this->db->join('jabatan j','j.id_jabatan=c.id_jabatan','left');
		$this->db->join('jurusan ju','ju.id_jurusan=c.id_jurusan','left');
		$this->db->join('divisi d','d.id_divisi=c.id_divisi','left');
		$this->db->where('c.id_pegawai=',$id);
		$this->db->order_by('id_pegawai','desc');
		
		return $this->db->get()->row_array();
	}
	public function getAllPegawai($limit,$start,$keyword){
		if($keyword){
			
		$this->db->like('nama', $keyword);
		$this->db->or_like('nip',$keyword);
		$this->db->or_like('nama_jabatan',$keyword);
		$this->db->or_like('nama_divisi',$keyword);
		}
		$this->db->select('*');
		$this->db->from('pegawai as c');
		$this->db->join('role r','r.id_role=c.role_id');
		$this->db->join('jabatan j','j.id_jabatan=c.id_jabatan','left');
		$this->db->join('jurusan ju','ju.id_jurusan=c.id_jurusan','left');
		$this->db->join('divisi d','d.id_divisi=c.id_divisi','left');
	
		$this->db->order_by('id_pegawai','desc');
		$this->db->limit($limit,$start);
		
		return $this->db->get()->result_array();
	}

	public function aksiTambahPegawai($data_pegawai)
	{
	

		$this->db->insert('pegawai', $data_pegawai);
	}

	public function aksiEdit()
	{
		$id = $this->input->post('id', true);
		$password=$this->input->post('password');
		if($password==''){

	
		$data = [
			'nip'=>$this->input->post('nip'),
				
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
				'alamat' => $this->input->post('alamat', true),
				'kelamin' => $this->input->post('jk', true),
				'telepon' => $this->input->post('telepon', true),
				'no_ktp' => $this->input->post('ktp', true),

				
				'role_id'=>$this->input->post('id_role'),
				'id_jabatan'=>$this->input->post('id_jabatan'),
				'id_divisi'=>$this->input->post('id_divisi'),
				'pendidikan'=>$this->input->post('pendidikan'),
				'id_jurusan'=>$this->input->post('id_jurusan'),
		];

		$this->db->where('id_pegawai', $id);
		$this->db->update('pegawai', $data);
	}else{
		$data = [
			'nip'=>$this->input->post('nip'),
				
			'nama' => $this->input->post('nama', true),
			'username' => $this->input->post('username', true),
			'alamat' => $this->input->post('alamat', true),
			'kelamin' => $this->input->post('jk', true),
			'telepon' => $this->input->post('telepon', true),
			'no_ktp' => $this->input->post('ktp', true),

			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'role_id'=>$this->input->post('id_role'),
			'id_jabatan'=>$this->input->post('id_jabatan'),
			'id_divisi'=>$this->input->post('id_divisi'),
			'pendidikan'=>$this->input->post('pendidikan'),
			'id_jurusan'=>$this->input->post('id_jurusan'),
	];

	$this->db->where('id_pegawai', $id);
	$this->db->update('pegawai', $data);
	}
	}

	public function getPegawai($limit, $start, $keyword)
	{
		if($keyword)
		{
			$this->db->like('nama', $keyword);
			$this->db->or_like('username', $keyword);
			$this->db->or_like('telepon', $keyword);
			$this->db->or_like('no_ktp', $keyword);
		}
		$this->db->select('*');
		$this->db->from('pegawai as c');
		$this->db->join('role r','r.id_role=c.role_id');
		$this->db->join('jabatan j','j.id_jabatan=c.id_jabatan','left');
		$this->db->join('jurusan ju','ju.id_jurusan=c.id_jurusan','left');
		$this->db->join('divisi d','d.id_divisi=c.id_divisi','left');
		$this->db->order_by('id_pegawai','desc');
		$this->db->limit($limit,$start);
		return $this->db->get()->result_array();
	}

	public function countCustomer()
	{
		return $this->db->get('pegawai')->num_rows();
	}

	public function getMaxId(){
		$query=$this->db->query('SELECT MAX(id_pegawai) as last_id from pegawai');
		return $query->row()->last_id;
	}

}

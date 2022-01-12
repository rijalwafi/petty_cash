<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Dashboard_model','dashboard');
		$this->load->model('Pegawai_model','pegawai');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		$data['customers'] = $this->db->get('pegawai')->num_rows();
		
		
		
		$this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('themeplates_admin/footer');
	}




}

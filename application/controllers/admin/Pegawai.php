<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model','pegawai');
		$this->load->model('Divisi_model','divisi');
		$this->load->model('Jabatan_model','jabatan');
		$this->load->model('Jurusan_model','jurusan');
		$this->load->model('Role_model','role');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = 'pegawai';
		$data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		$url= (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'].
		str_replace(basename($_SERVER['SCRIPT_NAME']),"",
		$_SERVER['SCRIPT_NAME']);

		// Jika tombol cari ditekan
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword');
		} else if(!$this->input->post('submit')) {
			$data['keyword'] = $this->session->unset_userdata('keyword');
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('nama', $data['keyword']);
		$this->db->or_like('nip',$data['keyword']);
		$this->db->or_like('nama_jabatan',$data['keyword']);
		$this->db->or_like('nama_divisi',$data['keyword']);
		$this->db->from('pegawai as c');
		$this->db->join('role r','r.id_role=c.role_id');
		$this->db->join('jabatan j','j.id_jabatan=c.id_jabatan','left');
		$this->db->join('jurusan ju','ju.id_jurusan=c.id_jurusan','left');
		$this->db->join('divisi d','d.id_divisi=c.id_divisi','left');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = $url.'admin/pegawai/index';
		// $config['total_rows'] = $this->pegawai->countCustomer();
		// var_dump($config['total_rows']); die;
		$config['per_page'] = 5;
		$config['num_links'] = 2;

		// Konfigurasi Pagination CUSTOMER
		// var_dump($config['total_rows']); die;

		// Style
		$config['full_tag_open'] = '<nav class="d-inline-block"><ul class="pagination mb-0">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fas fa-chevron-right"></i>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fas fa-chevron-left"></i>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		// $data['uri']=$this->uri->segment(2);
		// var_dump($data['uri']);
		

		$data['start'] = $this->uri->segment(4);
		$data['data_pegawai'] = $this->pegawai->getPegawai($config['per_page'], $data['start'], $data['keyword']);
		$this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/pegawai/index', $data);
		$this->load->view('themeplates_admin/footer');
	}

	public function tambahPegawai()
	{
		$data['judul'] = 'Tambah Pegawai';
		$data['divisi']=$this->divisi->getAllDivisi();
		$data['jabatan']=$this->jabatan->getAllJabatan();
		$data['jurusan']=$this->jurusan->getAllJurusan();
		$data['role']=$this->role->getAllRole();
		$data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', 
		['required' => 'Nama Harus Di Isi!']
		);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[20]|is_unique[pegawai.username]', 
		['required' => 'Username Harus Di Isi!',
		'min_length' => 'Minimal Panjang 6 Huruf',
		'max_length[20]' => 'Maxsimal Panjang %s  Huruf',
		'is_unique'=>'Data Sudah Ada']
		);
		$this->form_validation->set_rules('id_role', 'id_role', 'trim|required',[
			'required' => 'Nama Role Harus Di Isi!'
		]);
		
		$this->form_validation->set_rules('password', 'Password', 'required|trim', 
		['required' => 'Password Harus Di Isi!']
		);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', 
		['required' => 'Alamat Harus Di Isi!']
		);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', 
		['required' => 'Jenis Harus Di Pilih!']
		);
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim', 
		['required' => 'Telepon Harus Di Isi!']
		);
		$this->form_validation->set_rules('ktp', 'No.KTP', 'required|trim', 
		['required' => 'No.KTP Harus Di Isi!']
		);
		$kode='EMP';
		$date=date(' ymhi');
		$id=$this->pegawai->getMaxId();
		$last_id=$id+1;
		$length=4;
		$rand=substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
		$nip=$kode.'-'.$date.$rand.$last_id;
		$data['nip']=$nip;
		$data_pegawai = [
			
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
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/pegawai/tambah',$data);
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->pegawai->aksiTambahPegawai($data_pegawai);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Customer Berhasil Di Tambahkan.</div>');
			redirect('admin/pegawai');
		}
	}

	public function edit($id)
	{
		$data['divisi']=$this->divisi->getAllDivisi();
		$data['jabatan']=$this->jabatan->getAllJabatan();
		$data['jurusan']=$this->jurusan->getAllJurusan();
		$data['role']=$this->role->getAllRole();
		
		$data['judul'] = 'Edit Pegawai';
		$data['pegawai'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$data['pegawai'] = $this->pegawai->getPegawaiById($id);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', 
		['required' => 'Nama Harus Di Isi!']
		);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|max_length[20]', 
		['required' => 'Username Harus Di Isi!'],
		['min_length' => 'Minimal Panjang 6 Huruf'],
		['max_length' => 'Maxsimal Panjang 20 Huruf']
		);
		// $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', 
		// ['required' => 'Jabatan Harus Di Isi!']
		// );
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', 
		['required' => 'Alamat Harus Di Isi!']
		);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', 
		['required' => 'Jenis Harus Di Pilih!']
		);
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim', 
		['required' => 'Telepon Harus Di Isi!']
		);
		$this->form_validation->set_rules('ktp', 'No.KTP', 'required|trim', 
		['required' => 'No.KTP Harus Di Isi!']
		);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/pegawai/edit');
			$this->load->view('themeplates_admin/footer');
		} else {
			$this->pegawai->aksiEdit();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Customer Berhasil Di Edit.</div>');
			redirect('admin/pegawai');
		}
	}

	public function hapus($id)
	{
		$this->db->delete('pegawai', ['id_pegawai' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"><i class="far fa-lightbulb"></i> Data Customer Berhasil Di Hapus.</div>');
			redirect('admin/pegawai');
	}



}

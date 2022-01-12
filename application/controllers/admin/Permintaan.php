<?php 
defined('BASEPATH') or exit('Anda Tidak punya Akses ke Halaman ini');

class Permintaan extends CI_Controller{
    public function __construct(){
            parent::__construct();
			$this->load->helper('string');
            $this->load->model('Permintaan_model','permintaan');
            $this->load->model('Pegawai_model','pegawai');
            cek_login();

    }

    public function index(){
        $this->data['judul']='Data Permintaan Kas Kecil';
        $this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));

        $url= (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'].
		str_replace(basename($_SERVER['SCRIPT_NAME']),"",
		$_SERVER['SCRIPT_NAME']);

		// Jika tombol cari ditekan
		if($this->input->post('submit')) {
			$this->data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword');
		} else if(!$this->input->post('submit')) {
			$this->data['keyword'] = $this->session->unset_userdata('keyword');
		} else {
			$this->data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('kode_permintaan', $this->data['keyword']);
        $this->db->or_like('nama_divisi',$this->data['keyword']);
		$this->db->or_like('nip',$this->data['keyword']);
		$this->db->from('permintaan_kas_kecil');
      
		$config['total_rows'] = $this->db->count_all_results();
		$this->data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = $url.'admin/permintaan/index';
		// $config['total_rows'] = $this->pegawai->countCustomer();
		// var_dump($config['total_rows']); die;
		$config['per_page'] = 10;
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
		

		$this->data['start'] = $this->uri->segment(4);
		
        $this->data['permintaan']=$this->permintaan->getPermintaan($config['per_page'],$this->data['start'],$this->data['keyword']);
        $this->render_page('admin/permintaan/index',$this->data);
        

        
    }
    public function render_page($page=null,$data=array()){

        $this->load->view('themeplates_admin/header', $data);
        $this->load->view('themeplates_admin/sidebar', $data);
        $this->load->view($page,$data);
        $this->load->view('themeplates_admin/footer',$data);
    }
	public function tambah(){
		date_default_timezone_set('Asia/Jakarta'); 
		$kode='PKK';
		
		$tgl=date('dmY');
		$no=4;
		$rand=substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$no);
		
		$kode_permintaan=$kode.'-'.$tgl.$rand;
		$this->data['kode']=$kode_permintaan;

		$this->data['judul']='Tambah Permintaan Kas Kecil';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required|min_length[4]|max_length[7]',[
			'required'=>'Data Nominal Harus Di Isi',
			'min_length'=>'Data Nominal minimal %digit',
			'max_length'=>'Data Nominal Maximal %s digit'
		]);
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required|max_length[30]',[
			'required'=>'Data Keperluan wajib di isi',
			'max_length'=>'Data Keperluan Max 30 Karakter'
		]);
	$this->form_validation->set_rules('tgl_permintaan', 'Tanggal Permintaan', 'required',[
		'required'=>'Tanggal Wajib Di isi'
	]);
			
		if($this->form_validation->run()==false){
			$this->render_page('admin/permintaan/tambah',$this->data);
		}else{
		$data=[
			'nip'=>$this->input->post('nip'),
			'nama_divisi'=>$this->input->post('nama_divisi'),
			'nama_jabatan'=>$this->input->post('nama_jabatan'),
			'nama_pemohon'=>$this->input->post('nama_pemohon'),
			'keperluan'=>$this->input->post('keperluan'),
			'nominal'=>$this->input->post('nominal'),
			'kode_permintaan'=>$this->input->post('kode_permintaan'),
			'keterangan'=>$this->input->post('keterangan'),
			'tgl_permintaan'=>$this->input->post('tgl_permintaan'),
		];
		// $this->data['all_pegawai']=$this->pegawai->getAllPegawai();
		// $this->
		$this->permintaan->tambahPermintaan($data);

		$this->render_page('admin/permintaan/tambah',$this->data);
		redirect('admin/permintaan');
		$this->session->set_flashdata('pesan','<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Pemintaan Kas Kecil Berhasil Di Tambahkan.</div>');
	}
	}
	
	public function detail($id){
		$this->data['judul']='Detail Permintaan Kas';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		$this->data['permintaan']=$this->permintaan->getPermintaanById($id);
		$current_date=date('Y-m-d h:i:s');
		$this->data['status']=$this->permintaan->getKonfirmasi($id);
		$this->data['total_row']=$this->permintaan->getTotalRow($id);
		$this->data['detail']=$this->permintaan->getDetailPermintaan($id);
		$this->data['detail_all']=$this->permintaan->getDetailPermintaanAll($id);
		$kadiv=$this->input->post('status');
		// $kacab=$this->input->post('status');
		// $finance=$this->input->post('status_accounting');
		$this->form_validation->set_rules('kode_permintaan', 'Kode', 'trim|required');
		
			$data=[
				'id_permintaan'=>$this->input->post('id_permintaan'),
				'kode_permintaan'=>$this->input->post('kode_permintaan'),
				'nama_role'=>$this->input->post('nama_role'),
				'nama'=>$this->input->post('nama'),
				'divisi'=>$this->input->post('divisi'),
				'jabatan'=>$this->input->post('jabatan'),
				'status_konfirmasi'=>$kadiv,
				'tgl_konfirmasi'=>$current_date,
			]	;
		// }elseif($kadiv==null){
		// 	$data=[
		// 		'id_permintaan'=>$this->input->post('id_permintaan'),
		// 		'kode_permintaan'=>$this->input->post('kode_permintaan'),
		// 		'nama_role'=>$this->input->post('nama_role'),
		// 		'nama'=>$this->input->post('nama'),
		// 		'divisi'=>$this->input->post('divisi'),
		// 		'jabatan'=>$this->input->post('jabatan'),
		// 		'status_konfirmasi'=>$finance,
		// 		'tgl_konfirmasi'=>$current_date,
		// 	]	;

		// }else{
		// 	$data=[
		// 		'id_permintaan'=>$this->input->post('id_permintaan'),
		// 		'kode_permintaan'=>$this->input->post('kode_permintaan'),
		// 		'nama_role'=>$this->input->post('nama_role'),
		// 		'nama'=>$this->input->post('nama'),
		// 		'divisi'=>$this->input->post('divisi'),
		// 		'jabatan'=>$this->input->post('jabatan'),
		// 		'status_konfirmasi'=>$kacab,
		// 		'tgl_konfirmasi'=>$current_date,
		// 	]	;
		// }
		
	
		
		if($this->form_validation->run()==FALSE){
			$this->render_page('admin/permintaan/detail',$this->data);
			
		}else{
		
		$this->permintaan->tambahDetailPermintaan($data);
		redirect('admin/permintaan');
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data Detail Berhasil Di Tambahkan</div>');
	}
	}

	public function edit($id){
		$this->data['judul']="Update Data Permintaan";
		
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		$this->data['permintaan']=$this->permintaan->getPermintaanById($id);
		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'trim|required',[
			'required'=>'nama penerima harus di isi'
		]);
		
		$data=[
			
			'nama_penerima'=>$this->input->post('nama_penerima'),
			'status'=>$this->input->post('status'),
			'tgl_diterima'=>$this->input->post('tgl_diterima')
		];
		if($this->form_validation->run()==FALSE){
			$this->render_page('admin/permintaan/edit',$this->data);
		}else{
			$this->permintaan->editPermintaan($data,$id);
			redirect('admin/permintaan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> Berhasil Update Data</div>');
			
		}
	}
    
}
?>

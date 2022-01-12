<?php 
defined('BASEPATH') or exit('NO DIRECT SCRIPT ACCESS ALLOWED ');

class Akun extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model','akun');
		$this->load->model('Pegawai_model','pegawai');
        cek_login();
    }

   
 
    public function index(){
        $this->data['judul_data']='Akun';
        $this->data['tambah_data']='Tambah Data Akun';
        $this->data['judul_card']='Akun';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
        $this->data['judul']='Akun';
		$url= (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'].
		str_replace(basename($_SERVER['SCRIPT_NAME']),"",
		$_SERVER['SCRIPT_NAME']);


        if($this->input->post('submit')) {
			$this->data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword');
		} else if(!$this->input->post('submit')) {
			$this->data['keyword'] = $this->session->unset_userdata('keyword');
		} else {
			$this->data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('nama_reff', $this->data['keyword']);
       
		$this->db->from('akun');
        

        $config['total_rows']=$this->db->count_all_results();

        $this->data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = $url.'/admin/akun/index';
		// $config['total_rows'] = $this->Customer_model->countCustomer();
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

        $this->data['start'] = $this->uri->segment(4);
		$this->data['divisi'] = $this->akun->getAkun($config['per_page'], $this->data['start'], $this->data['keyword']);
       $this->render_page('admin/akun/index',$this->data);


    }

    public function render_page($page=null,$data=array()){

        $this->load->view('themeplates_admin/header', $data);
        $this->load->view('themeplates_admin/sidebar', $data);
        $this->load->view($page,$data);
        $this->load->view('themeplates_admin/footer',$data);
    }
	public function tambah(){
		$this->data['judul']='Tambah Divisi';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		$no_reff=$this->input->post('no_reff');
            $nama_reff=$this->input->post('nama_reff');
            $keterangan=$this->input->post('keterangan');

		$this->form_validation->set_rules('nama_reff','Nama Akun','required|trim|min_length[4]|is_unique[akun.nama_reff]',[
			'required'=>'Nama Akun Wajib Di isi',	
			'min_length'=>'Nama Akun minimal 3 karakter',
			'is_unique'=>'nama Akun %s sudah ada'
		]);
        $this->form_validation->set_rules('no_reff','nomer reff','required|trim|min_length[3]|is_unique[akun.no_reff]',[
			'required'=>'Nomer Akun Wajib Di isi',	
			'min_length'=>'Nomer Akun minimal 3 karakter',
			'is_unique'=>'nomer reff  sudah ada'
		]);
        $this->form_validation->set_rules('keterangan','Keterangan','required|trim|min_length[3]',[
			'required'=>'Keterangan Akun Wajib Di isi',	
			'min_length'=>'Keterangan Akun minimal 3 karakter',
			
		]);
		$data=[
            'no_reff'=>$this->input->post('no_reff'),
            'nama_reff'=>$this->input->post('nama_reff'),
            'keterangan'=>$this->input->post('keterangan')
            
        ];

		if($this->form_validation->run() == FALSE){
			
			$this->render_page('admin/akun/tambah',$this->data);
			
		}else{
		
		$this->akun->addAkun($data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Type Berhasil Di Tambahkan.</div>');
		redirect('admin/akun');
	}
		
		// $this->render_page('admin/jurusan/tambah',$this->data);
	}

	public function edit($id){
		$this->data['judul']='Edit Akun';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		$this->data['divisi']=$this->akun->getAkunById($id);
	
		
		
		$this->form_validation->set_rules('nama_akun','Nama Akun','required|trim|min_length[4]|is_unique[akun.nama_akun]',[
			'required'=>'Nama Akun Wajib Di isi',	
			'min_length'=>'Nama Akun minimal 3 karakter',
			'is_unique'=>'nama Akun %s sudah ada'
		]);
		$data=[
			'no_reff'=>$id,

			'nama_akun'=>$this->input->post('nama_akun'),

		];
		if($this->form_validation->run() == FALSE){
			$this->render_page('admin/akun/edit',$this->data);

		}else{
			$this->akun->editAkun($data,$id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Type Berhasil Di Update.</div>');
			redirect('admin/akun');
		}

	}
	
   public function hapus($id){
	   $this->db->delete('akun',['no_reff'=>$id]);
	   $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><i class="far fa-lightbulb"></i> Data Akun Berhasil Di Hapus.</div>');
	   redirect('admin/akun');

   }
   

}

?>

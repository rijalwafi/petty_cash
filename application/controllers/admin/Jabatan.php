<?php 
defined('BASEPATH') or exit('NO DIRECT SCRIPT ACCESS ALLOWED ');

class Jabatan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model','jabatan');
		$this->load->model('Pegawai_model','pegawai');
        cek_login();
    }

   
 
    public function index(){
		$url= (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'].
		str_replace(basename($_SERVER['SCRIPT_NAME']),"",
		$_SERVER['SCRIPT_NAME']);
        $this->data['judul_data']='Data Jabatan';
        $this->data['tambah_data']='Tambah Data Jabatan';
        $this->data['judul_card']='Jabatan';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
        $this->data['judul']='Jabatan';
        $this->data['jabatan']=$this->jabatan->getAllJabatan();


        if($this->input->post('submit')) {
			$this->data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword');
		} else if(!$this->input->post('submit')) {
			$this->data['keyword'] = $this->session->unset_userdata('keyword');
		} else {
			$this->data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('nama_jabatan', $this->data['keyword']);
		$this->db->from('jabatan');

        $config['total_rows']=$this->db->count_all_results();

        $this->data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = $url.'admin/jabatan/index';
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
		$this->data['jabatan'] = $this->jabatan->getJabatan($config['per_page'], $this->data['start'], $this->data['keyword']);
       $this->render_page('admin/jabatan/index',$this->data);


    }

    public function render_page($page=null,$data=array()){

        $this->load->view('themeplates_admin/header', $data);
        $this->load->view('themeplates_admin/sidebar', $data);
        $this->load->view($page,$data);
        $this->load->view('themeplates_admin/footer',$data);
    }

	public function tambah(){
		$this->data['judul']='Tambah Jurusan';
		$this->data['judul_data']='Data Jabatan';
        $this->data['tambah_data']='Tambah Data Jabatan';
        $this->data['judul_card']='Jabatan';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		

		$this->form_validation->set_rules('nama_jabatan','Nama Jabatan','required|trim|min_length[3]|is_unique[jabatan.nama_jabatan]',[
			'required'=>'Nama Jabatan Wajib Di isi',	
			'min_length'=>'Nama Jabatan minimal 4 karakter',
			'is_unique'=>'nama jabatan %s sudah ada'
		]);
		$data=[
            'nama_jabatan'=>$this->input->post('nama_jabatan')
        ];

		if($this->form_validation->run() == FALSE){
			
			$this->render_page('admin/jabatan/tambah',$this->data);
			
		}else{
		
		$this->jabatan->addJabatan($data);
	
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Type Berhasil Di Tambahkan.</div>');
		redirect('admin/jabatan');
	}
		
		// $this->render_page('admin/jurusan/tambah',$this->data);
	}

	public function edit($id){
		$this->data['judul']='Edit Jurusan';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
		$this->data['jabatan']=$this->jabatan->getJabatanById($id);
		
		
		$this->form_validation->set_rules('nama_jabatan','Nama Jabatan','required|trim|min_length[3]',[
			'required'=>'Nama Jabatan Wajib Di isi',	
			'min_length'=>'Nama Jabatan minimal 4 karakter',
			
		]);
		$data=[
			

			'nama_jabatan'=>$this->input->post('nama_jabatan'),

		];
		if($this->form_validation->run() == FALSE){
			$this->render_page('admin/jabatan/edit',$this->data);

		}else{
			$this->jabatan->editJabatan($data,$id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Type Berhasil Di Update.</div>');
			redirect('admin/jabatan');
		}

	}
	
   public function hapus($id){
	   $this->db->delete('jabatan',['id_jabatan'=>$id]);
	   $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><i class="far fa-lightbulb"></i> Data Jurusan Berhasil Di Hapus.</div>');
	   redirect('admin/jabatan');

   }
   

}

?>

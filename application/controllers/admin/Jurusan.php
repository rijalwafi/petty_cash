<?php 
defined('BASEPATH') or exit('NO DIRECT SCRIPT ACCESS ALLOWED ');

class Jurusan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jurusan_model','jurusan');
		$this->load->model('Pegawai_model','pegawai');
        cek_login();
    }

   
 
    public function index(){
        $this->data['judul_data']='Jurusan';
        $this->data['tambah_data']='Tambah Data Jurusan';
        $this->data['judul_card']='Jurusan';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
        $this->data['judul']='Jurusan';
       


        if($this->input->post('submit')) {
			$this->data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword');
		} else if(!$this->input->post('submit')) {
			$this->data['keyword'] = $this->session->unset_userdata('keyword');
		} else {
			$this->data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('nama_jurusan', $this->data['keyword']);
       
		$this->db->from('jurusan');
        

        $config['total_rows']=$this->db->count_all_results();

        $this->data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = 'http://localhost:8080/petty_cash/admin/jurusan/index';
		// $config['total_rows'] = $this->Customer_model->countCustomer();
		// var_dump($config['total_rows']); die;
		$config['per_page'] = 2;
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
		$this->data['jurusan'] = $this->jurusan->getJurusan($config['per_page'], $this->data['start'], $this->data['keyword']);
       $this->render_page('admin/jurusan/index',$this->data);


    }

    public function render_page($page=null,$data=array()){

        $this->load->view('themeplates_admin/header', $data);
        $this->load->view('themeplates_admin/sidebar', $data);
        $this->load->view($page,$data);
        $this->load->view('themeplates_admin/footer',$data);
    }

	public function tambah(){
		$this->data['judul']='Tambah Jurusan';
		$this->data['pegawai']=$this->db->get_where('pegawai',['username'=>$this->session->userdata('username')])->row_array();
		

		$this->form_validation->set_rules('nama_jurusan','Nama Jurusan','required|trim|min_length[5]|is_unique[jurusan.nama_jurusan]',[
			'required'=>'Nama Jurusan Wajib Di isi',	
			'min_length'=>'Nama Jurusan minimal 5 karakter',
			'is_unique'=>'nama jurusan %s sudah ada'
		]);
		$data=[
            'nama_jurusan'=>$this->input->post('nama_jurusan')
        ];

		if($this->form_validation->run() == FALSE){
			
			$this->render_page('admin/jurusan/tambah',$this->data);
			
		}else{
		
		$this->jurusan->addJurusan($data);
		redirect('admin/jurusan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Type Berhasil Di Tambahkan.</div>');
		redirect('admin/jurusan');
	}
		
		// $this->render_page('admin/jurusan/tambah',$this->data);
	}

	public function edit($id){
		$this->data['judul']='Edit Jurusan';
		$this->data['pegawai']=$this->db->get_where('pegawai',['username'=>$this->session->userdata('username')])->row_array();
		$this->data['jurusan']=$this->jurusan->getJurusanById($id);
	
		
		$this->form_validation->set_rules('nama_jurusan','Nama Jurusan','required|trim|min_length[5]|is_unique[jurusan.nama_jurusan]',[
			'required'=>'Nama Jurusan Wajib Di isi',	
			'min_length'=>'Nama Jurusan minimal 5 karakter',
			'is_unique'=>'nama jurusan %s sudah ada'
		]);
		$data=[
			'id_jurusan'=>$id,

			'nama_jurusan'=>$this->input->post('nama_jurusan'),

		];
		if($this->form_validation->run() == FALSE){
			$this->render_page('admin/jurusan/edit',$this->data);

		}else{
			$this->jurusan->editJurusan($data,$id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Type Berhasil Di Update.</div>');
			redirect('admin/jurusan');
		}

	}
	
   public function hapus($id){
	   $this->db->delete('jurusan',['id_jurusan'=>$id]);
	   $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><i class="far fa-lightbulb"></i> Data Jurusan Berhasil Di Hapus.</div>');
	   redirect('admin/jurusan');

   }

}

?>

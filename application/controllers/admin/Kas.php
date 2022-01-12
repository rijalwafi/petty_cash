<?php 
defined('BASEPATH') or exit('no direct script access allowed ');

 class kas extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Kas_model','kas');
        $this->load->library('form_validation');
        $this->load->model('Pegawai_model','pegawai');
        cek_login();

    }
    private $table='kas';
    private $pk='id_kas';

    //  $input_tanggal=$this->input->post('tgl_dibuat');
    //  $input_jenis=$this->input->post('jenis_kas');
    //  $input_keterangan=$this->input->post('keterangan');
    //  $input_nominal=$this->input->post('nominal');

        
        
        
        
    


    public function index(){
        $data['judul']="Data Kas";
        $data['tombol_tambah']="Tambah Data Kas";
        $data['tombol_simpan']="simpan";
        $data['sub_judul2']="Form Tambah Data Kas";
        $data['kas']=$this->kas->get();
        $data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
        $this->load->view('themeplates_admin/header', $data);
		$this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/kas/index', $data);
		$this->load->view('themeplates_admin/footer');

    }

    private function _validasi(){
        $this->form_validation->set_rules('tgl_dibuat', 'Tanggal Dibuat', 'required',['required'=>'Tanggal Harus Di Isi']);
        $this->form_validation->set_rules('jenis_kas', 'Jenis Kas', 'trim|required',['required'=>"Jenis Kas Harus Di isi"]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required',['required'=>"Keterangan Harus Di isi"]);
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required|min_length[4]',[
            'required'=>"Nominal Harus Di isi",
            'min_length'=>"Nominal minimal 4 angka"
        ]);
    }

    public function getubahkas($id){
        $data['judul'] = 'Edit Data Kas';
        $data['sub_judul']='Edit Data Kas';
        $data['tombol']="simpan";
		$data['pegawai'] = $this->db->get_where('pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$data['kas'] = $this->kas->getById($id);

        $this->load->view('themeplates_admin/header',$data);
        $this->load->view('themeplates_admin/sidebar', $data);
		$this->load->view('admin/kas/edit', $data);
		$this->load->view('themeplates_admin/footer');
        
    }


    public function tambahkas(){
      

        $this->_validasi();
        if($this->form_validation->run()==FALSE){
            
            $data['judul']='tambah kas';
            $data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
            $data['tombol_simpan']='simpan';
            $data['sub_judul']='Tambah Data Kas';
            $data['sub_judul2']='Form Tambah Data Kas';
            $data['customer']=$this->db->get_where('pegawai',['username'=>$this->session->userdata('username')])->row_array();
            $this->load->view('themeplates_admin/header', $data);
            $this->load->view('themeplates_admin/sidebar', $data);
            $this->load->view('admin/kas/tambah', $data);
            $this->load->view('themeplates_admin/footer');
          
        }else{
            $input_tanggal=$this->input->post('tgl_dibuat');
            $input_jenis=$this->input->post('jenis_kas');
            $input_keterangan=$this->input->post('keterangan');
            $input_nominal=$this->input->post('nominal');

            if($input_jenis=='pemasukan'){
                $data=array(
                    'tgl_dibuat'=>$input_tanggal,
                    'jenis_kas'=>$input_jenis,
                    'keterangan'=>$input_keterangan,
                    'kas_masuk'=>$input_nominal
                );
                $insert=$this->kas->tambahkas($this->table,$data);

                if($insert){
                $this->session->set_flashdata('success','data berhasil di tambahkan');
                redirect('admin/kas/index');
                }else{
                    $this->session->set_flashdata('error',' data gagal di tambakan');
                    redirect('admin/kas/tambahkas');
                }

            }else{
                $data=array(
                    'tgl_dibuat'=>$input_tanggal,
                    'jenis_kas'=>$input_jenis,
                    'keterangan'=>$input_keterangan,
                    'kas_keluar'=>$input_nominal
                );
                $insert=$this->kas->tambahkas($this->table,$data);
                if($insert){
                    $this->session->set_flashdata('success','data berhasil di tambahkan');
                    redirect('admin/kas/index');
                    }else{
                        $this->session->set_flashdata('error',' data gagal di tambakan');
                        redirect('admin/kas/tambahkas');
                    }

            }

        
       
            
        }
    }

    public function hapuskas($id){
        $this->db->delete('kas',['id_kas'=>$id]);
        $this->session->set_flashdata('pesan','<div class="alert alert-success"><i class="fas fa-light"></i>Data Kas Berhasil di hapus</div>');
        redirect('admin/kas/index');
        

        
    }
}
?>

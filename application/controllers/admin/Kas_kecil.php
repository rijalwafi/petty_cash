<?php
defined('BASEPATH')or exit('Anda Tidak Punya Akses');

class Kas_kecil extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kas_kecil_model','jurnal');
		$this->load->model('Pegawai_model','pegawai');
        $this->load->helper(['url','form','sia','tgl_indo']);
        cek_login();
    }

    public function index(){

        $url= (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'].
		str_replace(basename($_SERVER['SCRIPT_NAME']),"",
		$_SERVER['SCRIPT_NAME']);
        $this->data['judul_data']='Data Kas Kecil';
        $this->data['tambah_data']='Tambah Data Kas Kecil';
        $this->data['judul_card']='Kas Kecil';
		$this->data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
        $this->data['judul']='Kas Kecil';
        
        $this->data['tahun']=$this->jurnal->getJurnalByYear();
        
        
       
        if($this->input->post('submit')) {
			$this->data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword');
		} else if(!$this->input->post('submit')) {
			$this->data['keyword'] = $this->session->unset_userdata('keyword');
		} else {
			$this->data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('no_reff', $this->data['keyword']);
		$this->db->from('transaksi');
        $config['total_rows']=$this->db->count_all_results();

        $this->data['total_rows'] = $config['total_rows'];

		// Konfigurasi Pagination
		$config['base_url'] = $url.'admin/kas_kecil/index';
		// $config['total_rows'] = $this->Customer_model->countCustomer();
		// var_dump($config['total_rows']); die;
		$config['per_page'] = 20;
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
		$this->data['listJurnal'] = $this->jurnal->getJurnalByYearAndMonth($config['per_page'], $this->data['start']);
       $this->render_page('admin/kas_kecil/index',$this->data);

    }

    public function render_page($page=null,$data=array()){

        $this->load->view('themeplates_admin/header', $data);
        $this->load->view('themeplates_admin/sidebar', $data);
        $this->load->view($page,$data);
        $this->load->view('themeplates_admin/footer',$data);
    }
    public function jurnalUmumDetail(){
        
       
            $content = 'admin/kas_kecil/jurnal_umum';
            $judul = 'Jurnal Umum';
            $data_call['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai')); 
            $bulan = $this->input->post('bulan',true);
            $tahun = $this->input->post('tahun',true);
            $jurnals = null;
    
            if(empty($bulan) || empty($tahun)){
                redirect('jurnal_umum');
            }
    
            $jurnals = $this->jurnal->getJurnalJoinAkunDetail($bulan,$tahun);
            $totalDebit = $this->jurnal->getTotalSaldoDetail('debit',$bulan,$tahun);
            $totalKredit = $this->jurnal->getTotalSaldoDetail('kredit',$bulan,$tahun);
    
            if($jurnals==null){
                $this->session->set_flashdata('dataNull','Data Jurnal Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
                redirect('jurnal_umum');
            }
    
            $this->load->view('themeplates_admin/templates',compact('content','jurnals','totalDebit','totalKredit','judul','data_call'));
        }

        public function createJurnal(){
        
            $content = 'admin/kas_kecil/tambah'; 
            $data_call['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
            $action = 'jurnal_umum/tambah'; 
            $tgl_input = date('Y-m-d H:i:s'); 
            $id_user = $this->session->userdata('id_pegawai'); 
            $judul = 'Tambah Jurnal Umum';
    
            if(!$_POST){
                $data = (object) $this->jurnal->getDefaultValues();
            }else{
                $data = (object) [
                   
                    'no_reff'=>$this->input->post('no_reff',true),
                    'tgl_input'=>$tgl_input,
                    'tgl_transaksi'=>$this->input->post('tgl_transaksi',true),
                    'jenis_saldo'=>$this->input->post('jenis_saldo',true),
                    'saldo'=>$this->input->post('saldo',true)
                ];
            }
    
            if(!$this->jurnal->validate()){
                // $data=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
                $this->load->view('themeplates_admin/templates',compact('content','action','judul','data_call','data'));
                return;
            }
            
            $this->jurnal->insertJurnal($data);
            $this->session->set_flashdata('berhasil','Data Jurnal Berhasil Di Tambahkan');
            redirect('admin/kas_kecil/index');    
        }


        public function editForm(){
            if($_POST){
                $id = $this->input->post('id',true);
                $title = 'Edit'; $content = 'user/form_jurnal'; $action = 'jurnal_umum/edit'; $judul = 'Edit Jurnal Umum';
    
                $data = (object) $this->jurnal->getJurnalById($id);
    
                $this->load->view('themeplate_admin/template',compact('content','title','action','data','id','titleTag'));
            }else{
                redirect('jurnal_umum');
            }
        }
    
        public function editJurnal(){
            $title = 'Edit'; $content = 'user/form_jurnal'; $action = 'jurnal_umum/edit'; $tgl_input = date('Y-m-d H:i:s'); $id_user = $this->session->userdata('id'); $titleTag = 'Edit Jurnal Umum';
    
            if($_POST){
                $data = (object) [
                    'id_user'=>$id_user,
                    'no_reff'=>$this->input->post('no_reff',true),
                    'tgl_input'=>$tgl_input,
                    'tgl_transaksi'=>$this->input->post('tgl_transaksi',true),
                    'jenis_saldo'=>$this->input->post('jenis_saldo',true),
                    'saldo'=>$this->input->post('saldo',true)
                ];
                $id = $this->input->post('id',true);
            }
    
            if(!$this->jurnal->validate()){
                $this->load->view('template',compact('content','title','action','data','id','titleTag'));
                return;
            }
            
            $this->jurnal->updateJurnal($id,$data);
            $this->session->set_flashdata('berhasil','Data Jurnal Berhasil Di Ubah');
            redirect('jurnal_umum');    
        }
    
        public function deleteJurnal(){
            $id = $this->input->post('id',true);
            $this->jurnal->deleteJurnal($id);
            $this->session->set_flashdata('berhasilHapus','Data Jurnal berhasil di hapus');
            redirect('admin/kas_kecil');
        }

       
    
    


}

?>

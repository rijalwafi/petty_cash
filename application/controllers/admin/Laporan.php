<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Laporan_model');
		$this->load->model('Kas_kecil_model','jurnal');
		$this->load->model('Pegawai_model','pegawai');
		$this->load->model('Akun_model','akun');
	}



	public function index(){
		$data['judul']='Laporan Kas';

		$data['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));

		$this->form_validation->set_rules('dari','Dari Tanggal','required');
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/laporan_kas/tgllaporan', $data);
			$this->load->view('themeplates_admin/footer');
		}else{
			$data['laporan']=$this->Laporan_model->tampilLaporanKas();
			$this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view('admin/laporan_kas/tampil_laporan', $data);
			$this->load->view('themeplates_admin/footer');
		}
	}
	public function printKas(){
		$data['judul']='Laporan Kas';
		$data['laporan']=$this->Laporan_model->printLaporanKas();
		$data['total']=$this->Laporan_model->totalSaldoByTanggal();
		// var_dump($data['total']);
		// var_dump($data['laporan']);
		$id=$this->session->userdata('id_pegawai');
		$data['pegawai']=$this->pegawai->getPegawaiById($id);

		$this->load->view('themeplates_admin/header',$data);
		$this->load->view('admin/laporan_kas/print',$data);
	}

	public function laporanKasKecil(){
        $judul = 'Laporan Kas Kecil';
		$data_call['pegawai']=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
        $content = 'admin/laporan_kas/kas_kecil';
        $listJurnal = $this->jurnal->getJurnalByYearAndMonth();
        $tahun = $this->jurnal->getJurnalByYear();
        $this->load->view('themeplates_admin/templates',compact('content','listJurnal','judul','tahun','data_call'));
    }

    public function laporanCetak(){
        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true);
        $titleTag = 'Laporan '.bulan($bulan).' '.$tahun;
		$pegawai=$this->pegawai->getPegawaiById($this->session->userdata('id_pegawai'));
        $dataAkun = $this->akun->getAkunByMonthYear($bulan,$tahun);

        $jurnals = $this->jurnal->getJurnalJoinAkunDetail($bulan,$tahun);
        $totalDebit = $this->jurnal->getTotalSaldoDetail('debit',$bulan,$tahun);
        $totalKredit = $this->jurnal->getTotalSaldoDetail('kredit',$bulan,$tahun);

        $data = null;
        $saldo = null;
        foreach($dataAkun as $row){
            $data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
            $saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
        }

        if($data == null || $saldo == null){
            $this->session->set_flashdata('dataNull','Laporan Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
            redirect('laporan');
        }

        $jumlah = count($data);
		$id=$this->session->userdata('id_pegawai');
		$data['pegawai']=$this->pegawai->getPegawaiById($id);
        $data = $this->load->view('admin/laporan_kas/print_kas_kecil',compact('titleTag','dataAkun','bulan','tahun','jurnals','totalDebit','totalKredit','data','saldo','jumlah','pegawai'),true);
        // echo $data;
        // die();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan_".bulan($bulan).'_'.$tahun;
        $this->pdf->load_view('admin/laporan_kas/print_kas_kecil', $data);
    }

}

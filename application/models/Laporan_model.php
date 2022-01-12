<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
	public function tampilLaporanPerTgl()
	{
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		// $this->db->select('*');
		// $this->db->from('transaksi');
		// $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
		// $this->db->join('customer', 'customer.id_customer = transaksi.id_customer');
		// $this->db->where('transaksi.tgl_rental >=', $dari);
		// $this->db->where('transaksi.tgl_rental <=', $sampai);
		// return $this->db->get()->result_array();
		$query=$this->db->query("SELECT customer.nama,mobil.merk,transaksi.*, datediff(tgl_kembali,tgl_rental) total_hari,transaksi.harga * datediff(transaksi.tgl_kembali,transaksi.tgl_rental)  total_bayar,status_penggembalian from transaksi join customer on transaksi.id_customer=customer.id_customer join mobil on transaksi.id_mobil=mobil.id_mobil  where tgl_kembali>='$dari' and tgl_kembali<='$sampai' ORDER by tgl_kembali desc  ");
		$result=$query->result_array();
		return $result;
	}

	public function printTransaksi()
	{
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');

		$query=$this->db->query("SELECT customer.nama,mobil.merk,transaksi.*, datediff(tgl_kembali,tgl_rental) total_hari,transaksi.harga * datediff(transaksi.tgl_kembali,transaksi.tgl_rental)  total_bayar,status_penggembalian from transaksi join customer on transaksi.id_customer=customer.id_customer join mobil on transaksi.id_mobil=mobil.id_mobil  where tgl_kembali>='$dari' and tgl_kembali<='$sampai' ORDER by tgl_kembali desc ");
		$result=$query->result_array();
		return $result;
	}

	public function tampilLaporanKas(){

		$dari=$this->input->post('dari');
		$sampai= $this->input->post('sampai');

		$query= $this->db->query("SELECT * from (SELECT id_kas,tgl_dibuat,jenis_kas,keterangan,kas_masuk, kas_keluar, @balance := @balance + kas_masuk - kas_keluar AS balance FROM kas, (SELECT @balance := 0) var where tgl_dibuat >= '$dari' and tgl_dibuat <= '$sampai') a order by id_kas desc");
		$result=$query->result_array();
		return  $result;
	}
	public function printLaporanKas(){

		$dari=$this->input->get('dari');
		$sampai= $this->input->get('sampai');

		$query= $this->db->query("SELECT * from (SELECT id_kas,tgl_dibuat,jenis_kas,keterangan,kas_masuk, kas_keluar, @balance := @balance + kas_masuk - kas_keluar AS balance FROM kas, (SELECT @balance := 0) var where tgl_dibuat >= '$dari' and tgl_dibuat <= '$sampai') a order by id_kas desc");
		$result=$query->result_array();
		return  $result;
	}
	public function totalSaldoByTanggal(){
		$dari=$this->input->get('dari');
		$sampai= $this->input->get('sampai');
		$query=$this->db->query("SELECT sum(kas_masuk) debit,sum(kas_keluar) kredit,sum(kas_masuk)-SUM(kas_keluar) total from kas WHERE tgl_dibuat >='$dari' and tgl_dibuat <= '$sampai' order by id_kas");
		$result=$query->result_array();
		return $result;
	}

}

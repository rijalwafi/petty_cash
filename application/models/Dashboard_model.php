<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	public function getTransaksi()
	{
		// return $this->db->get('transaksi')->result_array();
		$query=$this->db->query("SELECT customer.nama,mobil.merk,transaksi.*, (datediff(tgl_kembali,tgl_rental)+1) total_hari,(datediff(tgl_kembali,tgl_rental) * harga ) total_bayar from transaksi join customer on transaksi.id_customer=customer.id_customer join mobil on transaksi.id_mobil=mobil.id_mobil ORDER by id_rental desc ");
		$result=$query->result_array();
		return $result;

	}

	public function getPemasukanByYear(){
		// $query=$this->db->select('SUM(harga) as total');
		// $query=	$this->db->from('transaksi');
		// $query=$this->db->where('year(tgl_rental)','year(current_date)');
		// $result=$query->row_array();
		$query=$this->db->query("SELECT sum(harga * (datediff(tgl_kembali,tgl_rental) + 1) + total_denda ) as total from transaksi where YEAR(tgl_penggembalian)=YEAR(CURRENT_DATE) ORDER by id_rental desc");
		$result=$query->row()->total;
		return $result;
	
	}
	public function getPemasukanByMonth(){
		$query=$this->db->query("SELECT sum(harga * (datediff(tgl_kembali,tgl_rental) + 1) + total_denda ) as total from transaksi where month(tgl_penggembalian)= month(CURRENT_DATE) ORDER by id_rental desc");
		$result=$query->row()->total;
		return $result;
	}
	public function getPemasukanByDay(){
		$query=$this->db->query("SELECT sum(harga * (datediff(tgl_kembali,tgl_rental) + 1) + total_denda ) as total from transaksi where day(tgl_penggembalian)= day(CURRENT_DATE) ORDER by id_rental desc");
		$result=$query->row()->total;
		return $result;
	}
	public function getPemasukanByDenda(){
		$query=$this->db->query("SELECT SUM(denda) as total from transaksi where year(tgl_rental)=year(current_date)");
		$result=$query->row()->total;
		return $result;
	}

	public function getMobilTersedia(){
		$query=$this->db->query("SELECT COUNT(id_mobil) as total from transaksi where status_penggembalian='kembali'");
		$result=$query->row()->total;
		return $result;
	}

}

<?php 
defined('BASEPATH') or exit("NO DIRECT SCRIPT ACCESS ALLOWED");

class Kas_model extends CI_Model{

    

    public function get(){
       $query= $this->db->query("SELECT * from (SELECT id_kas,tgl_dibuat,jenis_kas,keterangan,kas_masuk, kas_keluar, @balance := @balance + kas_masuk - kas_keluar AS balance FROM kas, (SELECT @balance := 0) var) a order by id_kas desc");
       $result=$query->result_array();
       return  $result;

    }

    public function getById($id){
        return $this->db->get_where('kas',['id_kas'=>$id])->row_array();
    }

    public function tambahkas($table,$data){
        
       return $this->db->insert($table,$data);

    }

}

?>

<?php 
defined('BASEPATH') or exit('NO DIRECT SCRIPT ACCESS ALLOWED');
class Permintaan_model extends CI_Model{

    private $table='permintaan_kas_kecil';

    public function getPermintaan($limit,$start,$keyword){

        if($keyword){
                
            $this->db->like('kode_permintaan',$keyword);
            $this->db->or_like('nama',$keyword);
            $this->db->or_like('nama_divisi',$keyword);
            
        }
        $this->db->select('*');
        $this->db->from('permintaan_kas_kecil p');
      
        
        $this->db->order_by('id_permintaan','desc');
        $this->db->limit($limit,$start);
        return $this->db->get()->result_array();
    }

    public function tambahPermintaan($data){
     $this->db->insert($this->table,$data);
    }

    public function tambahDetailPermintaan($data){
        $this->db->insert('detail_permintaan',$data);
    }
    public function getDetailPermintaan($id){
        $this->db->select('*');
        $this->db->from('detail_permintaan d');
        $this->db->join('permintaan_kas_kecil p','d.id_permintaan=p.id_permintaan','left');
        $this->db->where('d.id_permintaan=',$id);
        return $this->db->get()->row_array();
    }
    public function getDetailPermintaanAll($id){
        $this->db->select('*');
        $this->db->from('detail_permintaan d');
        $this->db->join('permintaan_kas_kecil p','d.id_permintaan=p.id_permintaan','left');
        $this->db->where('d.id_permintaan=',$id);
        return $this->db->get()->result_array();
    }
    public function getKonfirmasi($id){
        $query =$this->db->query("SELECT SUM(status_konfirmasi) as total from detail_permintaan where id_permintaan=$id");
        return $query->row()->total;
        // $this->db->select_sum('status_konfirmasi');
        // $this->db->from('detail_permintaan');
        // $this->db->where('id_permintaan',$id);
        // return $this->db->get()->result();
    }
    public function getTotalRow($id){
        $query=$this->db->query("SELECT count(status_konfirmasi) as total FROM `detail_permintaan` WHERE id_permintaan=$id");
        return $query->row()->total;
    }

    public function getPermintaanById($id){
        return $this->db->get_where($this->table,['id_permintaan'=>$id])->row_array();
    }
    public function editPermintaan($data,$id){
        $this->db->where('id_permintaan',$id);
        $this->db->update('permintaan_kas_kecil',$data);
    }

}

?>

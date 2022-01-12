<?php
defined('BASEPATH') or exit('NO SCRIPT DIRECT ACCESS ALLOWED');

class Jurusan_model extends CI_Model{
    private $table='jurusan';

    public function getAllJurusan(){
        return $this->db->get('jurusan')->result_array();
    }

    public function getJurusan($limit,$start,$keyword){
        if($keyword){
            $this->db->like('nama_jurusan',$keyword);
        }
        $this->db->select('*');
        $this->db->from('jurusan');
        $this->db->limit($limit,$start);
        return $this->db->get()->result_array();

    }
    public function addJurusan($data){
        
        $this->db->insert('jurusan',$data);
    }

    public function getJurusanById($id){
     
        return $this->db->get_where($this->table,['id_jurusan'=>$id])->row_array();
    }

    public function editJurusan($data,$id){
        $this->db->where('id_jurusan',$id);
        $this->db->update('jurusan',$data);
    }
}
?>

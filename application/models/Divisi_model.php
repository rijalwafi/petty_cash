<?php 
defined('BASEPATH')or exit("NO SCRIPT DIRECT ACCESS ALLOWED");

    class Divisi_model extends CI_Model {

   
        public function getAllDivisi(){
            $this->db->select('*');
            $this->db->from('divisi','desc');
            return $this->db->get()->result_array();
        }

        public function getDivisi($limit,$start,$keyword){

        if($keyword)
		{
			$this->db->like('nama_divisi', $keyword);
		}
        $this->db->select('*');
        $this->db->from('divisi');
        // $this->db->join('jurusan j','j.id_jurusan=p.id_jurusan','left');
        $this->db->limit($limit,$start);
		return $this->db->get()->result_array();
        }
        public function addDivisi($data){
        
            $this->db->insert('divisi',$data);
        }
    
        public function getDivisiById($id){
         
            return $this->db->get_where('divisi',['id_divisi'=>$id])->row_array();
        }
    
        public function editDivisi($data,$id){
            $this->db->where('id_divisi',$id);
            $this->db->update('divisi',$data);
        }
      
    }
    
    
?>

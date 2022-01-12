<?php 
defined('BASEPATH')or exit("NO SCRIPT DIRECT ACCESS ALLOWED");

    class Jabatan_model extends CI_Model {
        private $table='jabatan';
        private $id_table='id_jabatan';

        public function getAllJabatan(){

            return $this->db->get('jabatan')->result_array();
        }

        public function getJabatan($limit,$start,$keyword){

        if($keyword)
		{
			$this->db->like('nama_jabatan', $keyword);
			
		
		}
		return $this->db->get('jabatan', $limit, $start)->result_array();
   
        }
        public function addJabatan($data){
        
            $this->db->insert($this->table,$data);
        }
    
        public function getJabatanById($id){
         
            return $this->db->get_where($this->table,[$this->id_table=>$id])->row_array();
        }
    
        public function editJabatan($data,$id){
            $this->db->where($this->id_table,$id);
            $this->db->update($this->table,$data);
        }
      
    }
    
    
?>

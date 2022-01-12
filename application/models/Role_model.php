<?php 
defined('BASEPATH') or exit('NO DIRECT SCRIPT ACCESS ALLOWED');

class Role_model extends CI_Model{

    public function getAllRole(){
        return $this->db->get('role')->result_array();
    }
}
?>

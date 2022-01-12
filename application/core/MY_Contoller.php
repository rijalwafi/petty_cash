<?php



class MY_Controller extends CI_Controller{
    public function __construct(){

        parent::__construct();
    
    }



}
class Admin_Controller extends MY_Controller{

        // public function logged_ind(){
        //     $session=$this->session->userdata();

            
        // // }
        public function __construct() 
	{
		parent::__construct();
    }
        public function render_template($page=null,$data=array()){

            $this->load->view('themeplates_admin/header', $data);
			$this->load->view('themeplates_admin/sidebar', $data);
			$this->load->view($page,$data);
			$this->load->view('themeplates_admin/footer',$data);
        }
}



?>

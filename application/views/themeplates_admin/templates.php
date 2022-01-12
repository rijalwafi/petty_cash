<?php
$this->load->view('themeplates_admin/header',$data_call);
$this->load->view('themeplates_admin/sidebar',$data_call);
$this->load->view($content);
$this->load->view('themeplates_admin/footer',$data_call);

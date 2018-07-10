<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewPengabdianNonUPJ extends CI_Controller {

	function __construct(){
    parent::__construct();      
    	if($this->session->userdata('status') != "login"){
      		redirect(base_url("login"));
    	}  	 
    }
    
	public function index(){
      $usan = $this->session->userdata('nama');
      $kue = $this->M_login->hak_ak($usan); 
        $data_profil = array(           
          'da' => $kue,         
        );          
		$this->load->view('dashboard/v_header',$data_profil);
		$this->load->view('tambahdata/v_add_publikasi');
		$this->load->view('dashboard/v_footer');
	}
  
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddYear extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(site_url("login"));
		} 
	}
	public function index()
	{
		$usan = $this->session->userdata('nama');
		$kue = $this->M_login->hak_ak($usan); 
		$dataHalaman = array(   		
		  'da' => $kue,
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('dashboard/v_add_year');
		$this->load->view('dashboard/v_footer');
	}
	public function savedok(){     
		if($this->input->post('btnUpload') == "Upload"){									
			$_tahun = $this->input->post('tahun', TRUE);
			$data = array(
				'tahun' =>  $_tahun,
			);       
			$query= $this->M_login->add_year($data);
			if ($query) {
				redirect(site_url('dashboard'));
				//print_r($stan);
			}
			else{
				redirect(site_url('dashboard'));
			}
		}				
	}
}

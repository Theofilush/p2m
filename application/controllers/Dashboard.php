<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$tampil_prodi = $this->M_login->get_prodi();
		$dataHalaman = array(   		
		  'da' => $kue,
		  'tampil_prodi'=>$tampil_prodi
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('dashboard/v_dashboard',$dataHalaman);
		$this->load->view('dashboard/v_footer');
	}
}

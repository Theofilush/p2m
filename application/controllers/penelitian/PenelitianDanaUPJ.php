<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenelitianDanaUPJ extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_dana_upj();
 
		$dataHalaman = array(   
		  'query'=>$query,
          'da' => $kue   
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('penelitian/v_dana_pen_pj');
		$this->load->view('dashboard/v_footer');
	}
}

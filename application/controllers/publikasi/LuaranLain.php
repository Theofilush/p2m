<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LuaranLain extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_luaran();
		$jenis = $this->M_dokumen->tampil_jenis_luaran(); 
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 		

		$dataHalaman = array( 
		  'query'  =>$query,
		  'da' => $kue,
		  'tampil_tahun'=> $query_tampil_tahun,
		  'jenis_luaran' =>  $jenis,
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('publikasi/v_luaran_lain');
		$this->load->view('dashboard/v_footer');
	}
}

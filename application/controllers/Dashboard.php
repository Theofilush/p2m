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
		$tampil_tahun = $this->M_dokumen->tampil_tahun();
		$jumlah_publikasi = $this->M_dokumen->hitung_publikasi();
		$jumlah_pemakalah = $this->M_dokumen->hitung_pemakalah();
		$jumlah_buku = $this->M_dokumen->hitung_buku();
		$jumlah_hki = $this->M_dokumen->hitung_hki();
		$jumlah_luaran = $this->M_dokumen->hitung_luaran();

		foreach($jumlah_publikasi as $row){
			$john1[] =$row->total_jurnal;		
		}
		foreach($jumlah_pemakalah as $row){
			$john2[] =$row->total_makalah;		
		}	
		foreach($jumlah_buku as $row){
			$john3[] =$row->total_buku;		
		}	
		foreach($jumlah_hki as $row){
			$john4[] =$row->total_hki;		
		}	
		foreach($jumlah_luaran as $row){
			$john5[] =$row->total_luaran;		
		}	

		for($i=0;$i<=10;$i++){
			$total_publikasi[$i] = $john1[$i] + $john2[$i] ;
		}

		$dataHalaman = array(   		
		  'da' => $kue,
		  'tampil_prodi'=>$tampil_prodi,
		  'tampil_tahun'=>$tampil_tahun,
		  'jumlah_publikasi'=>$jumlah_publikasi,		  
		  'jumlah_pemakalah'=>$jumlah_pemakalah,
		  'jumlah_buku'=>$jumlah_buku,
		  'jumlah_hki'=>$jumlah_hki,
		  'jumlah_luaran'=>$jumlah_luaran,
		  'total'=>$total_publikasi
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('dashboard/v_dashboard',$dataHalaman);
		$this->load->view('dashboard/v_footer2');
	}
}

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
		$jumlah_penelitian = $this->M_dokumen->hitung_dana_upj();
		$jumlah_penelitian_non = $this->M_dokumen->hitung_dana_non_upj();
		$jumlah_pengabdian = $this->M_dokumen->hitung_dana2_upj();
		$jumlah_pengabdian_non = $this->M_dokumen->hitung_dana_non2_upj();

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
		foreach($jumlah_penelitian as $row){
			$cena1[] =$row->total_penelitian;		
		}
		foreach($jumlah_penelitian_non as $row){
			$cena2[] =$row->total_penelitian_non;		
		}
		foreach($jumlah_pengabdian as $row){
			$cena3[] =$row->total_pengabdian;		
		}
		foreach($jumlah_pengabdian_non as $row){
			$cena4[] =$row->total_pengabdian_non;		
		}

		for($i=0;$i<=9;$i++){
			if (empty($john1[$i])) {$john1[$i]=0;}
			if (empty($john2[$i])) {$john2[$i]=0;}
			if (empty($john3[$i])) {$john3[$i]=0;}
			if (empty($john4[$i])) {$john4[$i]=0;}
			if (empty($john5[$i])) {$john5[$i]=0;}
			if (empty($cena1[$i])) {$cena1[$i]=0;}
			if (empty($cena2[$i])) {$cena2[$i]=0;}
			if (empty($cena3[$i])) {$cena3[$i]=0;}
			if (empty($cena4[$i])) {$cena4[$i]=0;}
			$total_publikasi[$i] = $john1[$i] + $john2[$i] + $john3[$i] + $john4[$i] + $john5[$i] + $cena1[$i] + $cena2[$i] + $cena3[$i] + $cena4[$i];
		}		
		$jo=1;
		foreach ($total_publikasi as $reg_dat) {			
			$this->M_dokumen->update_jumlah(array ('jumlah'=>$reg_dat),$jo);
			$jo++;
		}
		$top_5 = $this->M_dokumen->tampil_top_5();
		$total_top5=$this->M_dokumen->tampil_jumlah_top_5();
		//hasil total penjumlahan seluruh penelitian, pengabidan, dan publikasi diinsert ke database 
		//kemudian disort berdasarkan angka tertinggi
		$dataHalaman = array(   		
		  'da' => $kue,
		  'tampil_prodi'=>$tampil_prodi,
		  'tampil_tahun'=>$tampil_tahun,
		  'jumlah_publikasi'=>$jumlah_publikasi,		  
		  'jumlah_pemakalah'=>$jumlah_pemakalah,
		  'jumlah_buku'=>$jumlah_buku,
		  'jumlah_hki'=>$jumlah_hki,
		  'jumlah_luaran'=>$jumlah_luaran,
		  'total'=>$total_publikasi,
		  'top_five'=>$top_5,
		  'jumba'=>$total_top5
        );
		//var_dump( $total_publikasi);
		//print("Total semua: ");print_r( $total_publikasi);     	print("<br><br>");
		//var_dump( $total_publikasi);   print("<br><br>");
		//print_r( $john1);		print("<br><br>");
		//print_r( $john2);     	print("<br><br>");
		//print_r( $john3);     	print("<br><br>");
		//print("HKI: ");print_r( $john4);     	print("<br><br>");
		//print_r( $john5);     	print("<br><br>");
		//print("penelitian: ");print_r($cena1);     	print("<br><br>");
		//print("penelitian-non: ");print_r( $cena2);     	print("<br><br>");
		//print("pengabidan: ");print_r( $cena3);     	print("<br><br>");
		//print("pengabdian-non: ");print_r( $cena4);     	print("<br><br>");
		//$this->load->view('dashboard/v_header',$dataHalaman);
		//$this->load->view('dashboard/v_dashboard',$dataHalaman);
		//$this->load->view('dashboard/v_footer2');
	}
}

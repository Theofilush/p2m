<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(site_url("login"));
		} 
		$this->load->model('dokumen/M_chart');		
	}
	
	public function index() {
		$usan = $this->session->userdata('nama');
		$kue = $this->M_login->hak_ak($usan); 
		$tampil_prodi = $this->M_login->get_prodi();
		$tampil_tahun = $this->M_dokumen->tampil_tahun();
		
		//menghitung keseluruhan data pengabdian dan dimasukan ke total publikasi di halaman dashboard paling atas
		$raise_abdi = $this->db->count_all('t_dana2_upj');
		$raise_abdinon = $this->db->count_all('t_dana_non2_upj');
		$raise_abdihidik = $this->db->count_all('t_dana_kemenristek2');
		$jml_raise_abdi = $raise_abdi + $raise_abdinon + $raise_abdihidik; //jumlah pengabdian
		$raise_liti = $this->db->count_all('t_dana_upj');
		$raise_litinon = $this->db->count_all('t_dana_non_upj');
		$raise_litihidik = $this->db->count_all('t_dana_kemenristek');
		$jml_raise_liti = $raise_liti + $raise_litinon + $raise_litihidik; //jumlah penelitian
		$raise_jurnal = $this->db->count_all('t_publikasi_jurnal');
		$raise_buku = $this->db->count_all('t_buku_ajar');
		$raise_forum = $this->db->count_all('t_forum_ilmiah');
		$raise_hki = $this->db->count_all('t_hki');
		$raise_luaran = $this->db->count_all('t_luaran_lain');
		$jml_raise_publi = $raise_jurnal + $raise_buku + $raise_forum + $raise_hki + $raise_luaran; //jumlah publikasi

		//untuk membuat perhitungan dan membuat garis line pada dashboard grafik 1
		$hitung_dana2_upj_tahun = $this->M_chart->hitung_dana2_upj_tahun();
		$hitung_dana_non2_upj_tahun = $this->M_chart->hitung_dana_non2_upj_tahun();
		$hitung_hibah2_upj_tahun = $this->M_chart->hitung_hibah2_upj_tahun();

		$hitung_dana_upj_tahun = $this->M_chart->hitung_dana_upj_tahun();
		$hitung_dana_non_upj_tahun = $this->M_chart->hitung_dana_non_upj_tahun();
		$hitung_hibah_upj_tahun = $this->M_chart->hitung_hibah_upj_tahun();

		$hitung_jurnal_tahun = $this->M_chart->hitung_jurnal_tahun();
		$hitung_buku_tahun = $this->M_chart->hitung_buku_tahun();
		$hitung_prosiding_tahun = $this->M_chart->hitung_prosiding_tahun();
		$hitung_hki_tahun = $this->M_chart->hitung_hki_tahun();
		$hitung_luaran_tahun = $this->M_chart->hitung_luaran_tahun();
		
		foreach($hitung_dana2_upj_tahun as $row){ $tempDataGrafik1[] =$row->ttl_thn_abdi;} 
		foreach($hitung_dana_non2_upj_tahun as $row){ $tempDataGrafik2[] =$row->ttl_thn_nonabdi;} 
		foreach($hitung_hibah2_upj_tahun as $row){ $tempDataGrafik3[] =$row->ttl_thn_nonabdi_hibah;} 

		foreach($hitung_dana_upj_tahun as $row){ $tempDataGrafik4[] =$row->ttl_thn_liti;} 
		foreach($hitung_dana_non_upj_tahun as $row){ $tempDataGrafik5[] =$row->ttl_thn_nonliti;}
		foreach($hitung_hibah_upj_tahun as $row){ $tempDataGrafik6[] =$row->ttl_thn_nonliti_hibah;}
 
		foreach($hitung_jurnal_tahun as $row){ $tempDataGrafik7[] =$row->ttl_thn_jurnal;} 
		foreach($hitung_buku_tahun as $row){ $tempDataGrafik8[] =$row->ttl_thn_buku;} 
		foreach($hitung_prosiding_tahun as $row){ $tempDataGrafik9[] =$row->ttl_thn_prosiding;} 
		foreach($hitung_hki_tahun as $row){ $tempDataGrafik10[] =$row->ttl_thn_hki;} 
		foreach($hitung_luaran_tahun as $row){ $tempDataGrafik11[] =$row->ttl_thn_luaran;} 
		
		$cek = $this->db->count_all('tahun');
		for ($i=0; $i < $cek ; $i++) { 
			$g1abdi[$i] = $tempDataGrafik1[$i] + $tempDataGrafik2[$i] + $tempDataGrafik3[$i];
			$g1liti[$i] = $tempDataGrafik4[$i] + $tempDataGrafik5[$i] + $tempDataGrafik6[$i];
			$g1publi[$i] = $tempDataGrafik7[$i] + $tempDataGrafik8[$i] + $tempDataGrafik9[$i] + $tempDataGrafik10[$i] + $tempDataGrafik11[$i];
		}

		$jumlah_publikasi = $this->M_chart->hitung_publikasi();
		$jumlah_pemakalah = $this->M_chart->hitung_pemakalah();
		$jumlah_buku = $this->M_chart->hitung_buku();
		$jumlah_hki = $this->M_chart->hitung_hki();
		$jumlah_luaran = $this->M_chart->hitung_luaran();
		$jumlah_penelitian = $this->M_chart->hitung_dana_upj();
		$jumlah_penelitian_non = $this->M_chart->hitung_dana_non_upj();
		$jumlah_penelitian_hibah = $this->M_chart->hitung_hibah_upj();
		$jumlah_pengabdian = $this->M_chart->hitung_dana2_upj();
		$jumlah_pengabdian_non = $this->M_chart->hitung_dana_non2_upj();
		$jumlah_pengabdian_hibah = $this->M_chart->hitung_hibah2_upj();
		
		foreach($jumlah_publikasi as $row){ $jumpub1[] =$row->total_jurnal;}
		foreach($jumlah_pemakalah as $row){ $jumpub2[] =$row->total_makalah;}
		foreach($jumlah_buku as $row){ $jumpub3[] =$row->total_buku;}	
		foreach($jumlah_hki as $row){ $jumpub4[] =$row->total_hki;}	
		foreach($jumlah_luaran as $row){ $jumpub5[] =$row->total_luaran;}

		foreach($jumlah_penelitian as $row){ $jumpen1[] =$row->total_penelitian;}
		foreach($jumlah_penelitian_non as $row){ $jumpen2[] =$row->total_penelitian_non;} 
		foreach($jumlah_penelitian_hibah as $row){ $jumpen3[] =$row->total_penelitian_hibah;} 
		foreach($jumlah_pengabdian as $row){ $jumpen4[] =$row->total_pengabdian;}
		foreach($jumlah_pengabdian_non as $row){$jumpen5[] =$row->total_pengabdian_non;}
		foreach($jumlah_pengabdian_hibah as $row){$jumpen6[] =$row->total_pengabdian_hibah;}

		print_r($jumlah_publikasi);exit();

		for($i=0;$i<=9;$i++){
			if (empty($john1[$i])) {$jumpub1[$i]=0;}
			if (empty($john2[$i])) {$jumpub2[$i]=0;}
			if (empty($john3[$i])) {$jumpub3[$i]=0;}
			if (empty($john4[$i])) {$jumpub4[$i]=0;}
			if (empty($john5[$i])) {$jumpub5[$i]=0;}
			if (empty($jumpen1[$i])) { $jumpen1[$i]=0; }
			if (empty($jumpen2[$i])) { $jumpen2[$i]=0; }
			if (empty($jumpen3[$i])) { $jumpen3[$i]=0; }
			if (empty($jumpen4[$i])) { $jumpen4[$i]=0; }
			if (empty($jumpen5[$i])) { $jumpen5[$i]=0; }
			if (empty($jumpen6[$i])) { $jumpen6[$i]=0; }
			$total_penelitian[$i] = $jumpen1[$i] + $jumpen2[$i] + $jumpen3[$i];
			$total_pengabdiana[$i] = $jumpen4[$i] + $jumpen5[$i] + $jumpen6[$i];
			$total_publikasi[$i] = $jumpub1[$i] + $jumpub2[$i] + $jumpub3[$i] + $jumpub4[$i] + $jumpub5[$i];
		}

		$dataHalaman = array(   		
		  'da' => $kue,
		  'tampil_prodi' => $tampil_prodi,
		  'tampil_tahun' => $tampil_tahun,

		  'jml_raise_abdi' => $jml_raise_abdi,
		  'jml_raise_liti' => $jml_raise_liti,
		  'jml_raise_publi' => $jml_raise_publi,

		  'g1abdi' => $g1abdi,
		  'g1liti' => $g1liti,
		  'g1publi' => $g1publi,
		  //'jumba' => $total_top5,

		  'total_penelitian'=>$total_penelitian,
		  'total_pengabdiana'=>$total_pengabdiana,
		  'total_publikasi'=>$total_publikasi,
        );
		
		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('dashboard/v_dashboard',$dataHalaman);
		$this->load->view('dashboard/v_footer2');
	}
	
	public function index2() {
		$usan = $this->session->userdata('nama');
		$kue = $this->M_login->hak_ak($usan); 
		$tampil_prodi = $this->M_login->get_prodi();
		$tampil_tahun = $this->M_dokumen->tampil_tahun();
		//menghitung keseluruhan data pengabdian dan dimasukan ke total publikasi di halaman dashboard paling atas
		$raise_abdi = $this->db->count_all('t_dana2_upj');
		$raise_abdinon = $this->db->count_all('t_dana_non2_upj');
		$raise_abdihidik = $this->db->count_all('t_dana_kemenristek2');
		$jml_raise_abdi = $raise_abdi + $raise_abdinon + $raise_abdihidik;
		$raise_liti = $this->db->count_all('t_dana_upj');
		$raise_litinon = $this->db->count_all('t_dana_non_upj');
		$raise_litihidik = $this->db->count_all('t_dana_kemenristek');
		$jml_raise_liti = $raise_liti + $raise_litinon + $raise_litihidik;
		$raise_jurnal = $this->db->count_all('t_publikasi_jurnal');
		$raise_buku = $this->db->count_all('t_buku_ajar');
		$raise_forum = $this->db->count_all('t_forum_ilmiah');
		$raise_hki = $this->db->count_all('t_hki');
		$raise_luaran = $this->db->count_all('t_luaran_lain');
		$jml_raise_publi = $raise_jurnal + $raise_buku + $raise_forum + $raise_hki + $raise_luaran;

		//untuk membuat perhitungan dan membuat garis line pada dashboard grafik 1
		$hitung_dana2_upj_tahun = $this->M_chart->hitung_dana2_upj_tahun();
		$hitung_dana_non2_upj_tahun = $this->M_chart->hitung_dana_non2_upj_tahun();
		$hitung_dana_upj_tahun = $this->M_chart->hitung_dana_upj_tahun();
		$hitung_dana_non_upj_tahun = $this->M_chart->hitung_dana_non_upj_tahun();
		$hitung_jurnal_tahun = $this->M_chart->hitung_jurnal_tahun();
		$hitung_buku_tahun = $this->M_chart->hitung_buku_tahun();
		$hitung_prosiding_tahun = $this->M_chart->hitung_prosiding_tahun();
		$hitung_hki_tahun = $this->M_chart->hitung_hki_tahun();
		$hitung_luaran_tahun = $this->M_chart->hitung_luaran_tahun();
		
		foreach($hitung_dana2_upj_tahun as $row){ $yurika1[] =$row->ttl_thn_abdi;} 
		foreach($hitung_dana_non2_upj_tahun as $row){ $yurika2[] =$row->ttl_thn_nonabdi;} 
		foreach($hitung_dana_upj_tahun as $row){ $yurika3[] =$row->ttl_thn_liti;} 
		foreach($hitung_dana_non_upj_tahun as $row){ $yurika4[] =$row->ttl_thn_nonliti;}
 
		foreach($hitung_jurnal_tahun as $row){ $yurika5[] =$row->ttl_thn_jurnal;} 
		foreach($hitung_buku_tahun as $row){ $yurika6[] =$row->ttl_thn_buku;} 
		foreach($hitung_prosiding_tahun as $row){ $yurika7[] =$row->ttl_thn_prosiding;} 
		foreach($hitung_hki_tahun as $row){ $yurika8[] =$row->ttl_thn_hki;} 
		foreach($hitung_luaran_tahun as $row){ $yurika9[] =$row->ttl_thn_luaran;} 
		
		$cek = $this->db->count_all('tahun');
		for ($i=0; $i < $cek ; $i++) { 
			$g1abdi[$i] = $yurika1[$i] +$yurika2[$i];
			$g1liti[$i] = $yurika3[$i] +$yurika4[$i];
			$g1publi[$i] = $yurika5[$i] +$yurika6[$i] +$yurika7[$i] +$yurika8[$i] +$yurika9[$i];
		}

		$jumlah_publikasi = $this->M_dokumen->hitung_publikasi();
		$jumlah_pemakalah = $this->M_dokumen->hitung_pemakalah();
		$jumlah_buku = $this->M_dokumen->hitung_buku();
		$jumlah_hki = $this->M_dokumen->hitung_hki();
		$jumlah_luaran = $this->M_dokumen->hitung_luaran();
		$jumlah_penelitian = $this->M_dokumen->hitung_dana_upj();
		$jumlah_penelitian_non = $this->M_dokumen->hitung_dana_non_upj();
		$jumlah_pengabdian = $this->M_dokumen->hitung_dana2_upj();
		$jumlah_pengabdian_non = $this->M_dokumen->hitung_dana_non2_upj();

		foreach($jumlah_publikasi as $row){ $john1[] =$row->total_jurnal;}
		foreach($jumlah_pemakalah as $row){ $john2[] =$row->total_makalah;}
		foreach($jumlah_buku as $row){ $john3[] =$row->total_buku;}	
		foreach($jumlah_hki as $row){ $john4[] =$row->total_hki;}	
		foreach($jumlah_luaran as $row){ $john5[] =$row->total_luaran;}
		foreach($jumlah_penelitian as $row){ $cena1[] =$row->total_penelitian;}
		foreach($jumlah_penelitian_non as $row){ $cena2[] =$row->total_penelitian_non;} 
		foreach($jumlah_pengabdian as $row){ $cena3[] =$row->total_pengabdian;}
		foreach($jumlah_pengabdian_non as $row){$cena4[] =$row->total_pengabdian_non;}

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
			$total_semua[$i] = $john1[$i] + $john2[$i] + $john3[$i] + $john4[$i] + $john5[$i] + $cena1[$i] + $cena2[$i] + $cena3[$i] + $cena4[$i];
			$total_publikasi[$i] = $john1[$i] + $john2[$i] + $john3[$i] + $john4[$i] + $john5[$i];
			$total_penelitian[$i] = $cena1[$i] + $cena2[$i];
			$total_pengabdiana[$i] = $cena3[$i] + $cena4[$i];
		}
		$jo=1;
		foreach ($total_semua as $reg_dat) {
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
		  'g1abdi'=>$g1abdi,
		  'g1liti'=>$g1liti,
		  'g1publi'=>$g1publi,
		  'jml_raise_abdi'=>$jml_raise_abdi,
		  'jml_raise_liti'=>$jml_raise_liti,
		  'jml_raise_publi'=>$jml_raise_publi,
		  'total'=>$total_semua,
		  'total_publikasi'=>$total_publikasi,
		  'total_penelitian'=>$total_penelitian,
		  'total_pengabdiana'=>$total_pengabdiana,
		  'top_five'=>$top_5,
		  'jumba'=>$total_top5
        );
		//var_dump( $total_publikasi);
		//print("Total publikasi: ");print_r( $total_pengabdiana);     	print("<br><br>");
		//print_r($g1liti);
		//var_dump( $ttl);		print("<br><br>");
		//print_r( $john2);     	print("<br><br>");
		//print_r( $john3);     	print("<br><br>");
		//print("HKI: ");print_r( $john4);     	print("<br><br>");
		//print_r( $john5);     	print("<br><br>");
		//print("penelitian: ");print_r($cena1);     	print("<br><br>");
		//print("penelitian-non: ");print_r( $cena2);     	print("<br><br>");
		//print("pengabidan: ");print_r( $cena3);     	print("<br><br>");
		//print("pengabdian-non: ");print_r( $cena4);     	print("<br><br>");
		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('dashboard/v_dashboard',$dataHalaman);
		$this->load->view('dashboard/v_footer2');
	}
}

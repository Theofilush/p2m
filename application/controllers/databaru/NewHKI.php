<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewHKI extends CI_Controller {

	function __construct(){
    parent::__construct();      
    	if($this->session->userdata('status') != "login"){
      		redirect(site_url("login"));
    	}  	 
    }

	public function index(){
      $usan = $this->session->userdata('nama');
	  $kue = $this->M_login->hak_ak($usan); 
	  $query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 	  
	  $jenis_karya = $this->M_dokumen->tampil_jenishki();
	  $status_karya = $this->M_dokumen->tampil_statushki();
        $data_profil = array(           
		  'da' => $kue,
		  'tampil_tahun'=> $query_tampil_tahun,
		  'jenis_karya'=> $jenis_karya,
		  'status_karya' => $status_karya
        );          
		$this->load->view('dashboard/v_header',$data_profil);
		$this->load->view('tambahdata/v_add_hki'); 
		$this->load->view('dashboard/v_footer');
	}
	public function savedok(){     
		if($this->input->post('btnUpload') == "Upload"){				
					$_tahun = $this->input->post('tahun_publikasi', TRUE);
					$_judul = $this->input->post('judul', TRUE);
					$_jenis = $this->input->post('jenis', TRUE);
					$_no_daftar = $this->input->post('no_daftar', TRUE);
					$_status = $this->input->post('status', TRUE);
					$_no_hki = $this->input->post('no_hki', TRUE);	
					$_penulis = $this->input->post('pesan_penulis', TRUE);
					$_anggota1 = $this->input->post('pesan_penulis2', TRUE);
					$_anggota2 = $this->input->post('pesan_penulis3', TRUE);

					if(($_anggota1 == "") && ($_anggota2 != "")){
						$_anggota1 =$_anggota2;
						$_anggota2= NULL;
					}elseif($_anggota1 == ""){
						$_anggota1 = NULL;
					}
					if($_anggota2 == ""){
						$_anggota2 = NULL;
					}
							// $count=count($_kel_dok);
								//for ($i=0; $i <=$count-1 ; $i++) {}
					$data = array(
						'tahun_pelaksanaan' =>  $_tahun,
						'judul_hki' =>  $_judul,
						'jenis_hki' =>  $_jenis,
						'status_hki' =>  $_status,
						'no_hki' =>  $_no_hki,
						'no_pendaftaran'=>$_no_daftar,
						'nama_dosen' =>  $_penulis,
						'nama_dosen1' =>  $_anggota1,
						'nama_dosen2' =>  $_anggota2
						);       
					$query= $this->M_dokumen->simpanDok_hki($data);
					if ($query) {
						redirect(site_url('publikasi/HakKekayaanIntelektual'));
						//print_r($stan);
					}
					else{
						redirect(site_url('publikasi/HakKekayaanIntelektual'));
					}
		}								
	}

}

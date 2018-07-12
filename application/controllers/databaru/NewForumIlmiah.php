<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewForumIlmiah extends CI_Controller {

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
		$this->load->view('tambahdata/v_add_forum');
		$this->load->view('dashboard/v_footer');
	}
  public function savedok(){     
		if($this->input->post('btnUpload') == "Upload"){
					$_tingkat = $this->input->post('tingkat', TRUE);
					$_tahun_publikasi = $this->input->post('tahun_publikasi', TRUE);
					$_judul = $this->input->post('judul', TRUE);
					$_nama_forum = $this->input->post('nama_forum', TRUE);
					$_institusi = $this->input->post('institusi', TRUE);
					$_waktu_awal = $this->input->post('waktu_awal', TRUE);
					$_waktu_akhir = $this->input->post('waktu_akhir', TRUE);
					$_tempat = $this->input->post('tempat', TRUE);
					$_status = $this->input->post('status', TRUE);
					$_penulis = $this->input->post('penulis', TRUE);
					$_anggota1 = $this->input->post('anggota1', TRUE);
					$_anggota2 = $this->input->post('anggota2', TRUE);

					if(($_anggota1 === "") && ($_anggota2 !== "")){
						$_anggota1 =$this->input->post('anggota2', TRUE);
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
						'cakupan_forum_ilmiah' => $_tingkat,
						'tahun_pelaksanaan' =>  $_tahun_publikasi,
						'judul_makalah' =>  $_judul,
						'nama_forum' =>  $_nama_forum,
						'institusi_penyelenggara' =>  $_institusi,
						'waktu_pelakasana_awal' =>  $_waktu_awal,
						'waktu_pelakasana_akhir' =>  $_waktu_akhir,
						'tempat_pelaksana' =>  $_tempat,
						'status_pemakalah' =>  $_status,
						'nama_dosen' =>  $_penulis,
						'nama_dosen1' =>  $_anggota1,
						'nama_dosen2' =>  $_anggota2
					);       
					$query= $this->M_dokumen->simpanDok_pemakalah($data);
					if ($query) {
							redirect(site_url('publikasi/pemakalah'));
								//print_r($stan);
					}
					else{
							redirect(base_url('publikasi/pemakalah'));
					}
					
		}
					
	}
}

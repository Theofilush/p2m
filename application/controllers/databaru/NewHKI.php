<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewHKI extends CI_Controller {

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
						'tahun_pelaksanaan' =>  $_tahun,
						'judul_hki' =>  $_judul,
						'jenis_hki' =>  $_jenis,
						'status_hki' =>  $_status,						
						'nama_dosen' =>  $_penulis,
						'nama_dosen1' =>  $_anggota1,
						'nama_dosen2' =>  $_anggota2
						);       
					$query= $this->M_dokumen->simpanDok_hki($data);
					if ($query) {
						redirect(site_url('publikasi/LuaranLain'));
						//print_r($stan);
					}
					else{
						redirect(base_url('publikasi/LuaranLain'));
					}
		}								
	}

}

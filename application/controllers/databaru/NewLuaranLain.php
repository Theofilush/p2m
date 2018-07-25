<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewLuaranLain extends CI_Controller {

	function __construct(){
    parent::__construct();      
    	if($this->session->userdata('status') != "login"){
      		redirect(base_url("login"));
    	}  	 
    }
    
	public function index(){
      $usan = $this->session->userdata('nama');
	  $kue = $this->M_login->hak_ak($usan); 
	  $query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 
	  $jenis = $this->M_dokumen->tampil_jenis_luaran(); 
        $data_profil = array(           
		  'da' => $kue,  
		  'tampil_tahun'=> $query_tampil_tahun,
		  'jenis_luaran'=> $jenis
        );          
		$this->load->view('dashboard/v_header',$data_profil);
		$this->load->view('tambahdata/v_add_luaran');
		$this->load->view('dashboard/v_footer');
	}
	public function savedok(){     
		if($this->input->post('btnUpload') == "Upload"){					
					$_tahun = $this->input->post('tahun', TRUE);
					$_judul = $this->input->post('judul', TRUE);				
					$_jenis = $this->input->post('jenis', TRUE);
					$_deskripsi = $this->input->post('deskripsi', TRUE);
					$_nama_dosen = $this->input->post('pesan_penulis', TRUE);
					$_anggota1 = $this->input->post('pesan_penulis2', TRUE);
					$_anggota2 = $this->input->post('pesan_penulis3', TRUE);

					if(($_anggota1 === "") && ($_anggota2 !== "")){
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
						'judul_luaran' =>  $_judul,
						'jenis_luaran' =>  $_jenis,
						'deskripsi' =>  $_deskripsi,
						'nama_dosen' =>  $_nama_dosen,
						'nama_dosen1' =>  $_anggota1,
						'nama_dosen2' =>  $_anggota2
								);       
									$query= $this->M_dokumen->simpanDok_luaran($data);
							if ($query) {
									redirect(site_url('publikasi/luaranlain'));
								//print_r($stan);
							}
							else{
									redirect(base_url('publikasi/luaranlain'));
							}
		}
					
	}

}

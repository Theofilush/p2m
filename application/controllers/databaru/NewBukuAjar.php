<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewBukuAjar extends CI_Controller {

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
        $data_profil = array(
		  'da' => $kue,         
		  'tampil_tahun'=> $query_tampil_tahun
        );          
		$this->load->view('dashboard/v_header',$data_profil);
		$this->load->view('tambahdata/v_add_buku');
		$this->load->view('dashboard/v_footer');
	}
	public function savedok(){     
		if($this->input->post('btnUpload') == "Upload"){				
					$_tahun_penerbitan = $this->input->post('tahun_penerbitan', TRUE);
					$_judul = $this->input->post('judul', TRUE);
					$_isbn = $this->input->post('isbn', TRUE);
					$_jumlah = $this->input->post('jumlah', TRUE);
					$_penerbit = $this->input->post('penerbit', TRUE);
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
						'tahun_penerbitan' =>  $_tahun_penerbitan,
						'judul' =>  $_judul,
						'isbn' =>  $_isbn,
						'jumlah_halaman' =>  $_jumlah,
						'penerbit' =>  $_penerbit,
						'nama_dosen' =>  $_penulis,
						'nama_dosen1' =>  $_anggota1,
						'nama_dosen2' =>  $_anggota2
					);       
					$query= $this->M_dokumen->simpanDok_buku($data);
					if ($query) {
						redirect(site_url('publikasi/bukuajar'));
						//print_r($stan);
					}
					else{
						redirect(base_url('publikasi/bukuajar'));
					}
		}				
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddYear extends CI_Controller {

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
		$dataHalaman = array(   		
		  'da' => $kue,
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('dashboard/v_add_year');
		$this->load->view('dashboard/v_footer');
	}
	public function savedok(){     
		if($this->input->post('btnUpload') == "Upload"){				
					$_tahun_penerbitan = $this->input->post('tahun_penerbitan', TRUE);
					$_judul = $this->input->post('judul', TRUE);
					$_isbn = $this->input->post('isbn', TRUE);
					$_jumlah = $this->input->post('jumlah', TRUE);
					$_penerbit = $this->input->post('penerbit', TRUE);
					$_penulis = $this->input->post('pesan_penulis', TRUE); 
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
						redirect(site_url('publikasi/BukuAjar'));
						//print_r($stan);
					}
					else{
						redirect(site_url('publikasi/BukuAjar'));
					}
		}				
	}
}

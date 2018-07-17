<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuAjar extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_buku();
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 

		$dataHalaman = array(   
		  'query'=> $query,
          'da' => $kue,
		  'tampil_tahun'=> $query_tampil_tahun, 
        );
 
		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('publikasi/v_buku_ajar');
		$this->load->view('dashboard/v_footer');
	}

	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
			$_tahun_penerbitan = $this->input->post('tahun_penerbitan', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_isbn = $this->input->post('isbn', TRUE);
			$_jumlah = $this->input->post('jumlah', TRUE);
			$_penerbit = $this->input->post('penerbit', TRUE);
			$_penulis = $this->input->post('penulis', TRUE);
			$_anggota1 = $this->input->post('anggota1', TRUE);
			$_anggota2 = $this->input->post('anggota2', TRUE);
			$id = $this->input->post('id', TRUE);
			if(($_anggota1 === "") && ($_anggota2 !== "")){
				$_anggota1 =$this->input->post('anggota2', TRUE);
				$_anggota2= NULL;
			}elseif($_anggota1 == ""){
				$_anggota1 = NULL;
			}
			if($_anggota2 == ""){
				$_anggota2 = NULL;
			}
          
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
              $query= $this->M_dokumen->updateDok_buku($data,$id);
           
         
          if ($query) {
            redirect("publikasi/bukuajar");
          }
          else{           
            redirect("publikasi/bukuajar");
          }
        }
    } 
}

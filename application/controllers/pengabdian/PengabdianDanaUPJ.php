<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengabdianDanaUPJ extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_dana2_upj();
		$query_tampilJenis = $this->M_dokumen->tampil_jenis_pengabdian();
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 
 

		$dataHalaman = array(   
		  'query'=>$query,
		  'da' => $kue ,
		  'tampil_tahun'=> $query_tampil_tahun,
		  'tampil_jenis'=> $query_tampilJenis 
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('pengabdian/v_dana_abdi_pj');
		$this->load->view('dashboard/v_footer');
	}

	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
			$_tahun_kegiatan = $this->input->post('tahun_kegiatan', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_jenis = $this->input->post('jenis', TRUE);
			$_dana_usulan = $this->input->post('dana_usulan', TRUE);
			$_dana_setujui = $this->input->post('dana_setujui', TRUE);				
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
				'tahun_hibah' =>  $_tahun_kegiatan,
				'judul_penelitian' =>  $_judul,
				'jenis_penelitian' =>  $_jenis,
				'dana_usulan' =>  $_dana_usulan,
				'dana_disetujui' =>  $_dana_setujui,
				'ketua_peneliti' =>  $_penulis,
				'anggota_peneliti_1' =>  $_anggota1,
				'anggota_peneliti_2' =>  $_anggota2
              );              
              $query= $this->M_dokumen->updateDok_dana2_upj($data,$id);
           
         
          if ($query) {
            redirect("pengabdian/PengabdianDanaUPJ");
          }
          else{
            redirect("pengabdian/PengabdianDanaUPJ");
          }
        }
    } 
}

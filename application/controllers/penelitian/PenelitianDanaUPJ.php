<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenelitianDanaUPJ extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_dana_upj();
		$query_tampil_jenis = $this->M_dokumen->tampil_jenis_penelitian(); 
		$query_tampil_skema = $this->M_dokumen->tampil_skema_penelitian(); 
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 

 
		$dataHalaman = array(   
		  'query'=>$query, 
          'da' => $kue,	
		  'tampil_skema'=>$query_tampil_skema,
		  'tampil_tahun'=> $query_tampil_tahun,
		  'tampil_jenis'=> $query_tampil_jenis
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('penelitian/v_dana_pen_pj');
		$this->load->view('dashboard/v_footer');
	}
	public function updatedok(){
		if ($this->input->post('btnUpload') == "Upload") {
			$_tahun_kegiatan = $this->input->post('tahun_kegiatan', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_skema = $this->input->post('skema', TRUE);				
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
						'skema_penelitian' =>  $_skema,
						'jenis_penelitian' =>  $_jenis,
						'dana_usulan' =>  $_dana_usulan,
						'dana_disetujui' =>  $_dana_setujui,
						'ketua_peneliti' =>  $_penulis,
						'anggota_peneliti_1' =>  $_anggota1,
						'anggota_peneliti_2' =>  $_anggota2
					);              
					$query= $this->M_dokumen->updateDok_dana_upj($data,$id);
			if ($query) {
				redirect("penelitian/PenelitianDanaUPJ");
			}
			else{
				redirect("penelitian/PenelitianDanaUPJ");
			}
		}
	}
	public function deletedok($id){
		$this->M_dokumen->deleteDok_dana_upj($id);
		redirect('penelitian/PenelitianDanaUPJ');
	} 
	public function validasi($id){            
		$query= $this->M_dokumen->validasi_dana_upj($id);        
		if ($query) {
		  redirect("penelitian/PenelitianDanaUPJ");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
		  redirect("penelitian/PenelitianDanaUPJ");
		}
  } 

}

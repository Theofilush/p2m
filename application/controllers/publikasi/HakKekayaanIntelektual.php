<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HakKekayaanIntelektual extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_hki();		
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 
		$jenis_karya = $this->M_dokumen->tampil_jenishki();
		$status_karya = $this->M_dokumen->tampil_statushki();
		$query_tampil_dosen = $this->M_dokumen->tampil_dosen(); 
		$dataHalaman = array(   
		  'query'=>$query,
		  'da' => $kue,
		  'tampil_tahun'=> $query_tampil_tahun,		  
		  'jenis_karya'=> $jenis_karya,
			'status_karya' => $status_karya,
			'tampil_dosen'=>$query_tampil_dosen
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('publikasi/v_hki');
		$this->load->view('dashboard/v_footer');
	}
	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
			$_tahun = $this->input->post('tahun_publikasi', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_jenis = $this->input->post('jenis', TRUE);
			$_no_daftar = $this->input->post('no_daftar', TRUE);
			$_status = $this->input->post('status', TRUE);
			$_no_hki = $this->input->post('no_hki', TRUE);	
			$_penulis = $this->input->post('pesan_penulis', TRUE);
			$_anggota1 = $this->input->post('pesan_penulis3', TRUE);
			$_anggota2 = $this->input->post('pesan_penulis3', TRUE);
			$id = $this->input->post('id', TRUE);
			if(($_anggota1 == "") && ($_anggota2 != "")){
				$_anggota1 =$_anggota2;
				$_anggota2= NULL;
			}elseif($_anggota1 == ""){
				$_anggota1 = NULL;
			}
			if($_anggota2 == ""){
				$_anggota2 = NULL;
			}
      $data = array(
				'tahun_pelaksanaan' =>  $_tahun,
				'judul_hki' =>  $_judul,
				'jenis_hki' =>  $_jenis,
				'status_hki' =>  $_status,
				'no_hki' =>  $_no_hki,
				'nama_dosen' =>  $_penulis,
				'nama_dosen1' =>  $_anggota1,
				'nama_dosen2' =>  $_anggota2
      );              
      $query= $this->M_dokumen->updateDok_hki($data,$id);   
          if ($query) {
            redirect("publikasi/HakKekayaanIntelektual");
          }
          else{
            redirect("publikasi/HakKekayaanIntelektual");
          }
        }
	}
	public function deletedok($id){
		$this->M_dokumen->deleteDok_hki($id);
		redirect('publikasi/HakKekayaanIntelektual');
	} 
	public function validasi($id){            
		$query= $this->M_dokumen->validasi_hki($id);        
		if ($query) {
		  redirect("publikasi/HakKekayaanIntelektual");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
		  redirect("publikasi/HakKekayaanIntelektual");
		}
	} 
	public function uploaddok(){     
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/hki/';
			$config['allowed_types'] = 'pdf';
			$this->load->library('upload', $config);                
			if ( ! $this->upload->do_upload('filepdf')){
				$this->session->set_flashdata('notification', '<div class="alert alert-danger alert-dismissible fade in pull-right" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<strong>Gagal Melakukan Upload!</strong> 
			  </div>');
				$error = array('error' => $this->upload->display_errors());							
			}
			else{
				$data = array('upload_data' => $this->upload->data());                
			}			
			$id = $this->input->post('id', TRUE);
			$_upload = $this->upload->data('file_name');
			$query= $this->M_dokumen->uploadDok_hki($_upload,$id);
				if ($query) {
						redirect(site_url('publikasi/HakKekayaanIntelektual'));
					}
					else{
						redirect(site_url('publikasi/HakKekayaanIntelektual'));
					}
		}					
	}

}

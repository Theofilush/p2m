<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakalah extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_pemakalah();
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun();
		$cakupan2 =  $this->M_dokumen->tampil_cakupan2();
		$status = $this->M_dokumen->status_pemakalah();

		$dataHalaman = array(  
		  'query' =>$query,
		  'da' => $kue,
		  'tampil_tahun'=> $query_tampil_tahun,
		  'cakupan2'=> $cakupan2,
		  'status_speaker'=> $status
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('publikasi/v_pemakalah');
		$this->load->view('dashboard/v_footer');
	}
	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
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
			$id = $this->input->post('id', TRUE);
			if(($_anggota1 === "") && ($_anggota2 !== "")){
				$_anggota1 =$_anggota2;
				$_anggota2= NULL;
			}elseif($_anggota1 == ""){
				$_anggota1 = NULL;
			}
			if($_anggota2 == ""){
				$_anggota2 = NULL;
			}
          
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
              $query= $this->M_dokumen->updateDok_pemakalah($data,$id);
           
         
          if ($query) {
            redirect("publikasi/pemakalah");
          }
          else{
            redirect("publikasi/pemakalah");
          }
        }
	} 
	public function deletedok($id){
		$this->M_dokumen->deleteDok_pemakalah($id);
		redirect('publikasi/Pemakalah');
	}
	public function validasi($id){            
		$query= $this->M_dokumen->validasi_pemakalah($id);        
		if ($query) {
		  redirect("publikasi/pemakalah");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
		  redirect("publikasi/pemakalah");
		}
	}
	public function uploaddok(){     
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/pemakalah/';
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
			$query= $this->M_dokumen->uploadDok_pemakalah($_upload,$id);
			if ($query) {
						redirect(site_url('publikasi/pemakalah'));
					}
					else{
						redirect(base_url('publikasi/pemakalah'));
					}
		}					
	}
	  
}

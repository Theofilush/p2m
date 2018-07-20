<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublikasiJurnal extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_publikasi();		
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 
		$cakupan =  $this->M_dokumen->tampil_cakupan(); 

		$dataHalaman = array( 
		  'query' =>  $query,
		  'da' => $kue,
		  'tampil_tahun'=> $query_tampil_tahun,
		  'cakupan'=> $cakupan,
		  'error'=> ''
        );
		$datacontent = array( 
			'da' => $kue
		  );
		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('publikasi/v_publikasi',$datacontent);
		$this->load->view('dashboard/v_footer');
	}
	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
			$_tingkat = $this->input->post('tingkat', TRUE);
			$_tahun_publikasi = $this->input->post('tahun_publikasi', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_nama_jurnal = $this->input->post('nama_jurnal', TRUE);
			$_issn = $this->input->post('issn', TRUE);
			$_volume = $this->input->post('volume', TRUE);
			$_nomor = $this->input->post('nomor', TRUE);
			$_halaman_awal = $this->input->post('halaman_awal', TRUE);
			$_halaman_akhir = $this->input->post('halaman_akhir', TRUE);
			$_url = $this->input->post('url', TRUE);
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
				'cakupan_publikasi' => $_tingkat,
				'tahun_penerbitan' =>  $_tahun_publikasi,
				'judul' =>  $_judul,
				'nama_jurnal' =>  $_nama_jurnal,
				'issn' =>  $_issn,
				'volume' =>  $_volume,
				'nomor' =>  $_nomor,
				'halaman_awal' =>  $_halaman_awal,
				'halaman_akhir' =>  $_halaman_akhir,
				'url' =>  $_url,
				'penulis_publikasi' =>  $_penulis,
				'penulis_anggota1' =>  $_anggota1,
				'penulis_anggota2' =>  $_anggota2
              );              
          $query= $this->M_dokumen->updateDok_publikasi($data,$id);
          if ($query) {
            redirect("publikasi/publikasijurnal");
          }
          else{
			$this->session->set_flashdata('notification', 'Gagal Melakukan Update');	
            redirect("publikasi/publikasijurnal");
          }
        }
	} 
	public function deletedok($id){		
		$this->M_dokumen->deleteDok_publikasi($id);
		redirect('publikasi/publikasijurnal');
	}
	public function validasi($id){            
          $query= $this->M_dokumen->validasi_publikasi($id);        
          if ($query) {
            redirect("publikasi/publikasijurnal");
          }
          else{
			$this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
            redirect("publikasi/publikasijurnal");
          }
	} 
	public function uploaddok(){     
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/publikasi_jurnal/';
			$config['allowed_types'] = 'pdf';
			$this->load->library('upload', $config);                
			$id = $this->input->post('id', TRUE);
			$_upload = $this->upload->data('file_name');
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
				$query= $this->M_dokumen->uploadDok_publikasi($_upload,$id);
			}			
					if ($query) {
						redirect(site_url('publikasi/publikasijurnal'));
					}
					else{
						redirect(base_url('publikasi/publikasijurnal'));
					}
		}					
	}
 
}


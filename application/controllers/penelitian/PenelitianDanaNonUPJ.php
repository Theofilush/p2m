<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenelitianDanaNonUPJ extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_dana_non_upj();
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 
 
		$dataHalaman = array(  
		  'query'=>$query,		
		  'da' => $kue,
		  'tampil_tahun'=> $query_tampil_tahun
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('penelitian/v_dana_pen_non_pj');
		$this->load->view('dashboard/v_footer');
	} 

	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
			$_tahun_kegiatan = $this->input->post('tahun_kegiatan', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_sumber_dana = $this->input->post('sumber_dana', TRUE);
			$_besaran_dana = $this->input->post('besaran_dana', TRUE);							
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
				'tahun_penelitian' =>  $_tahun_kegiatan,
				'judul' =>  $_judul,
				'sumber_dana' =>  $_sumber_dana,
				'besaran_dana' =>  $_besaran_dana,
				'ketua_peneliti' =>  $_penulis,
				'anggota_peneliti_1' =>  $_anggota1,
				'anggota_peneliti_2' =>  $_anggota2
              );              
              $query= $this->M_dokumen->updateDok_dana_non_upj($data,$id);
           
         
          if ($query) {
            redirect("penelitian/PenelitianDanaNonUPJ");
          }
          else{
            redirect("penelitian/PenelitianDanaNonUPJ");
          }
        }
	} 
	public function deletedok($id){
		$this->M_dokumen->deleteDok_dana_non_upj($id);
		redirect('penelitian/PenelitianDanaNonUPJ');
	}
	public function validasi($id){            
		$query= $this->M_dokumen->validasi_dana_non_upj($id);        
		if ($query) {
		  redirect("penelitian/PenelitianDanaNonUPJ");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
		  redirect("penelitian/PenelitianDanaNonUPJ");
		}
	} 
	public function uploaddok(){     
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/penelitian_non_upj/';
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
				$query= $this->M_dokumen->uploadDok_dana_non_upj($_upload,$id);
			}			
					if ($query) {
						redirect(site_url('penelitian/PenelitianDanaNonUPJ'));
					}
					else{
						redirect(base_url('penelitian/PenelitianDanaNonUPJ'));
					}
		}					
	}

}

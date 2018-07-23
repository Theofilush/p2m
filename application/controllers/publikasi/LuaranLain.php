<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LuaranLain extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_luaran();
		$jenis = $this->M_dokumen->tampil_jenis_luaran(); 
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 		

		$dataHalaman = array( 
		  'query'  =>$query,
		  'da' => $kue,
		  'tampil_tahun'=> $query_tampil_tahun,
		  'jenis_luaran' =>  $jenis,
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('publikasi/v_luaran_lain');
		$this->load->view('dashboard/v_footer');
	}
	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
			$_tahun = $this->input->post('tahun', TRUE);
			$_judul = $this->input->post('judul', TRUE);				
			$_jenis = $this->input->post('jenis', TRUE);
			$_deskripsi = $this->input->post('deskripsi', TRUE);
			$_nama_dosen = $this->input->post('penulis', TRUE);
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
				'tahun_pelaksanaan' =>  $_tahun,
						'judul_luaran' =>  $_judul,
						'jenis_luaran' =>  $_jenis,
						'deskripsi' =>  $_deskripsi,
						'nama_dosen' =>  $_nama_dosen,
						'nama_dosen1' =>  $_anggota1,
						'nama_dosen2' =>  $_anggota2
              );              
              $query= $this->M_dokumen->updateDok_luaran($data,$id);
           
         
          if ($query) {
            redirect("publikasi/luaranlain");
          }
          else{
            redirect("publikasi/luaranlain");
          }
        }
	} 
	public function deletedok($id){
		$this->M_dokumen->deleteDok_luaran($id);
		redirect('publikasi/LuaranLain');
	}
	public function validasi($id){            
		$query= $this->M_dokumen->validasi_luaran($id);        
		if ($query) {
		  redirect("publikasi/LuaranLain");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
		  redirect("publikasi/LuaranLain");
		}
	 } 
	 public function uploaddok(){     
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/luaranlain/';
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
			$query= $this->M_dokumen->uploadDok_luaran($_upload,$id);
					if ($query) {
						redirect(site_url('publikasi/luaranlain'));
					}
					else{
						redirect(base_url('publikasi/luaranlain'));
					}
		}					
	}

}

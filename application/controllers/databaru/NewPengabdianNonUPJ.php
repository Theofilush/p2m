<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewPengabdianNonUPJ extends CI_Controller {

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
		  'tampil_tahun'=> $query_tampil_tahun,
        );          
		$this->load->view('dashboard/v_header',$data_profil);
		$this->load->view('tambahdata/v_add_abdi_non_upj');
		$this->load->view('dashboard/v_footer');
	}
  public function savedok(){     
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/pengabdian_non_upj/';
			$config['allowed_types'] = 'pdf';
			$this->load->library('upload', $config);                
			if ( ! $this->upload->do_upload('filepdf')){
			  	$error = array('error' => $this->upload->display_errors());			
			}
			else{
				 $data = array('upload_data' => $this->upload->data());                              
			}
					$_tahun_kegiatan = $this->input->post('tahun_kegiatan', TRUE);
					$_judul = $this->input->post('judul', TRUE);
					$_sumber_dana = $this->input->post('sumber_dana', TRUE);
					$_besaran_dana = $this->input->post('besaran_dana', TRUE);				
					$_upload = $this->upload->data('file_name');
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
						'tahun_penelitian' =>  $_tahun_kegiatan,
						'judul' =>  $_judul,
						'sumber_dana' =>  $_sumber_dana,
						'besaran_dana' =>  $_besaran_dana,
						'file' =>  $_upload,
						'ketua_peneliti' =>  $_penulis,
						'anggota_peneliti_1' =>  $_anggota1,
						'anggota_peneliti_2' =>  $_anggota2
					);       
					$query= $this->M_dokumen->simpanDok_dana_non2_upj($data);
					if ($query) {
						redirect(site_url('pengabdian/PengabdianDanaNonUPJ'));
						//print_r($stan);
					}
					else{
						redirect(base_url('pengabdian/PengabdianDanaNonUPJ'));
					}
		}					
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewPenelitianUPJ extends CI_Controller {

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
	  $query_tampil_jenis = $this->M_dokumen->tampil_jenis_penelitian(); 	
	  $query_tampil_skema = $this->M_dokumen->tampil_skema_penelitian(); 	
        $data_profil = array(           
		  'da' => $kue,         
		  'tampil_tahun'=> $query_tampil_tahun,
		  'tampil_jenis'=> $query_tampil_jenis,
		  'tampil_skema'=>$query_tampil_skema
        );          
		$this->load->view('dashboard/v_header',$data_profil);
		$this->load->view('tambahdata/v_add_pen_upj');
		$this->load->view('dashboard/v_footer');
	}
	public function savedok(){     
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/penelitian_upj/';
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
			$_jenis = $this->input->post('jenis', TRUE);
			$_dana_usulan = $this->input->post('dana_usulan', TRUE);
			$_dana_setujui = $this->input->post('dana_setujui', TRUE);
			$_upload = $this->upload->data('file_name');
			$_skema = $this->input->post('skema', TRUE);				
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
						'tahun_hibah' =>  $_tahun_kegiatan,
						'judul_penelitian' =>  $_judul,
						'jenis_penelitian' =>  $_jenis,
						'dana_usulan' =>  $_dana_usulan,
						'dana_disetujui' =>  $_dana_setujui,						
						'file'=> $_upload,
						'skema_penelitian' =>  $_skema,
						'ketua_peneliti' =>  $_penulis,
						'anggota_peneliti_1' =>  $_anggota1,
						'anggota_peneliti_2' =>  $_anggota2
					);       
					$query= $this->M_dokumen->simpanDok_dana_upj($data);
					if ($query) {
						redirect(site_url('penelitian/PenelitianDanaUPJ'));
						//print_r($stan);
					}
					else{
						redirect(base_url('penelitian/PenelitianDanaUPJ'));
					}
		}					
	}

}

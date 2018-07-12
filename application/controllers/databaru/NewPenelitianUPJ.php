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
        $data_profil = array(           
          'da' => $kue,         
        );          
		$this->load->view('dashboard/v_header',$data_profil);
		$this->load->view('tambahdata/v_add_pen_upj');
		$this->load->view('dashboard/v_footer');
	}
	public function savedok(){     
		if($this->input->post('btnUpload') == "Upload"){
					$_tahun_kegiatan = $this->input->post('tahun_kegiatan', TRUE);
					$_judul = $this->input->post('judul', TRUE);
					$_jenis = $this->input->post('jenis', TRUE);
					$_dana_usulan = $this->input->post('dana_usulan', TRUE);
					$_dana_setujui = $this->input->post('dana_setujui', TRUE);
					$_upload = $this->input->post('upload', TRUE);
					$_skema = $this->input->post('skema', TRUE);				
					$_penulis = $this->input->post('penulis', TRUE);
					$_anggota1 = $this->input->post('anggota1', TRUE);
					$_anggota2 = $this->input->post('anggota2', TRUE);

					if(($_anggota1 === "") && ($_anggota2 !== "")){
						$_anggota1 =$this->input->post('anggota2', TRUE);
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
						'file' =>  $_upload,
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

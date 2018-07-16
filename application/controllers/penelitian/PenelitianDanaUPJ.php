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
 
		$dataHalaman = array(   
		  'query'=>$query,
          'da' => $kue   
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('penelitian/v_dana_pen_pj');
		$this->load->view('dashboard/v_footer');
	}
	public function saveupdateuser(){
        if ($this->input->post('btnSimpan') == "Simpan") {
			$_tahun_kegiatan = $this->input->post('tahun_kegiatan', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_jenis = $this->input->post('jenis', TRUE);
			$_dana_usulan = $this->input->post('dana_usulan', TRUE);
			$_dana_setujui = $this->input->post('dana_setujui', TRUE);
			$_upload = $this->upload->data('file_name');
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
          else{
            if ($_password == $_cpassword) {
              //kumpulkan seua inputan kedalam array
              $data = array(
                'tahun_hibah' =>  $_tahun_kegiatan,
				'judul_penelitian' =>  $_judul,
				'jenis_penelitian' =>  $_jenis,
				'dana_usulan' =>  $_dana_usulan,
				'dana_disetujui' =>  $_dana_setujui,										
				'skema_penelitian' =>  $_skema,
				'ketua_peneliti' =>  $_penulis,
				'anggota_peneliti_1' =>  $_anggota1,
				'anggota_peneliti_2' =>  $_anggota2
              );              
              $query= $this->M_dokumen->simpanUpdateUser($data,$id);
            }
            else{
              //jika password tidak sama
            }
          }
          //load model user         
          $query= $this->M_pengguna->simpanUpdateUser($data,$id);
          if ($query) {
            redirect('pengguna/users');
          }
          else{
            $this->session->set_flashdata('notification_password', '<div class="col-xs-5 alert alert-danger alert-dismissible pull-right">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-ban"></i> Password konfirmasi tidak cocok!</p>
                
                  </div>');
            redirect('pengguna/users');
          }
        }
    } 

}

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
		  'cakupan'=> $cakupan
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('publikasi/v_publikasi');
		$this->load->view('dashboard/v_footer');
	}
	public function savedok(){
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
              $query= $this->M_dokumen->UpdateDok_publikasi($data,$id);
           
         
          if ($query) {
            redirect(site_url("login"));
          }
          else{
            $this->session->set_flashdata('notification_password', '<div class="col-xs-5 alert alert-danger alert-dismissible pull-right">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-ban"></i> Password konfirmasi tidak cocok!</p>
                
                  </div>');
            redirect(site_url("login"));
          }
        }
    } 

}


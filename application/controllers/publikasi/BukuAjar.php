<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuAjar extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_buku();
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 
		$query_tampil_nidn = $this->M_dokumen->tampil_nidn(); 
		$query_tampil_dosen = $this->M_dokumen->tampil_dosen(); 

		$dataHalaman = array(   
		  'query'=> $query,
          'da' => $kue,
			'tampil_tahun'=> $query_tampil_tahun, 
			'tampil_nidn'=>$query_tampil_nidn,
			'tampil_dosen'=>$query_tampil_dosen
    );
 
		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('publikasi/v_buku_ajar');
		$this->load->view('dashboard/v_footer');
	}

	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
			$_tahun_penerbitan = $this->input->post('tahun_penerbitan', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_isbn = $this->input->post('isbn', TRUE);
			$_jumlah = $this->input->post('jumlah', TRUE);
			$_penerbit = $this->input->post('penerbit', TRUE);
			$_penulis = $this->input->post('pesan_penulis', TRUE);
			$_anggota1 = $this->input->post('pesan_penulis2', TRUE);
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
				'tahun_penerbitan' =>  $_tahun_penerbitan,
				'judul' =>  $_judul,
				'isbn' =>  $_isbn,
				'jumlah_halaman' =>  $_jumlah,
				'penerbit' =>  $_penerbit,
				'nama_dosen' =>  $_penulis,
				'nama_dosen1' =>  $_anggota1,
				'nama_dosen2' =>  $_anggota2
              );              
              $query= $this->M_dokumen->updateDok_buku($data,$id);
           
         
          if ($query) {
            redirect("publikasi/bukuajar");
          }
          else{           
            redirect("publikasi/bukuajar");
          }
        }
	}
	
	public function deletedok($id){
		$this->M_dokumen->deleteDok_buku($id);
		redirect('publikasi/BukuAjar');
	}
	public function validasi($id){            
		$query= $this->M_dokumen->validasi_buku($id);        
		if ($query) {
		  redirect("publikasi/BukuAjar");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
		  redirect("publikasi/BukuAjar");
		}
 	} 
	 function cek_status_user(){
				$_nidn = $this->input->post('penulis', TRUE);         
        $hasil_penulis = $this->M_login->cek_nidn($_nidn); 
        if(count($hasil_penulis)!=0){
          # kalau value $hasil_username tidak 0
									# echo 1 untuk pertanda username sudah ada pada db  
						$data = $this->db->query("SELECT username FROM t_login where NIDN = ".$_nidn);
           foreach ($data->result_array() as $roe) {
                echo $roe['username'];                
					 }  
					 //$kkk="5";
                       // echo $kkk; 
        }else IF (count($hasil_penulis)==0) {
                  # kalu value $hasil_username = 0
                  # echo 2 untuk pertanda username belum ada pada db
            echo "1";
				}    
				
		}

}

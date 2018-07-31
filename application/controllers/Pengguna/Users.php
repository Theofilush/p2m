<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$query = $this->M_pengguna->listAll_user();
		$tampil_prodi = $this->M_pengguna->tampilprodi();
 
		$dataHalaman = array(   		
			'query'=> $query,
		  'da' => $kue,
		  'tampil_prodi'=>$tampil_prodi
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('pengguna/v_user');
		$this->load->view('dashboard/v_footer');
	}
	public function updateUser(){
        if ($this->input->post('btnSimpan') == "Simpan") {
		  $_nidn = $this->input->post('nidn', TRUE);
		  $_username = $this->input->post('username', TRUE);
		  $_prodi = $this->input->post('prodi', TRUE);
          $_email = $this->input->post('email', TRUE);
          $_password = $this->input->post('password', TRUE);
          $_cpassword = $this->input->post('cpassword', TRUE);
          $id = $this->input->post('id', TRUE);         
          if($_password == ""){
            $data = array(
			  'NIDN' => $_nidn,
			  'username' => $_username,
			  'prodi' => $_prodi,
              'email'=> $_email
            );
			$query= $this->M_pengguna->simpanUpdateUser($data,$id);
          }
          else{
            if ($_password == $_cpassword) {
              //kumpulkan seua inputan kedalam array
              $data = array(
                'username' => $_username,
                'email'=> $_email,
                'password'=> get_hash($_password), 
              );              
              $query= $this->M_pengguna->simpanUpdateUser($data,$id);
            }
            else{
			  //jika password tidak sama
			  $this->session->set_flashdata('notification_password', '<div class="col-xs-5 alert alert-danger alert-dismissible pull-right">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <p><i class="icon fa fa-ban"></i> Password konfirmasi tidak cocok!</p>
			  
				</div>');
            }
          }       
          if ($query) {
            redirect('users');
          }
          else{
            $this->session->set_flashdata('notification_password', '<div class="col-xs-5 alert alert-danger alert-dismissible pull-right">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-ban"></i> Edit Data gagal dilakukan</p>
                
                  </div>');
            redirect('users');
          }
        }
	} 
	public function tambahUser(){
		if($this->input->post('btnSimpan') == "Simpan"){
			$_nidn = $this->input->post('nidn', TRUE);
			$_email = $this->input->post('email', TRUE);
			$_username = $this->input->post('username', TRUE);
			$_prodi = $this->input->post('prodi', TRUE);
			$_password = $this->input->post('password', TRUE);
			$_cpassword = $this->input->post('cpassword', TRUE);
			if ($_password == $_cpassword) {
				$data = array(
				  'NIDN' => $_nidn,
				  'email' => $_email,
				  'username' => $_username,
				  'prodi'=> $_prodi,
				  'password'=> get_hash($_password),
				  'author'=> 'dosen'
				); 
				$query= $this->M_pengguna->simpanUser($data);
				if ($query) {
					$this->session->set_flashdata('notification', 'Pendaftaran berhasil, silakan login.');	
				  redirect(site_url('users'));
				}
				else{
					$this->session->set_flashdata('notification', 'Pendaftaran gagal, silakan ulangi.');	
				  redirect(site_url('users'));
				}
			}
			else{
			  //jikapassword tidak sama degan confirm password
			  $this->session->set_flashdata('notification', 'Password Baru dan Konfirmasi Password harus sama');	
			  redirect(site_url('#signup'));
			}
		}
	}
	
	  public function deleteUser($id){
			$this->M_pengguna->deleteUser($id);
			redirect('users');
		}
}

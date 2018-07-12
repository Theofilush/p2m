<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('login/m_login');		
	}

	public function index(){
		$this->load->view('login/v_login');
		if($this->session->userdata('status') == "login"){
			redirect(site_url("dashboard"));
		}
	} //$this->load->library('user_agent');
	//redirect($this->agent->referrer());
	//redirect(echo site_url('user_agent'));

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username
			//'password' => md5($password),
			);
		$cek = $this->m_login->cek_login("t_login",$where)->num_rows();
		if($cek > 0){

			$db=$this->m_login->cek_login("t_login",$where)->row();
			if(hash_verified($password ,$db->password)) 
			{
			   $data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
				$this->session->set_userdata($data_session);	
				redirect(site_url("dashboard"),'refresh');				
			}
			else{
				$this->session->set_flashdata('notification','Maaf Password Salah.');
				redirect('','refresh');
			}




			/*$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(site_url("dashboard"));*/
 
		}else{
			$this->session->set_flashdata('notification', 'Username atau Password tidak ditemukan');	
			  redirect(site_url());
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}

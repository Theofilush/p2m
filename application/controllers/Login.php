<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('login/m_login');		
	}

	public function index(){
		$tampil_prodi = $this->M_login->tampil_prodi(); 
		$data = array(
			'tampil_prodi'=> $tampil_prodi
		);
		$this->load->view('login/v_login',$data);
		if($this->session->userdata('status') == "login"){
			redirect(site_url("dashboard"));
		}
	} //$this->load->library('user_agent');
	//redirect($this->agent->referrer());
	//redirect(echo site_url('user_agent'));
	//untuk membuat user baru kan harus register maka jgn lupa pake script ini 
	/*public function reg(){
		$data = array(
			'nama' => $this->input->post('nama') ,
			'email'=> $this->input->post('email'),
			'password'=>get_hash($this->input->post('password'))
		);
	  return $this->db->insert('login',$data);
	}*/

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username
			//'password' => md5($password),
			);
		$cek = $this->m_login->cek_login("t_login",$username)->num_rows();
		if($cek > 0){
			$db=$this->m_login->cek_login("t_login",$username)->row();
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
	public function signup(){
		if($this->input->post('btnSignUp') == "Signup"){
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
				//panggil fungsi simpanUser pada User_model
				$query= $this->m_login->simpanUser($data);
				if ($query) {
					$this->session->set_flashdata('notification', 'Pendaftaran berhasil, silakan login.');	
				  redirect(site_url('login'));
				}
				else{
					$this->session->set_flashdata('notification', 'Pendaftaran gagal, silakan ulangi.');	
				  redirect(site_url('#signup'));
				}
			}
			else{
			  //jikapassword tidak sama degan confirm password
			  $this->session->set_flashdata('notification', 'Password Baru dan Konfirmasi Password harus sama');	
			  redirect(site_url('#signup'));
			}
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}

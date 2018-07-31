<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UbahPassword extends CI_Controller {

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
		
		$dataHalaman = array(		
		  'da' => $kue,		
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('pengguna/v_ubah_pass');
		$this->load->view('dashboard/v_footer');
    }    
    public function updatepass($nidn){
        if ($this->input->post('btnSimpan') == "Simpan") {
          $_password = $this->input->post('password', TRUE);
          $_cpassword = $this->input->post('cpassword', TRUE);      
          if($_password == ""){
            $this->session->set_flashdata('notification_password', '<ul class="nav navbar-right panel_toolbox">
              <li>
                    <div class="alert alert-danger alert-dismissible " style="margin-bottom:0;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-ban"></i> Password Tidak Terisi!</p>			                                    
              </li>                                

              </ul>');
                redirect('pengguna/UbahPassword','refresh');
          }
          else{
            if ($_password == $_cpassword) {
              //kumpulkan seua inputan kedalam array
              $data = array(
                'password'=> get_hash($_password)
              );
              //$data= get_hash($_password);
              $query= $this->M_pengguna->simpanUpdatePass($data,$nidn);
            }
            else{//jika password tidak sama
			  $this->session->set_flashdata('notification_password', '<ul class="nav navbar-right panel_toolbox">
              <li>
                <div class="alert alert-danger alert-dismissible " style="margin-bottom:0;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-ban"></i> Password konfirmasi tidak cocok!</p>			                                    
              </li>                                
              </ul>');
                redirect('pengguna/UbahPassword','refresh');
            }
          }       
          if ($query) {
            $this->session->set_flashdata('notification_password', '<ul class="nav navbar-right panel_toolbox">
            <li>
                <div class="alert alert-success alert-dismissible " style="margin-bottom:0;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-ban"></i> Edit Password Berhasil!</p>			                                    
            </li> 
            </ul>');
            redirect('pengguna/UbahPassword','refresh');            
          }
          else{
            $this->session->set_flashdata('notification_password', '<ul class="nav navbar-right panel_toolbox">
            <li>
                <div class="alert alert-danger alert-dismissible " style="margin-bottom:0;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-ban"></i> Edit Password Gagal!</p>			                                    
            </li> 
            </ul>');
            redirect('pengguna/UbahPassword','refresh');
          }
        }
	}    
}

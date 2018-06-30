<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_dashboard');
		$this->load->view('dashboard/v_footer');
	}
}

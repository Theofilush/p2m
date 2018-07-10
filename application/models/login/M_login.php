<?php

class M_login extends CI_Model{	

	function cek_login($table,$where){				
		return $this->db->get_where("t_login",$where);
	}	
	function hak_ak($usan){          
    	$this->db->where("username='$usan' OR email='$usan'");
    	$hasil=$this->db->get('t_login');
    	return $hasil->result();    	
  }
}

?>
<?php

defined('BASEPATH') OR exit('Anda tidak boleh mengakses file ini secara langsung'); 
class M_login extends CI_Model{	

        function cek_login($table,$usn){		
		$this->db->where("email", $usn);		
		$this->db->or_where("NIDN",$usn);
		$query = $this->db->get("t_login");
    	        return $query;
		//return $this->db->get_where("t_login",$where);
	}	
	function hak_ak($usan){          
                $this->db->where("NIDN='$usan' OR email='$usan'");
                $hasil=$this->db->get('t_login');
                return $hasil->result();    	
	}
  	public function simpanUser($data){//function untuk menyimpan pengguna baru yg melakukan signup
		return $this->db->insert('t_login', $data);
	}
	function tampil_prodi(){ //query untuk menampilkan skema Penelitian pada form input dana yg bersumber UPJ
                $this->db->order_by('id_program', 'ASC');
                $query = $this->db->get('program_studi');        
                return $query->result();
	}	
	function get_prodi(){
		 //   $query = $this->db->query("SELECT merk,SUM(stok) AS stok FROM barang GROUP BY merk");
		//$this->db->order_by('id_program', 'ASC');
		$this->db->order_by('program_studi', 'ASC');
                $query = $this->db->get('program_studi');     
		if($query->num_rows() > 0){
			foreach($query->result() as $data){
		    		$hasil[] = $data;
			}
		return $hasil;
	    	}
	}	 
        function cek_nidn($nidn){     
                $this->db->where("NIDN", $nidn);		
		$query = $this->db->get("t_login");
                return $query->result();
        }

}

?>
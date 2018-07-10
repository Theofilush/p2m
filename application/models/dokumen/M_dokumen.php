<?php
defined('BASEPATH') OR exit('Anda tidak boleh mengakses file ini secara langsung'); 
class M_dokumen extends CI_Model{
 	var $publikasi_jurnal = 't_publikasi_jurnal';   
 	var $buku_ajar = 't_buku_ajar';  
    function listAll_publikasi(){
        $query = $this->db->get($this->publikasi_jurnal);
        return $query->result();
    } 
    function listAll_buku(){
        $query = $this->db->get($this->buku_ajar);
        return $query->result();
    } 
}
?>

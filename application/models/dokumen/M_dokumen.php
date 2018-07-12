<?php
defined('BASEPATH') OR exit('Anda tidak boleh mengakses file ini secara langsung'); 
class M_dokumen extends CI_Model{
 	var $publikasi_jurnal = 't_publikasi_jurnal';
    var $buku_ajar = 't_buku_ajar';
    var $dana_non_upj= 't_dana_non_upj'; 
    var $dana_non2_upj= 't_dana_non2_upj'; 
    var $dana_upj= 't_dana_upj'; 
    var $dana2_upj= 't_dana2_upj'; 
    var $forum_ilmiah= 't_forum_ilmiah'; 
    var $hki= 't_hki'; 
    var $luaran_lain= 't_luaran_lain'; 
    function listAll_publikasi(){
        $query = $this->db->get($this->publikasi_jurnal);
        return $query->result();
    } 
    function listAll_buku(){
        $query = $this->db->get($this->buku_ajar);
        return $query->result();
    } 
    function listAll_pemakalah(){
        $query = $this->db->get($this->forum_ilmiah);
        return $query->result();
    } 
    function listAll_dana_non_upj(){
        $query = $this->db->get($this->dana_non_upj);
        return $query->result();
    } 
    function listAll_dana_upj(){
        $query = $this->db->get($this->dana_upj);
        return $query->result();
    } 
    function listAll_dana_non2_upj(){
        $query = $this->db->get($this->dana_non2_upj);
        return $query->result();
    } 
    function listAll_dana2_upj(){
        $query = $this->db->get($this->dana2_upj);
        return $query->result();
    } 
    function listAll_hki(){
        $query = $this->db->get($this->hki);
        return $query->result();
    } 
    function listAll_luaran(){
        $query = $this->db->get($this->luaran_lain);
        return $query->result();
    }   
    
    public function simpanDok_publikasi($data){
        return $this->db->insert($this->publikasi_jurnal, $data);
    } 
    public function simpanDok_buku($data){
        return $this->db->insert($this->buku_ajar, $data);
    } 
    public function simpanDok_pemakalah($data){
        return $this->db->insert($this->forum_ilmiah, $data);
    } 
    function simpanDok_dana_non_upj($data){
        return $this->db->insert($this->dana_non_upj, $data);
    } 
    function simpanDok_dana_upj($data){
        return $this->db->insert($this->dana_upj, $data);
    } 
    function simpanDok_dana_non2_upj($data){        
        return $this->db->insert($this->dana_non2_upj, $data);
    } 
    function simpanDok_dana2_upj($data){
        return $this->db->insert($this->dana2_upj, $data);
    } 
    function simpanDok_hki($data){
        return $this->db->insert($this->hki, $data);
    } 
    function simpanDok_luaran($data){
        return $this->db->insert($this->luaran_lain, $data);
    }  

}
?>

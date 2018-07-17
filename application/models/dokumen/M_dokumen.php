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
    //tampilkan data di halaman dashboard
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
    //untuk menambahkan /insert data ke database
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
    //untuk menampilkan data ke halaman edit ataupun tambah
    function tampil_tahun(){ //query untuk menampilkan tahun pada form input
        $query = $this->db->query('SELECT * FROM tahun ORDER BY tahun ASC ');
        return $query->result();
    }
    function tampil_cakupan(){ //query untuk menampilkan cakupan pada form input data publikasi
        $query = $this->db->query('SELECT * FROM cakupan_publikasi_jurnal ');
        return $query->result();
    }
    function tampil_cakupan2(){ //query untuk menampilkan cakupan pada form input data forum ilmiah internasional
        $query = $this->db->query('SELECT * FROM cakupan_forum_ilmiah ');
        return $query->result();
    }
    function status_pemakalah(){ //query untuk menampilkan status pemakalah pada form input data status forum ilmiah internasional
        $query = $this->db->query('SELECT * FROM status_pemakalah ');
        return $query->result();
    }
    function tampil_jenishki(){ //query untuk menampilkan Jenis HKI pada form input data HKI
        $query = $this->db->query('SELECT * FROM jenis_hki ORDER BY id_jenis ASC');
        return $query->result();
    }
    function tampil_statushki(){ //query untuk menampilkan Status HKI pada form input data HKI
        $query = $this->db->query('SELECT * FROM status_hki ORDER BY status_hki DESC');
        return $query->result();
    }    
    function tampil_jenis_luaran(){ //query untuk menampilkan Jenis Luaran pada form input data Luaran Lain
        $query = $this->db->query('SELECT * FROM jenis_luaran_lain ');
        return $query->result();
    }   
    function tampil_jenis_penelitian(){ //query untuk menampilkan Jenis Penelitian pada form input dana yg bersumber UPJ
        $query = $this->db->query('SELECT * FROM jenis_penelitian ORDER BY id_jenis_ini ASC');
        return $query->result();
    }  
    function tampil_skema_penelitian(){ //query untuk menampilkan skema Penelitian pada form input dana yg bersumber UPJ
        $query = $this->db->query('SELECT * FROM skema_penelitian ');
        return $query->result();
    }
    //untuk mengupdate /memperbarui data yang sudah ada
    function updateDok_publikasi($data,$id){
        $this->db->where('id_publikasi',$id);
        $hasil = $this->db->update($this->publikasi_jurnal,$data);
        return $hasil; 
    }
    function updateDok_buku($data,$id){
        $this->db->where('id_buku_ajar',$id);
        $hasil = $this->db->update($this->buku_ajar,$data);
        return $hasil; 
    }
    function updateDok_pemakalah($data,$id){
        $this->db->where('id_perumi',$id);
        $hasil = $this->db->update($this->forum_ilmiah,$data);
        return $hasil; 
    }
    function updateDok_dana_non_upj($data,$id){
        $this->db->where('kode_penelitian',$id);
        $hasil = $this->db->update($this->dana_non_upj,$data);
        return $hasil; 
    }
    function updateDok_dana_upj($data,$id){
        $this->db->where('kode_penelitan',$id);
        $hasil = $this->db->update($this->dana_upj,$data);
        return $hasil; 
    }
    function updateDok_dana_non2_upj($data,$id){
        $this->db->where('kode_penelitan',$id);
        $hasil = $this->db->update($this->dana_non2_upj,$data);
        return $hasil; 
    }
    function updateDok_dana2_upj($data,$id){
        $this->db->where('kode_penelitan',$id);
        $hasil = $this->db->update($this->dana2_upj,$data);
        return $hasil; 
    }
    function updateDok_hki($data,$id){
        $this->db->where('id_hki',$id);
        $hasil = $this->db->update($this->hki,$data);
        return $hasil; 
    }
    function updateDok_luaran($data,$id){
        $this->db->where('id_luaran',$id);
        $hasil = $this->db->update($this->luaran_lain,$data);
        return $hasil; 
    }

}
?>

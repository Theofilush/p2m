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
    var $dt_login= 't_login';
    //tampilkan data di halaman dashboard
    function listAll_publikasi(){
        $query = $this->db->get($this->publikasi_jurnal);
        return $query->result();
    } 
    function listAll_buku(){
       // $query = $this->db->get($this->buku_ajar);
        //return $query->result();
        //$query = $this->db->query('SELECT * FROM t_buku_ajar JOIN t_login ON t_login.username=t_buku_ajar.nama_dosen ');
        //return $query->result();
        $this->db->select('*');
        $this->db->from($this->buku_ajar);
        $this->db->join($this->dt_login, 't_login.username = t_buku_ajar.nama_dosen','left');
        $query = $this->db->get();
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
    //list yang digunakan untuk menampilkan data untuk di edit pada halaman edit
    function listEdit_publikasi($id){
        $this->db->where('id_publikasi',$id);
        $hasil = $this->db->get($this->publikasi_jurnal);
        return $hasil->result();
    }
    function listEdit_buku($id){
        $this->db->where('id_buku_ajar',$id);        
        $query = $this->db->get($this->buku_ajar);
        return $query->result();
    } 
    function listEdit_pemakalah($id){
        $this->db->where('id_perumi',$id);
        $query = $this->db->get($this->forum_ilmiah);
        return $query->result();
    }
    function listEdit_dana_non_upj($id){
        $this->db->where('kode_penelitian',$id);
        $query = $this->db->get($this->dana_non_upj);
        return $query->result();
    } 
    function listEdit_dana_upj($id){
        $this->db->where('kode_penelitan',$id);
        $query = $this->db->get($this->dana_upj);
        return $query->result();
    } 
    function listEdit_dana_non2_upj($id){
        $this->db->where('kode_penelitian',$id);
        $query = $this->db->get($this->dana_non2_upj);
        return $query->result();
    } 
    function listEdit_dana2_upj($id){
        $this->db->where('kode_penelitan',$id);        
        $query = $this->db->get($this->dana2_upj);
        return $query->result();
    } 
    function listEdit_hki($id){
        $this->db->where('id_hki',$id);        
        $query = $this->db->get($this->hki);
        return $query->result();
    } 
    function listEdit_luaran($id){
        $this->db->where('id_luaran',$id);
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
        $this->db->order_by('tahun', 'ASC');
        $query = $this->db->get('tahun'); 
        return $query->result();
    }
    function tampil_cakupan(){ //query untuk menampilkan cakupan pada form input data publikasi
        $query = $this->db->get('cakupan_publikasi_jurnal'); 
        return $query->result();
    }
    function tampil_cakupan2(){ //query untuk menampilkan cakupan pada form input data forum ilmiah internasional
        $query = $this->db->get('cakupan_forum_ilmiah'); 
        return $query->result();
    }
    function status_pemakalah(){ //query untuk menampilkan status pemakalah pada form input data status forum ilmiah internasional
        $query = $this->db->get('status_pemakalah'); 
        return $query->result();
    }
    function tampil_jenishki(){ //query untuk menampilkan Jenis HKI pada form input data HKI
        $this->db->order_by('id_jenis', 'ASC');
        $query = $this->db->get('jenis_hki');     
        return $query->result();
    }
    function tampil_statushki(){ //query untuk menampilkan Status HKI pada form input data HKI
        $this->db->order_by('status_hki', 'DESC');
        $query = $this->db->get('status_hki');          
        return $query->result();
    }    
    function tampil_jenis_luaran(){ //query untuk menampilkan Jenis Luaran pada form input data Luaran Lain
        $query = $this->db->get('jenis_luaran_lain'); 
        return $query->result();
    }   
    function tampil_jenis_penelitian(){ //query untuk menampilkan Jenis Penelitian pada form input dana yg bersumber UPJ
        $this->db->order_by('id_jenis_ini', 'ASC');
        $query = $this->db->get('jenis_penelitian');          
        return $query->result();
    }  
    function tampil_skema_penelitian(){ //query untuk menampilkan skema Penelitian pada form input dana yg bersumber UPJ        
        $query = $this->db->get('skema_penelitian');        
        return $query->result();
    }
    function tampil_jenis_pengabdian(){ //query untuk menampilkan skema Penelitian pada form input dana yg bersumber UPJ
        $this->db->order_by('id_jenis', 'ASC');
        $query = $this->db->get('jenis_pengabdian');        
        return $query->result();
    }
    function tampil_nidn(){ //query untuk menampilkan skema Penelitian pada form input dana yg bersumber UPJ
        $this->db->order_by('id_jenis', 'ASC');
        $query = $this->db->get('jenis_pengabdian');        
        return $query->result();
    }
    function tampil_dosen(){ //query untuk menampilkan list dosen pada seluruh form input        
        $query = $this->db->get($this->dt_login);        
        return $query->result();
    }
    
    //untuk mengupdate /memperbarui data yang sudah ada
    function updateDok_publikasi($data,$id){
        $this->db->where('id_publikasi',$id);
        return $this->db->update($this->publikasi_jurnal,$data);
    }
    function updateDok_buku($data,$id){
        $this->db->where('id_buku_ajar',$id);
        return $this->db->update($this->buku_ajar,$data);
    }
    function updateDok_pemakalah($data,$id){
        $this->db->where('id_perumi',$id);
        return $this->db->update($this->forum_ilmiah,$data);
    }
    function updateDok_dana_non_upj($data,$id){
        $this->db->where('kode_penelitian',$id);
        return $this->db->update($this->dana_non_upj,$data);
    }
    function updateDok_dana_upj($data,$id){
        $this->db->where('kode_penelitan',$id);
        return $this->db->update($this->dana_upj,$data);
    }
    function updateDok_dana_non2_upj($data,$id){
        $this->db->where('kode_penelitian',$id);
        return $this->db->update($this->dana_non2_upj,$data);
    }
    function updateDok_dana2_upj($data,$id){
        $this->db->where('kode_penelitan',$id);
        return $this->db->update($this->dana2_upj,$data);
    }
    function updateDok_hki($data,$id){
        $this->db->where('id_hki',$id);
        return $this->db->update($this->hki,$data);
    }
    function updateDok_luaran($data,$id){
        $this->db->where('id_luaran',$id);
        return $this->db->update($this->luaran_lain,$data);
    }
    //untuk mengdelete data sesuai pemilik data
    function deleteDok_publikasi($id){
        $this->db->where('id_publikasi', $id);
        $this->db->delete($this->publikasi_jurnal);
    }
    function deleteDok_buku($id){
        $this->db->where('id_buku_ajar', $id);
        $this->db->delete($this->buku_ajar);
    }
    function deleteDok_pemakalah($id){
        $this->db->where('id_perumi', $id);
        $this->db->delete($this->forum_ilmiah);
    }
    function deleteDok_dana_non_upj($id){
        $this->db->where('kode_penelitian', $id);
        $this->db->delete($this->dana_non_upj);
    }
    function deleteDok_dana_upj($id){
        $this->db->where('kode_penelitan', $id);
        $this->db->delete($this->dana_upj);
    }
    function deleteDok_dana_non2_upj($id){
        $this->db->where('kode_penelitian', $id);
        $this->db->delete($this->dana_non2_upj);
    }
    function deleteDok_dana2_upj($id){
        $this->db->where('kode_penelitan', $id);
        $this->db->delete($this->dana2_upj);
    }
    function deleteDok_hki($id){
        $this->db->where('id_hki', $id);
        $this->db->delete($this->hki);
    }
    function deleteDok_luaran($id){
        $this->db->where('id_luaran', $id);
        $this->db->delete($this->luaran_lain);
    }
    //untuk melakukan validasi dokumen
    function validasi_publikasi($id){
        $this->db->set('valid', "YA");
        $this->db->where('id_publikasi',$id);
        return $this->db->update($this->publikasi_jurnal);
    }
    function validasi_buku($id){
        $this->db->set('valid', "YA");
        $this->db->where('id_buku_ajar',$id);
        return $this->db->update($this->buku_ajar);
    }
    function validasi_pemakalah($id){
        $this->db->set('valid', "YA");
        $this->db->where('id_perumi',$id);
        return $this->db->update($this->forum_ilmiah);
    }
    function validasi_dana_non_upj($id){
        $this->db->set('valid', "YA");
        $this->db->where('kode_penelitian',$id);
        return $this->db->update($this->dana_non_upj);
    }
    function validasi_dana_upj($id){
        $this->db->set('valid', "YA");
        $this->db->where('kode_penelitan',$id);
        return $this->db->update($this->dana_upj);
    }
    function validasi_dana_non2_upj($id){
        $this->db->set('valid', "YA");
        $this->db->where('kode_penelitian',$id);
        return $this->db->update($this->dana_non2_upj);
    }
    function validasi_dana2_upj($id){
        $this->db->set('valid', "YA");
        $this->db->where('kode_penelitan',$id);
        return $this->db->update($this->dana2_upj);
    }
    function validasi_hki($id){
        $this->db->set('valid', "YA");
        $this->db->where('id_hki',$id);
        return $this->db->update($this->hki);
    }
    function validasi_luaran($id){
        $this->db->set('valid', "YA");
        $this->db->where('id_luaran',$id);
        return $this->db->update($this->luaran_lain);
    }
     //untuk melakukan Penolakan validasi pada dokumen
     function toval_publikasi($id){
        $this->db->set('valid', "TIDAK");
        $this->db->where('id_publikasi',$id);
        return $this->db->update($this->publikasi_jurnal);
    }
    function toval_buku($id){
        $this->db->set('valid', "TIDAK");
        $this->db->where('id_buku_ajar',$id);
        return $this->db->update($this->buku_ajar);
    }
    function toval_pemakalah($id){
        $this->db->set('valid', "TIDAK");
        $this->db->where('id_perumi',$id);
        return $this->db->update($this->forum_ilmiah);
    }
    function toval_dana_non_upj($id){
        $this->db->set('valid', "TIDAK");
        $this->db->where('kode_penelitian',$id);
        return $this->db->update($this->dana_non_upj);
    }
    function toval_dana_upj($id){
        $this->db->set('valid', "TIDAK");
        $this->db->where('kode_penelitan',$id);
        return $this->db->update($this->dana_upj);
    }
    function toval_dana_non2_upj($id){
        $this->db->set('valid', "TIDAK");
        $this->db->where('kode_penelitian',$id);
        return $this->db->update($this->dana_non2_upj);
    }
    function toval_dana2_upj($id){
        $this->db->set('valid', "TIDAK");
        $this->db->where('kode_penelitan',$id);
        return $this->db->update($this->dana2_upj);
    }
    function toval_hki($id){
        $this->db->set('valid', "TIDAK");
        $this->db->where('id_hki',$id);
        return $this->db->update($this->hki);
    }
    function toval_luaran($id){
        $this->db->set('valid', "TIDAK");
        $this->db->where('id_luaran',$id);
        return $this->db->update($this->luaran_lain);
    }
    //untuk melakukan upload dokumen pada sub-menu publikasi
    function uploadDok_publikasi($nama_file,$id){
        $this->db->set('file', $nama_file);
        $this->db->where('id_publikasi',$id);
        return $this->db->update($this->publikasi_jurnal);
    }
    function uploadDok_pemakalah($nama_file,$id){
        $this->db->set('file', $nama_file);
        $this->db->where('id_perumi',$id);
        return $this->db->update($this->forum_ilmiah);
    }
    function uploadDok_dana_non_upj($nama_file,$id){
        $this->db->set('file', $nama_file);
        $this->db->where('kode_penelitian',$id);
        return $this->db->update($this->dana_non_upj);
    }
    function uploadDok_dana_upj($nama_file,$id){
        $this->db->set('file', $nama_file);
        $this->db->where('kode_penelitan',$id);
        return $this->db->update($this->dana_upj);
    }
    function uploadDok_dana_non2_upj($nama_file,$id){
        $this->db->set('file', $nama_file);
        $this->db->where('kode_penelitian',$id);
        return $this->db->update($this->dana_non2_upj);
    }
    function uploadDok_dana2_upj($nama_file,$id){
        $this->db->set('file', $nama_file);
        $this->db->where('kode_penelitan',$id);
        return $this->db->update($this->dana2_upj);
    }
    function uploadDok_hki($nama_file,$id){
        $this->db->set('file', $nama_file);
        $this->db->where('id_hki',$id);
        return $this->db->update($this->hki);
    }
    function uploadDok_luaran($nama_file,$id){
        $this->db->set('file', $nama_file);
        $this->db->where('id_luaran',$id);
        return $this->db->update($this->luaran_lain);
    }
    //menghitung total 1 tabel pada publikasi untuk digabungka ke grafik
    function hitung_publikasi(){
        $this->db->select('prodi,COUNT(*) as total_jurnal');
        $this->db->from($this->dt_login);
        $this->db->join($this->publikasi_jurnal, 't_login.username = t_publikasi_jurnal.penulis_publikasi','RIGHT');
        $this->db->group_by('prodi'); 
        $this->db->order_by('prodi', 'ASC'); 
        return $this->db->get()->result();
    }
    function hitung_pemakalah(){
        $this->db->select('prodi,COUNT(*) as total_makalah');
        $this->db->from($this->dt_login);
        $this->db->join($this->forum_ilmiah, 't_login.username = t_forum_ilmiah.nama_dosen','RIGHT');
        $this->db->group_by('prodi'); 
        $this->db->order_by('prodi', 'ASC'); 
        return $this->db->get()->result();        
    }
    function hitung_buku(){
        $this->db->select('prodi,COUNT(*) as total_buku');
        $this->db->from($this->dt_login);
        $this->db->join($this->buku_ajar, 't_login.username = t_buku_ajar.nama_dosen','RIGHT');
        $this->db->group_by('prodi'); 
        $this->db->order_by('prodi', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_hki(){
        $this->db->select('prodi,COUNT(*) as total_hki');
        $this->db->from($this->dt_login);
        $this->db->join($this->hki, 't_login.username = t_hki.nama_dosen','RIGHT');
        $this->db->group_by('prodi'); 
        $this->db->order_by('prodi', 'ASC'); 
        return $this->db->get()->result();
    }
    function hitung_luaran(){
        $this->db->select('prodi,COUNT(*) as total_luaran');
        $this->db->from($this->dt_login);
        $this->db->join($this->luaran_lain, 't_login.username = t_luaran_lain.nama_dosen','RIGHT');
        $this->db->group_by('prodi'); 
        $this->db->order_by('prodi', 'ASC'); 
        return $this->db->get()->result();   
    }
    //menghitung total 1 tabel pada PENELITIAN DAN PENGABDIAN untuk digabungka ke grafik
    function hitung_dana_upj(){
        $this->db->select('prodi,COUNT(*) as total_penelitian');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana_upj, 't_login.username = t_dana_upj.ketua_peneliti','RIGHT');
        $this->db->group_by('prodi'); 
        $this->db->order_by('prodi', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_dana_non_upj(){
        $this->db->select('prodi,COUNT(*) as total_penelitian_non');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana_non_upj, 't_login.username = t_dana_non_upj.ketua_peneliti','RIGHT');
        $this->db->group_by('prodi'); 
        $this->db->order_by('prodi', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_dana2_upj(){
        $this->db->select('prodi,COUNT(*) as total_pengabdian');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana2_upj, 't_login.username =  t_dana2_upj.ketua_peneliti','RIGHT');
        $this->db->group_by('prodi'); 
        $this->db->order_by('prodi', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_dana_non2_upj(){
        $this->db->select('prodi,COUNT(*) as total_pengabdian_non');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana_non2_upj, 't_login.username = t_dana_non2_upj.ketua_peneliti','RIGHT');
        $this->db->group_by('prodi'); 
        $this->db->order_by('prodi', 'ASC'); 
        return $this->db->get()->result();   
    }
    
    function update_jumlah($data,$id){
        $this->db->where('no',$id);
        return $this->db->update('t_total_semua',$data);
    }
    function tampil_top_5(){ //query untuk menampilkan tabel t_total_semua(untuk menampung var top 5)
        $this->db->order_by('jumlah', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get('t_total_Semua'); 
        return $query->result();
    }
    function tampil_jumlah_top_5(){ //query untuk menampilkan total penjumlahan dari 5 teratas
        $this->db->select('SUM(jumlah) as creditTotal');
        //$this->db->order_by('jumlah', 'DESC');
        //$this->db->limit(5);
        //$this->db->where('no BETWEEN 1 AND 5');
        $this->db->from('(SELECT jumlah FROM `t_total_semua` ORDER BY jumlah DESC LIMIT 5) AS subo');
        $query = $this->db->get(); 
        return $query->result();
    }
   
}
?>

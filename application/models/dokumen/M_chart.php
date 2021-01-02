<?php

defined('BASEPATH') OR exit('Anda tidak boleh mengakses file ini secara langsung'); 
class M_chart extends CI_Model{	
	var $publikasi_jurnal = 't_publikasi_jurnal';
    var $buku_ajar = 't_buku_ajar';
    var $dana_non_upj= 't_dana_non_upj'; 
    var $dana_non2_upj= 't_dana_non2_upj'; 
    var $dana_upj= 't_dana_upj'; 
    var $dana2_upj= 't_dana2_upj'; 
    var $forum_ilmiah= 't_forum_ilmiah'; 
    var $hki= 't_hki'; 
    var $luaran_lain= 't_luaran_lain'; 
    var $dana_kemenristek= 't_dana_kemenristek'; 
    var $dana_kemenristek2= 't_dana_kemenristek2'; 
    var $dt_login= 't_login';
    var $tahun='tahun';
    //untuk menampilkan data tahunan ke grafik 1 per tahun
    function hitung_dana2_upj_tahun(){
        $this->db->select('tahun,COUNT(tahun_hibah) as ttl_thn_abdi');
        $this->db->from($this->dana2_upj);
        $this->db->join($this->tahun, 't_dana2_upj.tahun_hibah = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_dana_non2_upj_tahun(){
        $this->db->select('tahun,COUNT(tahun_penelitian) as ttl_thn_nonabdi');
        $this->db->from($this->dana_non2_upj);
        $this->db->join($this->tahun, 't_dana_non2_upj.tahun_penelitian = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_hibah2_upj_tahun(){
        $this->db->select('tahun,COUNT(tahun_hibah) as ttl_thn_nonabdi_hibah');
        $this->db->from($this->dana_kemenristek2);
        $this->db->join($this->tahun, 't_dana_kemenristek2.tahun_hibah = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_dana_upj_tahun(){
        $this->db->select('tahun,COUNT(tahun_hibah) as ttl_thn_liti');
        $this->db->from($this->dana_upj);
        $this->db->join($this->tahun, 't_dana_upj.tahun_hibah = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_dana_non_upj_tahun(){
        $this->db->select('tahun,COUNT(tahun_penelitian) as ttl_thn_nonliti');
        $this->db->from($this->dana_non_upj);
        $this->db->join($this->tahun, 't_dana_non_upj.tahun_penelitian = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_hibah_upj_tahun(){
        $this->db->select('tahun,COUNT(tahun_hibah) as ttl_thn_nonliti_hibah');
        $this->db->from($this->dana_kemenristek);
        $this->db->join($this->tahun, 't_dana_kemenristek.tahun_hibah = tahun.tahun','RIGHT');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get()->result();
    }
    function hitung_jurnal_tahun(){
        $this->db->select('tahun,COUNT(tahun_penerbitan) as ttl_thn_jurnal');
        $this->db->from($this->publikasi_jurnal);
        $this->db->join($this->tahun, 't_publikasi_jurnal.tahun_penerbitan = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_buku_tahun(){
        $this->db->select('tahun,COUNT(tahun_penerbitan) as ttl_thn_buku');
        $this->db->from($this->buku_ajar);
        $this->db->join($this->tahun, 't_buku_ajar.tahun_penerbitan = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_prosiding_tahun(){
        $this->db->select('tahun,COUNT(tahun_pelaksanaan) as ttl_thn_prosiding');
        $this->db->from($this->forum_ilmiah);
        $this->db->join($this->tahun, 't_forum_ilmiah.tahun_pelaksanaan = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_hki_tahun(){
        $this->db->select('tahun,COUNT(tahun_pelaksanaan) as ttl_thn_hki');
        $this->db->from($this->hki);
        $this->db->join($this->tahun, 't_hki.tahun_pelaksanaan = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_luaran_tahun(){
        $this->db->select('tahun,COUNT(tahun_pelaksanaan) as ttl_thn_luaran');
        $this->db->from($this->luaran_lain);
        $this->db->join($this->tahun, 't_luaran_lain.tahun_pelaksanaan = tahun.tahun','RIGHT');
        $this->db->group_by('tahun'); 
        $this->db->order_by('tahun', 'ASC'); 
        return $this->db->get()->result();   
    }

    //menghitung total PENELITIAN DAN PENGABDIAN untuk digabungka ke grafik
    function hitung_dana_upj(){
        $this->db->select('program_studi,COUNT(id) as total_penelitian');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana_upj, 't_login.username = t_dana_upj.ketua_peneliti','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC');
        return $this->db->get()->result();
    }
    function hitung_dana_non_upj(){
        $this->db->select('program_studi,COUNT(id) as total_penelitian_non');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana_non_upj, 't_login.username = t_dana_non_upj.ketua_peneliti','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_hibah_upj(){
        $this->db->select('program_studi,COUNT(id) as total_penelitian_hibah');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana_kemenristek, 't_login.username = t_dana_kemenristek.ketua_peneliti','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();   
    }

    function hitung_dana2_upj(){
        $this->db->select('program_studi,COUNT(id) as total_pengabdian');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana2_upj, 't_login.username =  t_dana2_upj.ketua_peneliti','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();
    }
    function hitung_dana_non2_upj(){
        $this->db->select('program_studi,COUNT(id) as total_pengabdian_non');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana_non2_upj, 't_login.username = t_dana_non2_upj.ketua_peneliti','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_hibah2_upj(){
        $this->db->select('program_studi,COUNT(id) as total_pengabdian_hibah');
        $this->db->from($this->dt_login);
        $this->db->join($this->dana_kemenristek2, 't_login.username = t_dana_kemenristek2.ketua_peneliti','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();   
    }

    //menghitung total 1 tabel pada publikasi untuk digabungka ke grafik
    function hitung_publikasi(){
        $this->db->select('program_studi,COUNT(id) as total_jurnal');
        $this->db->from($this->dt_login);
        $this->db->join($this->publikasi_jurnal, 't_login.username = t_publikasi_jurnal.penulis_publikasi','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();
    }
    function hitung_pemakalah(){
        $this->db->select('program_studi,COUNT(id) as total_makalah');
        $this->db->from($this->dt_login);
        $this->db->join($this->forum_ilmiah, 't_login.username = t_forum_ilmiah.nama_dosen','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();        
    }
    function hitung_buku(){
        $this->db->select('program_studi,COUNT(id) as total_buku');
        $this->db->from($this->dt_login);
        $this->db->join($this->buku_ajar, 't_login.username = t_buku_ajar.nama_dosen','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();   
    }
    function hitung_hki(){
        $this->db->select('program_studi,COUNT(id) as total_hki');
        $this->db->from($this->dt_login);
        $this->db->join($this->hki, 't_login.username = t_hki.nama_dosen','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();
    }
    function hitung_luaran(){
        $this->db->select('program_studi,COUNT(id) as total_luaran');
        $this->db->from($this->dt_login);
        $this->db->join($this->luaran_lain, 't_login.username = t_luaran_lain.nama_dosen','RIGHT');
        $this->db->join('program_studi', 't_login.prodi = program_studi.program_studi','RIGHT');
        $this->db->group_by('program_studi'); 
        $this->db->order_by('program_studi', 'ASC'); 
        return $this->db->get()->result();   
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
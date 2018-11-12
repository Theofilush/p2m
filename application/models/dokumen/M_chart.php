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
}

?>
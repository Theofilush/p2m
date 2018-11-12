<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublikasiJurnal extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_publikasi();		
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 		
		$dataHalaman = array(
			'query' =>  $query,
			'da' => $kue,
			'tampil_tahun'=> $query_tampil_tahun,	
        );
		$datacontent = array( 
			'da' => $kue
		  );
		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('publikasi/v_publikasi',$datacontent);
		$this->load->view('dashboard/v_footer');
	}
	public function editdok($id)
	{ 
		$usan = $this->session->userdata('nama');
		$kue = $this->M_login->hak_ak($usan); 
		$query = $this->M_dokumen->listEdit_publikasi($id);		
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 
		$cakupan =  $this->M_dokumen->tampil_cakupan(); 
		$query_tampil_dosen = $this->M_dokumen->tampil_dosen(); 	
		$dataHalaman = array( 
			'query' =>  $query,
			'da' => $kue,
			'tampil_tahun'=> $query_tampil_tahun,
			'cakupan'=> $cakupan,
			'tampil_dosen'=>$query_tampil_dosen
        );
		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('teditdata/v_edit_publikasi');
		$this->load->view('dashboard/v_footer');
	}
	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
			$_tingkat = $this->input->post('tingkat', TRUE);
			$_tahun_publikasi = $this->input->post('tahun_publikasi', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_nama_jurnal = $this->input->post('nama_jurnal', TRUE);
			$_issn = $this->input->post('issn', TRUE);
			$_volume = $this->input->post('volume', TRUE);
			$_nomor = $this->input->post('nomor', TRUE);
			$_halaman_awal = $this->input->post('halaman_awal', TRUE);
			$_halaman_akhir = $this->input->post('halaman_akhir', TRUE);
			$_url = $this->input->post('url', TRUE);
			$_penulis = $this->input->post('pesan_penulis', TRUE);
			$_anggota1 = $this->input->post('pesan_penulis2', TRUE);
			$_anggota2 = $this->input->post('pesan_penulis3', TRUE);
			$id = $this->input->post('id', TRUE);
			if(($_anggota1 == "") && ($_anggota2 != "")){
				$_anggota1 =$_anggota2;
				$_anggota2= NULL;
			}elseif($_anggota1 == ""){
				$_anggota1 = NULL;
			}
			if($_anggota2 == ""){
				$_anggota2 = NULL;
			}
          
              $data = array(
				'cakupan_publikasi' => $_tingkat,
				'tahun_penerbitan' =>  $_tahun_publikasi,
				'judul' =>  $_judul,
				'nama_jurnal' =>  $_nama_jurnal,
				'issn' =>  $_issn,
				'volume' =>  $_volume,
				'nomor' =>  $_nomor,
				'halaman_awal' =>  $_halaman_awal,
				'halaman_akhir' =>  $_halaman_akhir,
				'url' =>  $_url,
				'penulis_publikasi' =>  $_penulis,
				'penulis_anggota1' =>  $_anggota1,
				'penulis_anggota2' =>  $_anggota2
              );              
          $query= $this->M_dokumen->updateDok_publikasi($data,$id);
          if ($query) {
            redirect("publikasi/PublikasiJurnal");
          }
          else{
			$this->session->set_flashdata('notification', 'Gagal Melakukan Update');	
            redirect("publikasi/PublikasiJurnal");
          }
        }
	} 
	public function deletedok($id){		
		$this->db->where('id_publikasi', $id);
        $query = $this->db->get('t_publikasi_jurnal');
        $row = $query->row();
        unlink("./fileupload/publikasi_jurnal/$row->file");
		$this->M_dokumen->deleteDok_publikasi($id);
		redirect('publikasi/PublikasiJurnal');
	}
	public function validasi($id){            
          $query= $this->M_dokumen->validasi_publikasi($id);        
          if ($query) {
            redirect("publikasi/PublikasiJurnal");
          }
          else{
			$this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
            redirect("publikasi/PublikasiJurnal");
          }
	} 
	public function tolakvalidasi($id){            
		$query= $this->M_dokumen->toval_publikasi($id);        
		if ($query) {
		  redirect("publikasi/PublikasiJurnal");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Penolakan Validasi');		  
		  redirect("publikasi/PublikasiJurnal");
		}
  	} 
	public function uploaddok(){     
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/publikasi_jurnal/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 5120;
			$this->load->library('upload', $config);                
			if ( ! $this->upload->do_upload('filepdf')){
				$this->session->set_flashdata('notification', '<div class="alert alert-danger alert-dismissible fade in pull-right" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<strong>Gagal Melakukan Upload!</strong> 
				</div>');
				$error = array('error' => $this->upload->display_errors());							
			}
			else{
				$data = array('upload_data' => $this->upload->data());                
			}			
			$id = $this->input->post('id', TRUE);
			$_upload = $this->upload->data('file_name');
			$query= $this->M_dokumen->uploadDok_publikasi($_upload,$id);
					if ($query) {
						redirect(site_url('publikasi/PublikasiJurnal'));
					}
					else{
						redirect(base_url('publikasi/PublikasiJurnal'));
					}
		}					
	}
	public function exportexcel(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('LP2M UPJ')
							   ->setLastModifiedBy('LP2M UPJ')
							   ->setTitle("Data Publikasi")
							   ->setSubject("Jurnal")
							   ->setDescription("Laporan Semua Data Publikasi Jurnal")
							   ->setKeywords("Data publikasi jurnal");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PUBLIKASI JURNAL"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:P1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Tahun Penerbitan"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Judul"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama Jurnal"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Penulis"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Penulis Anggota 1");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Penulis Anggota 2");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Penulis Non Dosen");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "ISSN");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Volume");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Nomor");
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Halaman Awal");
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Halaman Akhir");
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "URL");
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Cakupan Publikasi");
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Valid");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);		

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$dokumen = $this->M_dokumen->listAll_publikasi();	

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($dokumen as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tahun_penerbitan);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->judul);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_jurnal);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->penulis_publikasi);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->penulis_anggota1);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->penulis_anggota2);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->penulis_non_dosen);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->issn);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->volume);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->nomor);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->halaman_awal);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->halaman_akhir);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->url);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->cakupan_publikasi);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->valid);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			
			$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(30);
			$excel->getActiveSheet()->getStyle('D4:D999')->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('O4:O999')->getAlignment()->setWrapText(true);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(6);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(6);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(7);		
		
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Luaran Lain");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Luaran Lain.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}


}


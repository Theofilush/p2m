<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenelitianDanaNonUPJ extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_dana_non_upj();
		$byProdiName = implode((array) $kue[0]->prodi);
		$queryByProdi = $this->M_dokumen->listAllDanaNonUpj_byProdi($byProdiName);
		// print_r($queryByProdi);exit();
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 
		$dataHalaman = array(  
			'query'=>$query,
			'queryByProdi' =>  $queryByProdi,
		  	'da' => $kue,
		  	'tampil_tahun'=> $query_tampil_tahun
		);

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('penelitian/v_dana_pen_non_pj');
		$this->load->view('dashboard/v_footer');
	} 
	public function editdok($id) 
	{ 
		$usan = $this->session->userdata('nama');
		$kue = $this->M_login->hak_ak($usan); 
		$query = $this->M_dokumen->listEdit_dana_non_upj($id);		
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 		
		$query_tampil_dosen = $this->M_dokumen->tampil_dosen(); 	
		$dataHalaman = array( 
			'query' =>  $query,
			'da' => $kue,
			'tampil_tahun'=> $query_tampil_tahun,			
			'tampil_dosen'=>$query_tampil_dosen
        );
		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('teditdata/v_edit_pen_non_upj');
		$this->load->view('dashboard/v_footer');
	}
	public function updatedok(){
        if ($this->input->post('btnUpload') == "Upload") {
			$_tahun_kegiatan = $this->input->post('tahun_kegiatan', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_sumber_dana = $this->input->post('sumber_dana', TRUE);
			$_besaran_dana = $this->input->post('besaran_dana', TRUE);							
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
				'tahun_penelitian' =>  $_tahun_kegiatan,
				'judul' =>  $_judul,
				'sumber_dana' =>  $_sumber_dana,
				'besaran_dana' =>  $_besaran_dana,
				'ketua_peneliti' =>  $_penulis,
				'anggota_peneliti_1' =>  $_anggota1,
				'anggota_peneliti_2' =>  $_anggota2
              );              
              $query= $this->M_dokumen->updateDok_dana_non_upj($data,$id);
           
         
          if ($query) {
            redirect("penelitian/PenelitianDanaNonUPJ");
          }
          else{
            redirect("penelitian/PenelitianDanaNonUPJ");
          }
        }
	} 
	public function deletedok($id){
		$this->db->where('kode_penelitian', $id);
        $query = $this->db->get('t_dana_non_upj');
        $row = $query->row();
        unlink("./fileupload/penelitian_non_upj/$row->file");
		$this->M_dokumen->deleteDok_dana_non_upj($id);
		redirect('penelitian/PenelitianDanaNonUPJ');
	}
	public function validasi($id){            
		$query= $this->M_dokumen->validasi_dana_non_upj($id);        
		if ($query) {
		  redirect("penelitian/PenelitianDanaNonUPJ");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
		  redirect("penelitian/PenelitianDanaNonUPJ");
		}
	} 
	public function tolakvalidasi($id){            
		$query= $this->M_dokumen->toval_dana_non_upj($id);        
		if ($query) {
		  redirect("penelitian/PenelitianDanaNonUPJ");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Penolakan Validasi');		  
		  redirect("penelitian/PenelitianDanaNonUPJ");
		}
	} 
	public function uploaddok(){     
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/penelitian_non_upj/';
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
			$query= $this->M_dokumen->uploadDok_dana_non_upj($_upload,$id);
					if ($query) {
						redirect(site_url('penelitian/PenelitianDanaNonUPJ'));
					}
					else{
						redirect(site_url('penelitian/PenelitianDanaNonUPJ'));
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
							   ->setTitle("Penelitian Non UPJ")
							   ->setSubject("Penelitian Non UPj")
							   ->setDescription("Laporan Data Penelitian Non UPJ")
							   ->setKeywords("Penelitian Non UPJ");

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

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENELITIAN SUMBER DANA NON - UNIVERSITAS PEMBANGUNAN JAYA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Tahun Penelitian"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Judul Penelitian"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Sumber Dana"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Besaran Dana"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Ketua Peneliti");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Anggota Peneliti 1");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Anggota Peneliti 2");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Valid");

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

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$dokumen = $this->M_dokumen->listAll_dana_non_upj();	

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($dokumen as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tahun_penelitian);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->judul);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->sumber_dana);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->besaran_dana);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->ketua_peneliti);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->anggota_peneliti_1);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->anggota_peneliti_2);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->valid);
			
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
			
			$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(30);
			$excel->getActiveSheet()->getStyle('D5')->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('O5')->getAlignment()->setWrapText(true);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(50); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(6);
		
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Penelitian Non UPJ");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Penelitian Non UPJ.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}

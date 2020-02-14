<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KemenristekDikti extends CI_Controller {

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
		$query = $this->M_dokumen->listAll_kemenristek2();
		$byProdiName = implode((array) $kue[0]->prodi);
		$queryByProdi = $this->M_dokumen->listAllKemenristek_byProdi2($byProdiName);
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 		
		$dataHalaman = array(
			'query'=>$query,
			'queryByProdi' =>  $queryByProdi,
			'da' => $kue,
			'tampil_tahun'=> $query_tampil_tahun,
        );

		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('pengabdian/v_kemeristek_dikti');
		$this->load->view('dashboard/v_footer');
	}
	public function editdok($id) 
	{ 
		$usan = $this->session->userdata('nama');
		$kue = $this->M_login->hak_ak($usan); 
		$query = $this->M_dokumen->listEdit_dana_kemenristek($id);		
		$query_tampil_jenis = $this->M_dokumen->tampil_jenis_penelitian(); 
		$query_tampil_skema = $this->M_dokumen->tampil_skema_penelitian(); 
		$query_tampil_tahun = $this->M_dokumen->tampil_tahun(); 
		$query_tampil_dosen = $this->M_dokumen->tampil_dosen(); 
		$dataHalaman = array( 
			'query' =>  $query,
			'da' => $kue,
			'tampil_skema'=>$query_tampil_skema,
			'tampil_tahun'=> $query_tampil_tahun,
			'tampil_jenis'=> $query_tampil_jenis,
			'tampil_dosen'=>$query_tampil_dosen
        );
		$this->load->view('dashboard/v_header',$dataHalaman);
		$this->load->view('teditdata/v_edit_kemenristek');
		$this->load->view('dashboard/v_footer');
	}
	public function updatedok(){
		if ($this->input->post('btnUpload') == "Upload") {
			$_tahun_kegiatan = $this->input->post('tahun_kegiatan', TRUE);
			$_judul = $this->input->post('judul', TRUE);
			$_skema = $this->input->post('skema', TRUE);				
			$_jenis = $this->input->post('jenis', TRUE);
			$_dana_usulan = $this->input->post('dana_usulan', TRUE);
			$_dana_setujui = $this->input->post('dana_setujui', TRUE);
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
						'tahun_hibah' =>  $_tahun_kegiatan,
						'judul_penelitian' =>  $_judul,
						'skema_penelitian' =>  $_skema,
						'jenis_penelitian' =>  $_jenis,
						'dana_usulan' =>  $_dana_usulan,
						'dana_disetujui' =>  $_dana_setujui,
						'ketua_peneliti' =>  $_penulis,
						'anggota_peneliti_1' =>  $_anggota1,
						'anggota_peneliti_2' =>  $_anggota2
					);              
					$query= $this->M_dokumen->updateDok_dana_kemenristek($data,$id);
			if ($query) {
				redirect("pengabdian/KemenristekDikti");
			}
			else{
				redirect("pengabdian/KemenristekDikti");
			}
		}
	}
	public function deletedok($id){
		$this->db->where('kode_penelitan', $id);
        $query = $this->db->get('t_dana_kemenristek');
        $row = $query->row();
        unlink("./fileupload/penelitian_kemenristek/$row->file");/**======================================change here */
		$this->M_dokumen->deleteDok_dana_kemenristek($id);
		redirect('pengabdian/KemenristekDikti');
	} 
	public function validasi($id){            
		$query= $this->M_dokumen->validasi_dana_kemenristek($id);        
		if ($query) {
		  redirect("pengabdian/KemenristekDikti");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Validasi');		  
		  redirect("pengabdian/KemenristekDikti");
		}
	} 
	public function tolakvalidasi($id){
		$query= $this->M_dokumen->toval_dana_kemenristek($id);        
		if ($query) {
		  redirect("pengabdian/KemenristekDikti");
		}
		else{
		  $this->session->set_flashdata('notification', 'Gagal Melakukan Penolakan Validasi');		  
		  redirect("pengabdian/KemenristekDikti");
		}
	} 
	public function uploaddok(){
		if($this->input->post('btnUpload') == "Upload"){
			$config['upload_path'] = './fileupload/penelitian_kemenristek/';
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
			$query= $this->M_dokumen->uploadDok_dana_kemenristek($_upload,$id);
			if ($query) {
				redirect(site_url('pengabdian/KemenristekDikti'));
			}
			else{
				redirect(site_url('pengabdian/KemenristekDikti'));
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
							   ->setTitle("Data Penelitian UPJ")
							   ->setSubject("Penelitian")
							   ->setDescription("Laporan Semua Penelitian UPJ")
							   ->setKeywords("Data Penelitian UPJ");

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

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENELITIAN SUMBER DANA HIBAH DIKTI"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:L1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Tahun Hibah"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Judul Penelitian"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Jenis Penelitian"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Dana Usulan"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Dana Disetujui");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Skema Penelitian");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Ketua Peneliti");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Anggota Peneliti 1");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Anggota Peneliti 2");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Valid");
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Status");

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

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$dokumen = $this->M_dokumen->listAll_kemenristek();	

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($dokumen as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tahun_hibah);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->judul_penelitian);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jenis_penelitian);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->dana_usulan);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->dana_disetujui);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->skema_penelitian);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->ketua_peneliti);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->anggota_peneliti_1);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->anggota_peneliti_2);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->valid);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->status);
			
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
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(6);	
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
		
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Hibah Dikti");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Penelitian Kemenristek.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
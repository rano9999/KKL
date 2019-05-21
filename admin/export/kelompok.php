<?php
// Load file koneksi.php
include "../../library/config.php";

// Load plugin PHPExcel nya
require_once '../PHPExcel/PHPExcel.php';

$periode = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('My Notes Code')
					   ->setLastModifiedBy('My Notes Code')
					   ->setTitle("Data Siswa")
					   ->setSubject("Siswa")
					   ->setDescription("Laporan Semua Data Siswa")
					   ->setKeywords("Data Siswa");

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

$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KELOMPOK KKL STMIK AMIKOM PURWOKERTO PERIODE ".$periode['periode']);
$excel->setActiveSheetIndex(0)->setCellValue('A4', "Data Kormacam/Wakil Kormacam ".$periode['periode']);
$excel->getActiveSheet()->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->mergeCells('A4:F4'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
$excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1


// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A5', "NO"); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('B5', "NIM"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('C5', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('D5', "JK"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('E5', "NILAI STEADINESS"); // Set kolom E3 dengan tulisan "NILAID"
$excel->setActiveSheetIndex(0)->setCellValue('F5', "KEAKTIFAN"); // Set kolom F3 dengan tulisan "NILAI1"

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A12', "NO"); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('B12', "NIM"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('C12', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('D12', "JK"); // Set kolom E3 dengan tulisan "NILAID"
$excel->setActiveSheetIndex(0)->setCellValue('E12', "EMAIL"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('F12', "No HP"); // Set kolom E3 dengan tulisan "NILAID"
$excel->setActiveSheetIndex(0)->setCellValue('G12', "ALAMAT"); // Set kolom E3 dengan tulisan "NILAID"
$excel->setActiveSheetIndex(0)->setCellValue('H12', "PRODI"); // Set kolom E3 dengan tulisan "NILAID"
$excel->setActiveSheetIndex(0)->setCellValue('I12', "KATEGORI"); // Set kolom E3 dengan tulisan "NILAID"
$excel->setActiveSheetIndex(0)->setCellValue('J12', "KEAKTIFAN"); // Set kolom E3 dengan tulisan "NILAID"
$excel->setActiveSheetIndex(0)->setCellValue('K12', "KELOMPOK"); // Set kolom F3 dengan tulisan "NILAI1"

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('J12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('K12')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa
// $sql = $pdo->prepare("SELECT a.nim, a.nama, b.nim, b.kategori, b.nilaiD, b.nilaiI, b.nilaiS, b.nilaiC FROM siswa a, nilai b WHERE a.nim = b.nim");
// $sql->execute(); // Eksekusi querynya

$sql = mysqli_query($mysqli, "SELECT * FROM `kelompok`, `siswa` WHERE kelompok.nim = siswa.nim AND kelompok.periode = '$periode[periode]' ORDER BY kelompok.kelompok, kelompok.periode ASC");
$sql2 = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.kormacam = 'kormacam' ORDER BY siswa.keaktifan DESC");
$str = " ";

$no1 = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow1 = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
while ($data1 = mysqli_fetch_array($sql2)) { // Ambil semua data dari hasil eksekusi $sql
	if ($data1['keaktifan'] == 5) {
		$aktif = 'Ketua';
	} elseif ($data1['keaktifan'] == 4) {
		$aktif = 'Sekretaris';
	} elseif ($data1['keaktifan'] == 3) {
		$aktif = 'Bendahara';
	} elseif ($data1['keaktifan'] == 2) {
		$aktif = 'Koordinator';
	} elseif ($data1['keaktifan'] == 1) {
		$aktif = 'Anggota';
	} else {
		$aktif = 'Tidak ada';
	}
	$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow1, $no1);
	$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow1, $data1['nim']);
	$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow1, $data1['nama']);
	$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow1, $data1['jk']);
	$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow1, $data1['nilaiS']);
	$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow1, $aktif);


	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A' . $numrow1)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B' . $numrow1)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C' . $numrow1)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D' . $numrow1)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E' . $numrow1)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('F' . $numrow1)->applyFromArray($style_row);

	$excel->getActiveSheet()->getRowDimension($numrow1)->setRowHeight(20);

	$no1++; // Tambah 1 setiap kali looping
	$numrow1++; // Tambah 1 setiap kali looping
}


$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 13; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	if($data['keaktifan'] == 5){
		$aktif = 'Ketua';
	}elseif( $data['keaktifan'] == 4) {
		$aktif = 'Sekretaris';
	}elseif ($data['keaktifan'] == 3) {
		$aktif = 'Bendahara';
	}elseif ($data['keaktifan'] == 2) {
		$aktif = 'Koordinator';
	}elseif ($data['keaktifan'] == 1) {
		$aktif = 'Anggota';
	}else{
		$aktif = 'Tidak ada';
	}
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nim']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['nama']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['jk']);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data[ 'email']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['nohp']);
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['alamat']);
	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['prodi']);
	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['kategori']);
	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $aktif);
	$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, "Kelompok - ".$data['kelompok']);


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

	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);

	if ($no > 10) {
		$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $str);
		$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $str);

		// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);

		$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
		$no = 0;
	}

	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(35); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(6); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom F

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("DATA KELOMPOK KKL");
$excel->setActiveSheetIndex(0);
$kk = $periode['periode'];
// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Kelompok.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>

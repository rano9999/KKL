<?php
session_start();
include "../../library/config.php";
include "../../library/function_view.php";
$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));

if($_GET['action'] == "table_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM nilai WHERE periode = '$cek[periode]' AND kormacam != 'kormacam' ORDER BY status DESC");
   $data = array();
   $no = 1;
   while($r = mysqli_fetch_array($query)){
		$siswa= mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$r[nim]'"));
      if($r['status'] == 'ya'){
        $status = "Lolos Seleksi";
      }else{
        $status = "Tidak Lolos Seleksi";
      }
      $row = array();
      $row[] = $no++;
      $row[] = $r['nim'];
      $row[] = $siswa['nama'];
      $row[] = $r['kategori'];
      $row[] = $r['nilaiD'];
  	  $row[] = $r['nilaiI'];
  	  $row[] = $r['nilaiS'];
      $row[] = $r['nilaiC'];
  	  $row[] = $r['periode'];
  	  $row[] = $status;
      $data[] = $row;

   }
   $output = array("data" => $data);
   echo json_encode($output);
}
//Import data dari file Excel
elseif($_GET['action'] == "import"){
  $nama_file_baru = 'data2.xlsx';
  $per = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif='Ya'"));

  // Load librari PHPExcel nya
  require_once '../PHPExcel/PHPExcel.php';
  $path = "tmp";
  $loadexcel = move_uploaded_file($_FILES['file']['tmp_name'], "$path/$nama_file_baru");

  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  // Buat query Insert
	// $sql = $pdo->prepare("INSERT INTO nilai VALUES(:nim,:kategori,:nilaiD,:nilaiI,:nilaiS,:nilaiC,:periode)");
  $numrow = 1;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
    $nim = $row['B']; // Ambil data NIS
    $kategori = $row['C']; // Ambil data nama
    $nilaiD = $row['D']; // Ambil data jenis kelamin
    $nilaiI = $row['E']; // Ambil data jenis kelamin
    $nilaiS = $row['F']; // Ambil data jenis kelamin
    $nilaiC = $row['G']; // Ambil data jenis kelamin
    $periode = $per['periode'];
    // Cek jika semua data tidak diisi
    if(empty($nim) && empty($kategori))
      continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

    if($numrow > 1){
      // Proses simpan ke Database
      $qqq = mysqli_query($mysqli, "INSERT INTO nilai (nim,kategori,nilaiD,nilaiI,nilaiS,nilaiC,periode)
      VALUES ('$nim','$kategori','$nilaiD','$nilaiI','$nilaiS','$nilaiC','$periode')");
    }
    $numrow++; // Tambah 1 setiap kali looping
  }
  echo "ok";
}
?>

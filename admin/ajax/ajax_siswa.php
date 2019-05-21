<?php
session_start();
include "../../library/config.php";
include "../../library/function_view.php";

//Menampilkan data ke tabel
if($_GET['action'] == "table_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM siswa ORDER BY nim, periode DESC");
   $data = array();
   $no = 1;
   while($r = mysqli_fetch_array($query)){
      $row = array();
      $row[] = $no;
      $row[] = $r['nim'];
      $row[] = $r['nama'];
      $row[] = $r['email'];
      $row[] = substr(md5($r['nim']), 0, 5);
      $row[] = $r['nohp'];
      $row[] = $r['alamat'];
      $row[] = $r['jk'];
      $row[] = $r['prodi'];
      
      if ($r['keaktifan'] == 5) {
         $aktif = 'Ketua';
      } elseif ($r['keaktifan'] == 4) {
         $aktif = 'Sekretaris';
      } elseif ($r['keaktifan'] == 3) {
         $aktif = 'Bendahara';
      } elseif ($r['keaktifan'] == 2) {
         $aktif = 'Koordinator';
      } elseif ($r['keaktifan'] == 1) {
         $aktif = 'Anggota';
      } elseif ($r['keaktifan'] == 0) {
         $aktif = 'Tidak Ada';
      }

      $row[] = $aktif;
      $row[] = $r['periode'];
      if($r['validasi'] == 'Valid'){
         $row[] = create_label( $r['validasi'], "success");
      }else{
         $row[] = create_label($r['validasi'], "warning");
      }
      $row[] = create_action($r['nim']);
      $data[] = $row;
      $no++;
   }
   $output = array("data" => $data);
   echo json_encode($output);
}

//Menampilkan data ke form edit
elseif($_GET['action'] == "form_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$_GET[id]'");
   $data = mysqli_fetch_array($query);
   echo json_encode($data);
}

//Menambah data ke database
elseif($_GET['action'] == "insert"){
   // $password = md5(substr(md5($_POST['nim']),0,5));
   $jml = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$_POST[nim]'"));
   if($jml > 0){
      echo "nim Siswa sudah digunakan!";
   }else{
      mysqli_query($mysqli, "INSERT INTO siswa SET
         nim = '$_POST[nim]',
         nama = '$_POST[nama]',
         jk = '$_POST[jk]',
         periode= '$_POST[periode]',
         validasi= '$_POST[valid]'");
      echo "ok";
   }
}

//Mengedit data
elseif($_GET['action'] == "update"){
   mysqli_query($mysqli, "UPDATE siswa SET
       nama = '$_POST[nama]',
       jk = '$_POST[jk]',
       periode= '$_POST[periode]',
       validasi= '$_POST[valid]'
      WHERE nim='$_POST[nim]'");
   echo "ok";
}

//Menghapus data
elseif($_GET['action'] == "delete"){
   mysqli_query($mysqli, "DELETE FROM siswa WHERE nim='$_GET[id]'");
}

//Import data dari file Excel
elseif($_GET['action'] == "import"){
  $nama_file_baru = 'data.xlsx';

  // Load librari PHPExcel nya
  require_once '../PHPExcel/PHPExcel.php';
  $path = "tmp";
  $loadexcel = move_uploaded_file($_FILES['file']['tmp_name'], "$path/$nama_file_baru");
  $tahun = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('tmp/'.$nama_file_baru);
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  // Buat query Insert
	$sql = $pdo->prepare( "INSERT INTO siswa VALUES(:nim, :nama, :email, :pass, :alamat, :jk, :nohp, :prodi, :keaktifan, :periode, :tanda, :validasi)");
  $numrow = 1;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
    $nim = $row['B'];
    $nama = $row['C'];
    $jk = $row['D'];
    $email = $row['E'];
    $hp = $row['F'];
    $alamat = $row['G'];
    $prodi = $row['H'];
    $keaktifan = $row['I'];
    $pass = md5(substr(md5($nim), 0, 5));
    $periode = $tahun['periode'];
    $status = 'off';
    $validasi = 'Valid';

    if( $keaktifan == 'Ketua'){
       $aktif = 5;
    }elseif( $keaktifan == 'Sekretaris'){
       $aktif = 4;
    }elseif( $keaktifan == 'Bendahara'){
       $aktif = 3;
    }elseif ( $keaktifan == 'Koordinator'){
       $aktif = 2;
    }elseif ( $keaktifan == 'Anggota'){
       $aktif = 1;
    } elseif ($keaktifan == 'Tidak ada') {
       $aktif = 0;
    }

    if(empty($nim) && empty($nama) && empty($pass) && empty($jk))
      continue;

    if($numrow > 1){
      // Proses simpan ke Database
      $sql->bindParam(':nim', $nim);
      $sql->bindParam(':nama', $nama);
      $sql->bindParam( ':email', $email);
      $sql->bindParam( ':pass', $pass);
      $sql->bindParam( ':alamat', $alamat);
      $sql->bindParam(':jk', $jk);
      $sql->bindParam(':nohp', $hp);
      $sql->bindParam(':prodi', $prodi);
      $sql->bindParam(':keaktifan', $aktif);
      $sql->bindParam(':periode', $periode);
      $sql->bindParam(':tanda', $status);
      $sql->bindParam(':validasi', $validasi);
      $sql->execute();
    }
    $numrow++;
  }
  echo "ok"; 
}
?>

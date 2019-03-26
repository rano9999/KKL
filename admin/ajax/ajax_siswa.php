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
      $row[] = $r['jk'];
      $row[] = $r['kategori'];
      $row[] = $r['periode'];
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
         kategori= '$_POST[kategori]'");
      echo "ok";
   }
}

//Mengedit data
elseif($_GET['action'] == "update"){
   mysqli_query($mysqli, "UPDATE siswa SET
       nama = '$_POST[nama]',
       jk = '$_POST[jk]',
       periode= '$_POST[periode]',
       kategori= '$_POST[kategori]'
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

  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  // Buat query Insert
	$sql = $pdo->prepare("INSERT INTO siswa VALUES(:nim,:nama,:password,:jk,:periode,:kategori)");
  $numrow = 1;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
    $nim = $row['B']; // Ambil data NIS
    $nama = $row['C']; // Ambil data nama
    $pass = md5(substr(md5($nim),0,5));
    $jk = $row['D']; // Ambil data jenis kelamin
    $kategori = $row['E']; // Ambil data jenis kelamin
    $periode = $row['F']; // Ambil data jenis kelamin

    // Cek jika semua data tidak diisi
    if(empty($nim) && empty($nama) && empty($pass) && empty($jk))
      continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

    // Cek $numrow apakah lebih dari 1
    // Artinya karena baris pertama adalah nama-nama kolom
    // Jadi dilewat saja, tidak usah diimport
    if($numrow > 1){
      // Proses simpan ke Database
      $sql->bindParam(':nim', $nim);
      $sql->bindParam(':nama', $nama);
      $sql->bindParam(':password', $pass);
      $sql->bindParam(':jk', $jk);
      $sql->bindParam(':periode', $periode);
      $sql->bindParam(':kategori', $kategori);
      $sql->execute(); // Eksekusi query insert
    }
    $numrow++; // Tambah 1 setiap kali looping
  }
  echo "ok";
}

// elseif($_GET['action'] == "import"){
//    include "../../assets/excel_reader/excel_reader2.php";
//    $filename = strtolower($_FILES['file']['name']);
//    $extensi  = substr($filename,-4);
//
//    if($extensi != ".xlsx"){
//       echo "File yang di-upload tidak berformat .xls!'";
//    }else{
//       $path = "../tmp";
//       move_uploaded_file($_FILES['file']['tmp_name'], "$path/$filename");
//
//       $file = "../tmp/$filename";
//
//       $data = new Spreadsheet_Excel_Reader();
//       $data->read($file);
//       $jdata = $data->rowcount($sheet_index=0);
//
//       for($i=2; $i<=$jdata; $i++){
//          $nim = addslashes(str_replace(" ", "", $data->val($i,2)));
//          $nama = addslashes($data->val($i,3));
//          $jk = addslashes($data->val($i,5));
//          $periode = addslashes($data->val($i,6));
//
//          $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$nim'"));
//          if($cek > 0){
//             mysqli_query($mysqli, "UPDATE siswa SET nama='$nama', id_kelas='$_POST[kelas_import]', jk = '$jk', periode = '$periode' WHERE  nim='$nim'");
//          }else{
//             $pass = md5(substr(md5($nim),0,5));
//             mysqli_query($mysqli, "INSERT INTO siswa SET nim='$nim', nama='$nama', id_kelas='$_POST[kelas_import]', password='$pass', jk = '$jk', periode = '$periode', status='off'");
//          }
//       }
//
//       unlink($file);
//       echo "ok";
//    }
// }
?>

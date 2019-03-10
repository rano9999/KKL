<?php
session_start();
include "../../library/config.php";
include "../../library/function_view.php";

//Menampilkan data ke tabel
if($_GET['action'] == "table_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM `kelompok` ORDER BY kelompok.kelompok, kelompok.periode ASC");
   $data = array();
   $no = 1;
   while($r = mysqli_fetch_array($query)){
      $siswa = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$r[nim]'"));
      $row = array();
      $row[] = $no++;
      $row[] = $r['nim'];
      $row[] = $siswa['nama'];
      $row[] = $siswa['jk'];
      $row[] = $r['kategori'];
      $row[] = "Kelompok - " . $r['kelompok'];
  	  $row[] = $r['periode'];
      $data[] = $row;
      // $no++;
   }

   $output = array("data" => $data);
   echo json_encode($output);
}elseif ($_GET['action'] == "all_data") {

  if($_POST["query"] != '')
  {
   $search_array = explode(",", $_POST["query"]);
   $search_text = "'" . implode("', '", $search_array) . "'";
   $query = "
   SELECT * FROM kelompok, siswa
   WHERE kelompok.nim = siswa.nim AND kelompok.periode IN (".$search_text.")
   ORDER BY kelompok.kelompok, kelompok.periode ASC
   ";
  }
  else
  {
   $query = "SELECT * FROM kelompok, siswa WHERE kelompok.nim = siswa.nim ORDER BY kelompok.id DESC";
  }

  $statement = $pdo->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  $total_row = $statement->rowCount();

  $output = '';
  $no = 1;

  if($total_row > 0)
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td>'.$no.'</td>
     <td>'.$row["nim"].'</td>
     <td>'.$row["nama"].'</td>
     <td>'.$row["jk"].'</td>
     <td>'.$row["kategori"].'</td>
     <td>Kelompok - '.$row["kelompok"].'</td>
     <td>'.$row["periode"].'</td>
    </tr>
    ';
    $no++;
   }
  }
  else
  {
   $output .= '
   <tr>
    <td colspan="7" align="center">No Data Found</td>
   </tr>
   ';
  }

  echo $output;
}


//Menampilkan data ke form edit
elseif($_GET['action'] == "form_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$_GET[id]'");
   $data = mysqli_fetch_array($query);
   echo json_encode($data);
}

//Menambah data ke database
elseif($_GET['action'] == "insert"){
   $password = md5(substr(md5($_POST['nim']),0,5));
   $jml = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$_POST[nim]'"));
   if($jml > 0){
      echo "nim Siswa sudah digunakan!";
   }else{
      mysqli_query($mysqli, "INSERT INTO siswa SET
         nim = '$_POST[nim]',
         nama = '$_POST[nama]',
         password = '$password',
         id_kelas= '$_POST[kelas]',
         jk = '$_POST[jk]',
         periode= '$_POST[periode]',
         status= 'off'");
      echo "ok";
   }
}

//Mengedit data
elseif($_GET['action'] == "update"){
   mysqli_query($mysqli, "UPDATE siswa SET
       nama = '$_POST[nama]',
       id_kelas= '$_POST[kelas]',
       jk = '$_POST[jk]',
       periode= '$_POST[periode]'
      WHERE nim='$_POST[nim]'");
   echo "ok";
}

//Menghapus data
elseif($_GET['action'] == "delete"){
   mysqli_query($mysqli, "DELETE FROM siswa WHERE nim='$_GET[id]'");
}

//Import data dari file Excel
elseif($_GET['action'] == "import"){
   include "../../assets/excel_reader/excel_reader.php";
   $filename = strtolower($_FILES['file']['name']);
   $extensi  = substr($filename,-4);

   if($extensi != ".xls"){
      echo "File yang di-upload tidak berformat .xls!'";
   }else{
      $path = "../upload";
      move_uploaded_file($_FILES['file']['tmp_name'], "$path/$filename");

      $file = "../upload/$filename";

      $data = new Spreadsheet_Excel_Reader();
      $data->read($file);
      $jdata = $data->rowcount($sheet_index=0);

      for($i=2; $i<=$jdata; $i++){
         $nim = addslashes(str_replace(" ", "", $data->val($i,2)));
         $nama	= addslashes($data->val($i,3));
         $periode	= addslashes($data->val($i,4));

         $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$nim'"));
         if($cek > 0){
            mysqli_query($mysqli, "UPDATE siswa SET nama='$nama', id_kelas='$_POST[kelas_import]' WHERE  nim='$nim'");
         }else{
            $pass = md5(substr(md5($nim),0,5));
            mysqli_query($mysqli, "INSERT INTO siswa SET nim='$nim', nama='$nama', id_kelas='$_POST[kelas_import]', password='$pass', periode='$periode' status='off'");
         }
      }

      unlink($file);
      echo "ok";
   }
}

elseif($_GET['action'] == "import"){
   include "../../assets/excel_reader/excel_reader.php";
   $filename = strtolower($_FILES['file']['name']);
   $extensi  = substr($filename,-4);

   if($extensi != ".xls"){
      echo "File yang di-upload tidak berformat .xls!'";
   }else{
      $path = "../upload";
      move_uploaded_file($_FILES['file']['tmp_name'], "$path/$filename");

      $file = "../upload/$filename";

      $data = new Spreadsheet_Excel_Reader();
      $data->read($file);
      $jdata = $data->rowcount($sheet_index=0);

      for($i=2; $i<=$jdata; $i++){
         $nim = addslashes(str_replace(" ", "", $data->val($i,2)));
         $nama = addslashes($data->val($i,3));

         $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$nim'"));
         if($cek > 0){
            mysqli_query($mysqli, "UPDATE siswa SET nama='$nama', id_kelas='$_POST[kelas_import]' WHERE  nim='$nim'");
         }else{
            $pass = md5(substr(md5($nim),0,5));
            mysqli_query($mysqli, "INSERT INTO siswa SET nim='$nim', nama='$nama', id_kelas='$_POST[kelas_import]', password='$pass', status='off'");
         }
      }

      unlink($file);
      echo "ok";
   }
}
?>

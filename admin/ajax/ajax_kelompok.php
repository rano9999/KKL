<?php
session_start();
include "../../library/config.php";
include "../../library/function_view.php";

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));

//Menampilkan data ke tabel
if($_GET['action'] == "table_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM `kelompok` WHERE periode = '$cek[periode]' ORDER BY kelompok.kelompok, kelompok.periode, kelompok.kategori ASC");
   $data = array();
   $no = 1;
   while($r = mysqli_fetch_array($query)){
      $siswa = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim='$r[nim]'"));
      $row = array();
      $row[] = $no++;
      $row[] = $r['nim'];
      $row[] = $siswa['nama'];
      $row[] = $siswa['jk'];
      $row[] = $siswa['id_kelas'];
      $row[] = $r['kategori'];
      $row[] = "Kelompok/Desa - " . $r['kelompok'];
  	  $row[] = $r['periode'];
      $data[] = $row;
      // $no++;
   }

   $output = array("data" => $data);
   echo json_encode($output);
}


?>

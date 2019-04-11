<?php
session_start();
include "../../library/config.php";
include "../../library/function_view.php";

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));

//Menampilkan data ke tabel
if($_GET['action'] == "table_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM `kelompok`,`siswa` WHERE kelompok.nim = siswa.nim AND kelompok.periode = '$cek[periode]'
     ORDER BY kelompok.kelompok, kelompok.periode, siswa.jk ASC");
   $data = array();
   $no = 1;
   while($r = mysqli_fetch_array($query)){
      $row = array();
      $row[] = $no++;
      $row[] = $r['nim'];
      $row[] = $r['nama'];
      $row[] = $r['jk'];
      $row[] = $r['kategori'];
      $row[] = "Kelompok/Desa - " . $r['kelompok'];
  	  $row[] = $r['periode'];
      $data[] = $row;
   }
   $output = array("data" => $data);
   echo json_encode($output);
}
?>

<?php
session_start();
include "../../library/config.php";

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$periode = $cek['periode'];
$jml = $cek['jml_kel'];

$cekL = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(siswa.jk) as jml_L FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.jk = 'L' AND nilai.periode = '$periode'"));
$cekP = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(siswa.jk) as jml_P FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.jk = 'P' AND nilai.periode = '$periode'"));

$qL = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' ORDER BY nilai.kategori ASC");
$qP = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.jk = 'P' AND nilai.periode = '$periode' ORDER BY nilai.kategori ASC");
$countL = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(id) as jmlid from kel_laki WHERE periode = '$periode'"));
$countP = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(id) as jmlid from kel_perempuan WHERE periode = '$periode'"));

$md = 1;
while ($kl = mysqli_fetch_array($qL)) {
  if($md > $jml && $md < $countL['jmlid']){
    $md = 1;
  }

  $cekDK = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE periode = '$periode' AND nim = '$kl[nim]'"));
  if($cekDK > 0){

  }else{
  $result2 = mysqli_query($mysqli, "INSERT into kelompok (nim,kategori,kelompok,periode) VALUES ('$kl[nim]','$kl[kategori]','$md','$periode')");
  }
  $md++;
}

echo "<br>";

$mh = 1;
while ($kP = mysqli_fetch_array($qP)) {
  if($mh > $jml && $mh < $countP['jmlid']){
    $mh = 1;

  }
  
  $cekDK = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE periode = '$periode' AND nim = '$kP[nim]'"));
  if($cekDK > 0){

  }else{
  $result2 = mysqli_query($mysqli, "INSERT into kelompok (nim,kategori,kelompok,periode) VALUES ('$kP[nim]','$kP[kategori]','$mh','$periode')");
  }
  $mh++;
}

 ?>

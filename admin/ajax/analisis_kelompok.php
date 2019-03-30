<?php
session_start();
include "../../library/config.php";

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$periode = $cek['periode'];
$jml = $cek['jml_kel'];

$result = mysqli_query($mysqli, "SELECT * FROM siswa WHERE periode = '$cek[periode]' ORDER BY jk ASC");

while ($a = mysqli_fetch_array($result)) {

  if($a['kategori'] == 'Dominant'){
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_d WHERE nim = '$a[nim]'"));
    if($cek > 0){
      // mysqli_query($mysqli, "UPDATE penampung_d SET periode = '$a[periode]', kategori = 'Dominant', jk = '$a[jk]' WHERE nim = '$a[nim]'");
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_d (nim,periode,kategori,jk) VALUES ('$a[nim]','$a[periode]','Dominant','$a[jk]')");
    }
  }elseif ($a['kategori'] == 'Influencing') {
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_i WHERE nim = '$a[nim]'"));
    if($cek > 0){
      // mysqli_query($mysqli, "UPDATE penampung_i SET periode = '$a[periode]', kategori = 'Influencing', jk = '$a[jk]' WHERE nim = '$a[nim]'");
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_i (nim,periode,kategori,jk) VALUES ('$a[nim]','$a[periode]','Influencing','$a[jk]')");
    }
  }elseif ($a['kategori'] == 'Steadiness') {
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_s WHERE nim = '$a[nim]'"));
    if($cek > 0){
      // mysqli_query($mysqli, "UPDATE penampung_s SET periode = '$a[periode]', kategori = 'Steadiness', jk = '$a[jk]' WHERE nim = '$a[nim]'");
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_s (nim,periode,kategori,jk) VALUES ('$a[nim]','$a[periode]','Steadiness','$a[jk]')");
    }
  }elseif($a['kategori'] == 'Conscientiousness'){
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_c WHERE nim = '$a[nim]'"));
    if($cek > 0){
      // mysqli_query($mysqli, "UPDATE penampung_c SET periode = '$a[periode]', kategori = 'Conscientiousness', jk = '$a[jk]' WHERE nim = '$a[nim]'");
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_c (nim,periode,kategori,jk) VALUES ('$a[nim]','$a[periode]','Conscientiousness','$a[jk]')");
    }
  }
}

$cekL = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(siswa.jk) as jml_L FROM  siswa WHERE jk = 'L' AND periode = '$periode'"));
$cekP = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(siswa.jk) as jml_P FROM  siswa WHERE jk = 'P' AND periode = '$periode'"));

$countL = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(id) as jmlid from kel_penampung WHERE periode = '$periode'"));

$md = 1;
while ($kl = mysqli_fetch_array($result)) {
  if($md > $jml && $md < $countL['jmlid']){
    $md = 1;
  }
  $qcL = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kel_penampung WHERE nim = '$kl[nim]' AND periode = '$periode'"));
  if($qcL > 0){

  }else{
    mysqli_query($mysqli, "INSERT INTO kel_penampung (nim,kategori,periode,jk) VALUES ('$kl[nim]','$kl[kategori]','$periode','$kl[jk]')");
  }

  $md++;
}


 ?>

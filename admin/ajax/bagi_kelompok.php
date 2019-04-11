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
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_d (nim,periode,kategori,jk) VALUES ('$a[nim]','$a[periode]','Dominant','$a[jk]')");
    }
  }elseif ($a['kategori'] == 'Influencing') {
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_i WHERE nim = '$a[nim]'"));
    if($cek > 0){
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_i (nim,periode,kategori,jk) VALUES ('$a[nim]','$a[periode]','Influencing','$a[jk]')");
    }
  }elseif ($a['kategori'] == 'Steadiness') {
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_s WHERE nim = '$a[nim]'"));
    if($cek > 0){
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_s (nim,periode,kategori,jk) VALUES ('$a[nim]','$a[periode]','Steadiness','$a[jk]')");
    }
  }elseif($a['kategori'] == 'Conscientiousness'){
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_c WHERE nim = '$a[nim]'"));
    if($cek > 0){
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_c (nim,periode,kategori,jk) VALUES ('$a[nim]','$a[periode]','Conscientiousness','$a[jk]')");
    }
  }
}

$ckL = mysqli_query($mysqli, "SELECT * FROM siswa WHERE jk = 'L' AND periode = '$periode' ORDER BY tipe ASC");
$ckP = mysqli_query($mysqli, "SELECT * FROM siswa WHERE jk = 'P' AND periode = '$periode' ORDER BY tipe ASC");
$n = 1;
$m = $jml;
while ($b = mysqli_fetch_array($ckL)) {
  if ($n > $jml) {
    $n = 1;
  }
  echo $b['nim']." ".$b['kategori']." ".$n."<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$b[nim]'"));
  if($cekdulu > 0){

  }else{
  mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$b[nim]','$b[kategori]','$n','$periode','$b[jk]')");
  }
  $n++;
}
echo "<br>";
while ($c = mysqli_fetch_array($ckP)) {
  if ($m < 1) {
    $m = $jml;
  }
  echo $c['nim']." ".$c['kategori']." ".$m."<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$c[nim]'"));
  if($cekdulu > 0){

  }else{
    mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$c[nim]','$c[kategori]','$m','$periode','$c[jk]')");
  }
  $m--;
}

 ?>

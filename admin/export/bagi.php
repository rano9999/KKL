<?php
session_start();
include "../../library/config.php";

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$jml = $cek['jml_kel'];
$periode = $cek['periode'];
$result = mysqli_query($mysqli, "SELECT * FROM nilai WHERE periode = '$cek[periode]'");

while ($a = mysqli_fetch_array($result)) {
  if($a['kategori'] == 'Dominant'){
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_d WHERE nim = '$a[nim]'"));
    if($cek > 0){
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_d (nim,periode,kategori) VALUES ('$a[nim]','$a[periode]','Dominant')");
    }
  }elseif ($a['kategori'] == 'Influencing') {
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_i WHERE nim = '$a[nim]'"));
    if($cek > 0){
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_i (nim,periode,kategori) VALUES ('$a[nim]','$a[periode]','Influencing')");
    }
  }elseif ($a['kategori'] == 'Steadiness') {
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_s WHERE nim = '$a[nim]'"));
    if($cek > 0){
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_s (nim,periode,kategori) VALUES ('$a[nim]','$a[periode]','Steadiness')");
    }
  }elseif($a['kategori'] == 'Conscientiousness'){
    $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_c WHERE nim = '$a[nim]'"));
    if($cek > 0){
    }else{
      mysqli_query($mysqli, "INSERT INTO penampung_c (nim,periode,kategori) VALUES ('$a[nim]','$a[periode]','Conscientiousness')");
    }
  }
}

$cekD = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_d WHERE periode = '$periode'"));
$cekDF = mysqli_query($mysqli, "SELECT * FROM penampung_d WHERE periode = '$periode'");
$cekCD = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *,count(id) as jml_d FROM penampung_d WHERE periode = '$periode'"));
$cekI = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_i WHERE periode = '$periode'"));
$cekIF = mysqli_query($mysqli, "SELECT * FROM penampung_i WHERE periode = '$periode'");
$cekCI = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *,count(id) as jml_i FROM penampung_i WHERE periode = '$periode'"));
$cekS = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_s WHERE periode = '$periode'"));
$cekSF = mysqli_query($mysqli, "SELECT * FROM penampung_s WHERE periode = '$periode'");
$cekCS = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *,count(id) as jml_s FROM penampung_s WHERE periode = '$periode'"));
$cekC = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM penampung_c WHERE periode = '$periode'"));
$cekCF = mysqli_query($mysqli, "SELECT * FROM penampung_c WHERE periode = '$periode'");
$cekCC = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *,count(id) as jml_c FROM penampung_c WHERE periode = '$periode'"));

$d = 1;
if($cekD > 0){
  while ($b = mysqli_fetch_array($cekDF)) {
    if($d > $jml && $d <= $cekCD['jml_d']){
      $d = 1;
    }
    $query = "UPDATE penampung_d SET kelompok = 'Kelompok - $d' WHERE nim = '$b[nim]'";
    $result1 = mysqli_query($mysqli, $query) or die(mysqli_error());
    $cekDK = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE periode = '$periode' AND nim = '$b[nim]'"));
    if($cekDK > 0){

    }else{
    $result2 = mysqli_query($mysqli, "INSERT into kelompok (nim,kategori,kelompok,periode) VALUES ('$b[nim]','Dominant','Kelompok - $d','$periode')");
    }
    $d++;
  }
}else{
}

$i = 1;
if($cekI > 0){
  while ($b = mysqli_fetch_array($cekIF)) {
    if($i > $jml && $i <= $cekCI['jml_i']){
      $i = 1;
    }
    $query = "UPDATE penampung_i SET kelompok = 'Kelompok - $i' WHERE nim = '$b[nim]'";
    $result1 = mysqli_query($mysqli, $query) or die(mysqli_error());
    $cekIK = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE periode = '$periode' AND nim = '$b[nim]'"));
    if($cekIK > 0){

    }else{
    $result2 = mysqli_query($mysqli, "INSERT into kelompok (nim,kategori,kelompok,periode) VALUES ('$b[nim]','Influencing','Kelompok - $i','$periode')");
    }
    $i++;
  }
}else{
}

$s = 1;
if($cekS > 0){
  while ($b = mysqli_fetch_array($cekSF)) {
    if($s > $jml && $s <= $cekCS['jml_s']){
      $s = 1;
    }
    $query = "UPDATE penampung_s SET kelompok = 'Kelompok - $s' WHERE nim = '$b[nim]'";
    $result1 = mysqli_query($mysqli, $query) or die(mysqli_error());
    $cekSK = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE periode = '$periode' AND nim = '$b[nim]'"));
    if($cekIK > 0){

    }else{
    $result2 = mysqli_query($mysqli, "INSERT into kelompok (nim,kategori,kelompok,periode) VALUES ('$b[nim]','Steadiness','Kelompok - $s','$periode')");
    }
    $s++;
  }
}else{
}

$c = 1;
if($cekC > 0){
  while ($b = mysqli_fetch_array($cekCF)) {
    if($c > $jml && $c <= $cekCC['jml_c']){
      $c = 1;
    }
    $query = "UPDATE penampung_c SET kelompok = 'Kelompok - $c' WHERE nim = '$b[nim]'";
    $result1 = mysqli_query($mysqli, $query) or die(mysqli_error());
    $cekCK = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE periode = '$periode' AND nim = '$b[nim]'"));
    if($cekIK > 0){

    }else{
    $result2 = mysqli_query($mysqli, "INSERT into kelompok (nim,kategori,kelompok,periode) VALUES ('$b[nim]','Conscientiousness','Kelompok - $c','$periode')");
    }
    $c++;
    echo "ok";
  }
}else{
}



 ?>

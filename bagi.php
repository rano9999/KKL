<?php
include "library/config.php";

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$periode = $cek['periode'];
$jml = $cek['jml_kel'];

$result = mysqli_query($mysqli, "SELECT * FROM nilai,siswa WHERE nilai.nim = siswa.nim AND nilai.periode = '$cek[periode]' ORDER BY siswa.jk ASC");

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

$cek1 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nim) as jml_nilai FROM siswa WHERE periode = '$periode'"));
$cekL = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(jk) as jml_L FROM siswa WHERE jk = 'L' AND periode = '$periode'"));
$cekP = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(jk) as jml_P FROM siswa WHERE jk = 'P' AND periode = '$periode'"));

$jml_p = $cek1['jml_nilai'];
echo "Jumlah kelompok = " . $jml . "<br>";
echo "Jumlah peserta = " . $cek1['jml_nilai'] . "<br>";
echo "Jumlah peserta laki-laki = " . $cekL['jml_L'] . "<br>";
echo "Jumlah peserta laki-laki tiap kelompok = " . ceil($cekL['jml_L']/$jml) . "<br>";
echo "Jumlah peserta perempuan = " . $cekP['jml_P'] . "<br>";
echo "Jumlah peserta perempuan tiap kelompok = " . ceil($cekP['jml_P']/$jml) . "<br>";
echo "Jumlah kelompok setelah dibagi = " . ceil($jml_p/$jml) . "<br>";

$ckL = mysqli_query($mysqli, "SELECT * FROM siswa WHERE jk = 'L' AND periode = '$periode' ORDER BY kategori ASC");
$ckP = mysqli_query($mysqli, "SELECT * FROM siswa WHERE jk = 'P' AND periode = '$periode' ORDER BY kategori ASC");
$n = 1;
$m = 26;
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
    $m = 26;
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

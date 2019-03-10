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

$cek1 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(id_nilai) as jml_nilai FROM nilai WHERE periode = '$periode'"));
$cekL = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(siswa.jk) as jml_L FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.jk = 'L' AND nilai.periode = '$periode'"));
$cekP = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(siswa.jk) as jml_P FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.jk = 'P' AND nilai.periode = '$periode'"));

$jml_p = $cek1['jml_nilai'];
echo "Jumlah kelompok = " . $jml . "<br>";
echo "Jumlah peserta = " . $cek1['jml_nilai'] . "<br>";
echo "Jumlah peserta laki-laki = " . $cekL['jml_L'] . "<br>";
echo "Jumlah peserta laki-laki tiap kelompok = " . ceil($cekL['jml_L']/$jml) . "<br>";
echo "Jumlah peserta perempuan = " . $cekP['jml_P'] . "<br>";
echo "Jumlah peserta perempuan tiap kelompok = " . ceil($cekP['jml_P']/$jml) . "<br>";
echo "Jumlah kelompok setelah dibagi = " . ceil($jml_p/$jml) . "<br>";

$dd = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(id) as jml FROM penampung_d WHERE periode = '$periode'"));
$dl = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(jk) as jml_l FROM penampung_d WHERE jk = 'L' AND periode = '$periode'"));
$dp = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(jk) as jml_p FROM penampung_d WHERE jk = 'P' AND periode = '$periode'"));

$ii = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(id) as jml FROM penampung_i WHERE periode = '$periode'"));
$il = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(jk) as jml_l FROM penampung_i WHERE jk = 'L' AND periode = '$periode'"));
$ip = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(jk) as jml_p FROM penampung_i WHERE jk = 'P' AND periode = '$periode'"));

$ss = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(id) as jml FROM penampung_s WHERE periode = '$periode'"));
$sl = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(jk) as jml_l FROM penampung_s WHERE jk = 'L' AND periode = '$periode'"));
$sp = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(jk) as jml_p FROM penampung_s WHERE jk = 'P' AND periode = '$periode'"));

$cc = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(id) as jml FROM penampung_c WHERE periode = '$periode'"));
$cl = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(jk) as jml_l FROM penampung_c WHERE jk = 'L' AND periode = '$periode'"));
$cp = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, count(jk) as jml_p FROM penampung_c WHERE jk = 'P' AND periode = '$periode'"));

 ?>
 <h5>Jumlah mahasiswa dengan tipe Dominant = <?= $dd['jml'] ?> <br> Jumlah mahasiswa dengan tipe Dominant laki laki = <?= $dl['jml_l'] ?> <br> Jumlah mahasiswa dengan tipe Dominant perempuan = <?= $dp['jml_p'] ?> </h5>
 <hr>
 <h5>Jumlah mahasiswa dengan tipe Influencing = <?= $ii['jml'] ?> <br> Jumlah mahasiswa dengan tipe Influencing laki laki = <?= $il['jml_l'] ?> <br> Jumlah mahasiswa dengan tipe Influencing perempuan = <?= $ip['jml_p'] ?> </h5>
 <hr>
 <h5>Jumlah mahasiswa dengan tipe Steadiness = <?= $ss['jml'] ?> <br> Jumlah mahasiswa dengan tipe Steadiness laki laki = <?= $sl['jml_l'] ?> <br> Jumlah mahasiswa dengan tipe Steadiness perempuan = <?= $sp['jml_p'] ?> </h5>
 <hr>
 <h5>Jumlah mahasiswa dengan tipe Conscientiousness = <?= $cc['jml'] ?> <br> Jumlah mahasiswa dengan tipe Conscientiousness laki laki = <?= $cl['jml_l'] ?> <br> Jumlah mahasiswa dengan tipe Conscientiousness perempuan = <?= $cp['jml_p'] ?> </h5>
<?php

$qL = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' ORDER BY nilai.kategori ASC");
$qLarray = array();
$qP = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.jk = 'P' AND nilai.periode = '$periode' ORDER BY nilai.kategori ASC");
$qParray = array();
$countL = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(id) as jmlid from kel_laki WHERE periode = '$periode'"));
$countP = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(id) as jmlid from kel_perempuan WHERE periode = '$periode'"));

$jmlLaki = $cekL['jml_L']/$jml;
$jmlPP = $cekP['jml_P']/$jml;

$md = 1;
while ($kl = mysqli_fetch_array($qL)) {
  if($md > $jml && $md < $countL['jmlid']){
    $md = 1;
  }

  echo $md."<br>";
  $qcL = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kel_laki WHERE nim = '$kl[nim]' AND periode = '$periode'"));
  if($qcL > 0){
    
  }else{
    mysqli_query($mysqli, "INSERT INTO kel_laki (nim,kategori,periode) VALUES ('$kl[nim]','$kl[kategori]','$periode')");
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
  // echo $mh."<br>";
  $qcP = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kel_perempuan WHERE nim = '$kP[nim]' AND periode = '$periode'"));
  if($qcP > 0){

  }else{
    mysqli_query($mysqli, "INSERT INTO kel_perempuan (nim,kategori,periode) VALUES ('$kP[nim]','$kP[kategori]','$periode')");
  }
  $cekDK = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE periode = '$periode' AND nim = '$kP[nim]'"));
  if($cekDK > 0){

  }else{
  $result2 = mysqli_query($mysqli, "INSERT into kelompok (nim,kategori,kelompok,periode) VALUES ('$kP[nim]','$kP[kategori]','$mh','$periode')");
  }
  $mh++;
}

$li = mysqli_fetch_array(mysqli_query($mysqli,"SELECT max(kelompok) as max, min(kelompok) as min FROM kelompok WHERE periode = '$periode'"));
echo $li['max']."<br>";
echo $li['min']."<br>";
for ($v=1; $v <= $li['max'] ; $v++) {

  $lihat = mysqli_fetch_array(mysqli_query($mysqli,"SELECT *, count(id) as jmlKel FROM kelompok WHERE kelompok = '$v'"));
  echo $lihat['kelompok']." = ".$lihat['jmlKel']."<br>";

}


 ?>

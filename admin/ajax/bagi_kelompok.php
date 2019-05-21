<?php
session_start();
include "../../library/config.php";

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$periode = $cek['periode'];
$jml = $cek['jml_kel'];

$result = mysqli_query($mysqli, "SELECT * FROM siswa, nilai WHERE siswa.nim = nilai.nim AND siswa.validasi = 'Valid' AND siswa.periode = '$cek[periode]' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota' ORDER BY siswa.jk ASC");


$ckLD = mysqli_query($mysqli, "SELECT * FROM siswa, nilai WHERE siswa.nim = nilai.nim AND siswa.jk = 'L' AND siswa.validasi = 'Valid' AND siswa.periode = '$cek[periode]' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota' AND nilai.kategori = 'Dominant' ORDER BY nilai.kategori ASC");
$ckPD = mysqli_query($mysqli, "SELECT * FROM siswa, nilai WHERE siswa.nim = nilai.nim AND siswa.jk = 'P' AND siswa.validasi = 'Valid' AND siswa.periode = '$cek[periode]' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota' AND nilai.kategori = 'Dominant' ORDER BY nilai.kategori ASC");

$ckLI = mysqli_query($mysqli, "SELECT * FROM siswa, nilai WHERE siswa.nim = nilai.nim AND siswa.jk = 'L' AND siswa.validasi = 'Valid' AND siswa.periode = '$cek[periode]' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota' AND nilai.kategori = 'Influencing' ORDER BY nilai.kategori ASC");
$ckPI = mysqli_query($mysqli, "SELECT * FROM siswa, nilai WHERE siswa.nim = nilai.nim AND siswa.jk = 'P' AND siswa.validasi = 'Valid' AND siswa.periode = '$cek[periode]' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota' AND nilai.kategori = 'Influencing' ORDER BY nilai.kategori ASC");

$ckLS = mysqli_query($mysqli, "SELECT * FROM siswa, nilai WHERE siswa.nim = nilai.nim AND siswa.jk = 'L' AND siswa.validasi = 'Valid' AND siswa.periode = '$cek[periode]' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota' AND nilai.kategori = 'Steadiness' ORDER BY nilai.kategori ASC");
$ckPS = mysqli_query($mysqli, "SELECT * FROM siswa, nilai WHERE siswa.nim = nilai.nim AND siswa.jk = 'P' AND siswa.validasi = 'Valid' AND siswa.periode = '$cek[periode]' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota' AND nilai.kategori = 'Steadiness' ORDER BY nilai.kategori ASC");

$ckLC = mysqli_query($mysqli, "SELECT * FROM siswa, nilai WHERE siswa.nim = nilai.nim AND siswa.jk = 'L' AND siswa.validasi = 'Valid' AND siswa.periode = '$cek[periode]' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota' AND nilai.kategori = 'Compliance' ORDER BY nilai.kategori ASC");
$ckPC = mysqli_query($mysqli, "SELECT * FROM siswa, nilai WHERE siswa.nim = nilai.nim AND siswa.jk = 'P' AND siswa.validasi = 'Valid' AND siswa.periode = '$cek[periode]' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota' AND nilai.kategori = 'Compliance' ORDER BY nilai.kategori ASC");


// dominant

$n = 1;
$m = $jml;
while ($b = mysqli_fetch_array($ckLD)) {
  if ($n > $jml) {
    $n = 1;
  }
  echo $b['nim'] . " " . $b['kategori'] . " " . $n . "<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$b[nim]'"));
  if ($cekdulu > 0) { } else {
    mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$b[nim]','$b[kategori]','$n','$periode','$b[jk]')");
  }
  $n++;
}
echo "<br>";
while ($c = mysqli_fetch_array($ckPD)) {
  if ($m < 1) {
    $m = $jml;
  }
  echo $c['nim'] . " " . $c['kategori'] . " " . $m . "<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$c[nim]'"));
  if ($cekdulu > 0) { } else {
    mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$c[nim]','$c[kategori]','$m','$periode','$c[jk]')");
  }
  $m--;
}
echo "<br>";

// influence

$o = $jml;
$p = 1;
while ($d = mysqli_fetch_array($ckLI)) {
  if ($o < 1) {
    $o = $jml;
  }
  echo $d['nim'] . " " . $d['kategori'] . " " . $o . "<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$d[nim]'"));
  if ($cekdulu > 0) { } else {
    mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$d[nim]','$d[kategori]','$o','$periode','$d[jk]')");
  }
  $o--;
}
echo "<br>";
while ($e = mysqli_fetch_array($ckPI)) {
  if ($p > $jml) {
    $p = 1;
  }
  echo $e['nim'] . " " . $e['kategori'] . " " . $p . "<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$e[nim]'"));
  if ($cekdulu > 0) { } else {
    mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$e[nim]','$e[kategori]','$p','$periode','$e[jk]')");
  }
  $p++;
}
echo "<br>";

//  steadiness

$q = 1;
$r = $jml;
while ($f = mysqli_fetch_array($ckLS)) {
  if ($q > $jml) {
    $q = 1;
  }
  echo $f['nim'] . " " . $f['kategori'] . " " . $q . "<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$f[nim]'"));
  if ($cekdulu > 0) { } else {
    mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$f[nim]','$f[kategori]','$q','$periode','$f[jk]')");
  }
  $q++;
}
echo "<br>";
while ($g = mysqli_fetch_array($ckPS)) {
  if ($r < 1) {
    $r = $jml;
  }
  echo $g['nim'] . " " . $g['kategori'] . " " . $r . "<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$g[nim]'"));
  if ($cekdulu > 0) { } else {
    mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$g[nim]','$g[kategori]','$r','$periode','$g[jk]')");
  }
  $r--;
}
echo "<br>";

//  complence

$s = $jml;
$t = 1;
while ($h = mysqli_fetch_array($ckLC)) {
  if ($s < $t) {
    $s = $jml;
  }
  echo $h['nim'] . " " . $h['kategori'] . " " . $s . "<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$h[nim]'"));
  if ($cekdulu > 0) { } else {
    mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$h[nim]','$h[kategori]','$s','$periode','$h[jk]')");
  }
  $s--;
}
echo "<br>";
while ($k = mysqli_fetch_array($ckPC)) {
  if ($t > $jml) {
    $t = 1;
  }
  echo $k['nim'] . " " . $k['kategori'] . " " . $t . "<br>";
  $cekdulu = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelompok WHERE nim = '$k[nim]'"));
  if ($cekdulu > 0) { } else {
    mysqli_query($mysqli, "INSERT INTO kelompok (nim, kategori, kelompok, periode, jk) VALUES ('$k[nim]','$k[kategori]','$t','$periode','$k[jk]')");
  }
  $t++;
}
 ?>

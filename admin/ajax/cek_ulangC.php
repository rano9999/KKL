<?php
session_start();
include "../../library/config.php";


$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$jmlD = $cek['jml_D'] * $cek['jml_kel'];
$jmlI = $cek['jml_I'] * $cek['jml_kel'];
$jmlS = $cek['jml_S'] * $cek['jml_kel'];
$jmlC = $cek['jml_C'] * $cek['jml_kel'];

$countD = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nilai.nim) as jml FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.kategori = 'Dominant'"));
$countI = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nilai.nim) as jml FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.kategori = 'Influencing'"));
$countS = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nilai.nim) as jml FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.kategori = 'Steadiness'"));
$countC = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nilai.nim) as jml FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.kategori = 'Compliance'"));

$kurang = $jmlC - $countC['jml'];

if ($countD['jml'] > $jmlD) {
    $kat = 'Dominant';
} elseif ($countI['jml'] > $jmlI) {
    $kat = 'Influencing';
} elseif ($countS['jml'] > $jmlS) {
    $kat = 'Steadiness';
} elseif ($countC['jml'] > $jmlC) {
    $kat = 'Compliance';
}

$ulangD = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.validasi = 'Valid' AND nilai.kategori = '$kat' AND status = 'belum' ORDER BY nilaiC DESC LIMIT $kurang");
while ($D = mysqli_fetch_array($ulangD)) {
    // echo $D['nim'] . " = " . $D['kategori'] . $D['nilaiD'] . "<br>";
    mysqli_query($mysqli, "UPDATE nilai SET kategori = 'Compliance', status = 'ya' WHERE nim = '$D[nim]'");
}

?>
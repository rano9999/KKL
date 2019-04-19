<?php
session_start();
include "../../library/config.php";


$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$jmlD = $cek['jml_D'] * $cek['jml_kel'];
$jmlI = $cek['jml_I'] * $cek['jml_kel'];
$jmlS = $cek['jml_S'] * $cek['jml_kel'];
$jmlC = $cek['jml_C'] * $cek['jml_kel'];

$countD = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nim) as jml FROM nilai WHERE kategori = 'Dominant'"));
$countI = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nim) as jml FROM nilai WHERE kategori = 'Influencing'"));
$countS = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nim) as jml FROM nilai WHERE kategori = 'Steadiness'"));
$countC = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nim) as jml FROM nilai WHERE kategori = 'Compliance'"));

$kurang = $jmlI - $countI['jml'];

if ($countD['jml'] > $jmlD) {
    $kat = 'Dominant';
} elseif ($countI['jml'] > $jmlI) {
    $kat = 'Influencing';
} elseif ($countS['jml'] > $jmlS) {
    $kat = 'Steadiness';
} elseif ($countC['jml'] > $jmlC) {
    $kat = 'Compliance';
}

$ulangD = mysqli_query($mysqli, "SELECT * FROM nilai WHERE kategori = '$kat' AND status = 'belum' ORDER BY nilaiI DESC LIMIT $kurang");
while ($D = mysqli_fetch_array($ulangD)) {
    // echo $D['nim'] . " = " . $D['kategori'] . $D['nilaiD'] . "<br>";
    mysqli_query($mysqli, "UPDATE nilai SET kategori = 'Influencing', status = 'ya' WHERE nim = '$D[nim]'");
}

?>
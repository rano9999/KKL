<?php
session_start();
include "../../library/config.php";

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
mysqli_query($mysqli, "UPDATE periode SET seleksi = 'ya' WHERE id = '$cek[id]'");

$jmlD = $cek['jml_D'] * $cek['jml_kel'];
$jmlI = $cek['jml_I'] * $cek['jml_kel'];
$jmlS = $cek['jml_S'] * $cek['jml_kel'];
$jmlC = $cek['jml_C'] * $cek['jml_kel'];

$cekD = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.kategori = 'Dominant' ORDER BY nilai.nilaiD DESC LIMIT $jmlD");
$d = 1;
while ($D = mysqli_fetch_array($cekD)) {
    echo $d . " - " . $D['nim'] . " - " . $D['nilaiD'] . "<br>";
    mysqli_query($mysqli, "UPDATE nilai SET status = 'ya' WHERE nim = '$D[nim]'");
    $d++;
}

$cekI = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE siswa.nim = nilai.nim AND nilai.kategori = 'Influencing' ORDER BY nilai.nilaiI DESC LIMIT $jmlI");
$i = 1;
while ($I = mysqli_fetch_array($cekI)) {
    echo $i . " - " . $I['nim'] . " - " . $I['nilaiD'] . "<br>";
    mysqli_query($mysqli, "UPDATE nilai SET status = 'ya' WHERE nim = '$I[nim]'");
    $i++;
}

$cekS = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE siswa.nim = nilai.nim AND nilai.kategori = 'Steadiness' ORDER BY nilai.nilaiS DESC LIMIT $jmlS");
$s = 1;
while ($S = mysqli_fetch_array($cekS)) {
    echo $s . " - " . $S['nim'] . " - " . $S['nilaiS'] . "<br>";
    mysqli_query($mysqli, "UPDATE nilai SET status = 'ya' WHERE nim = '$S[nim]'");
    $s++;
}

$cekC = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE siswa.nim = nilai.nim AND nilai.kategori = 'Compliance' ORDER BY nilai.nilaiC DESC LIMIT $jmlC");
$c = 1;
while ($C = mysqli_fetch_array($cekC)) {
    echo $c . " - " . $C['nim'] . " - " . $C['nilaiC'] . "<br>";
    mysqli_query($mysqli, "UPDATE nilai SET status = 'ya' WHERE nim = '$C[nim]'");
    $c++;
}

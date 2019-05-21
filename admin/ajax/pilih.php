<?php
session_start();
include "../../library/config.php";

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
mysqli_query($mysqli, "UPDATE periode SET kormacam = 'sudah' WHERE id = '$cek[id]'");

$cekS = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.periode = '$cek[periode]' AND nilai.kategori = 'Steadiness' AND siswa.validasi = 'Valid' ORDER BY nilai.nilaiS, siswa.keaktifan DESC LIMIT 4");
while($s = mysqli_fetch_array($cekS)){
    mysqli_query($mysqli, "UPDATE nilai SET kormacam = 'kormacam' WHERE nim = '$s[nim]'");
}
?>
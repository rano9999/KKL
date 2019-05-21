<script type="text/javascript" src="script/script_kelompok.js"> </script>

<?php

include "../../library/function_view.php";
include "../../library/function_form.php";
include "../../library/config.php";

$cekP = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));

create_title("check", "Kelompok KKL Periode " . $cekP['periode']);
create_button("info", "download", "Export Data Kelompok to xlsx", "btn-add", "export_kelompok()");
create_button("primary", "print", "Export Data Kelompok to pdf", "btn-add", "pdf_kelompok()");
create_button("warning", "download", "Generate Kelompok", "btn-add", "Generate_kelompok()");


$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$periode = $cek['periode'];
$jml = $cek['jml_kel'];

$cek1 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nim) as jml_nilai FROM nilai WHERE periode = '$periode' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$cekL = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(siswa.jk) as jml_L FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.jk = 'L' AND nilai.periode = '$periode' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$cekP = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(siswa.jk) as jml_P FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.jk = 'P' AND nilai.periode = '$periode' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));

$jml_p = $cek1['jml_nilai'];

$dd = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nim) as jml FROM `nilai` WHERE periode = '$periode' AND kategori = 'Dominant' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$dl = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml_l FROM `siswa`,`nilai` WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' AND nilai.kategori = 'Dominant' AND siswa.jk = 'L' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$dp = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml_p FROM `siswa`,`nilai` WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' AND nilai.kategori = 'Dominant' AND siswa.jk = 'P' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));

$ii = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml FROM `nilai` WHERE periode = '$periode' AND kategori = 'Influencing' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$il = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml_l FROM `siswa`,`nilai` WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' AND nilai.kategori = 'Influencing' AND siswa.jk = 'L' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$ip = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml_p FROM `siswa`,`nilai` WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' AND nilai.kategori = 'Influencing' AND siswa.jk = 'P' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));

$ss = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml FROM `nilai` WHERE periode = '$periode' AND kategori = 'Steadiness' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$sl = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml_l FROM `siswa`,`nilai` WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' AND nilai.kategori = 'Steadiness' AND siswa.jk = 'L' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$sp = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml_p FROM `siswa`,`nilai` WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' AND nilai.kategori = 'Steadiness' AND siswa.jk = 'P' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));

$cc = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml FROM `nilai` WHERE periode = '$periode' AND kategori = 'Compliance' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$cl = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml_l FROM `siswa`,`nilai` WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' AND nilai.kategori = 'Compliance' AND siswa.jk = 'L' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));
$cp = mysqli_fetch_array(mysqli_query($mysqli, "SELECT *, COUNT(nilai.nim) as jml_p FROM `siswa`,`nilai` WHERE nilai.nim = siswa.nim AND nilai.periode = '$periode' AND nilai.kategori = 'Compliance' AND siswa.jk = 'P' AND nilai.status = 'ya' AND nilai.kormacam = 'anggota'"));

?>

<div class="row">
    <div class="col-md-12">
        <div id="loading">
            <img src="view/animacia3.gif">
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Analisis Kelompok/Desa</div>
            <div class="panel-body" id="display_info">
                <table width="100%">
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah Kelompok/Desa yg dibutuhkan</td>
                        <td><span class="badge"><?= $jml; ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah Peserta KKL</td>
                        <td><span class="badge"><?= $cek1['jml_nilai'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah Peserta Laki-laki</td>
                        <td><span class="badge"><?= $cekL['jml_L'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah Peserta Perempuan</td>
                        <td><span class="badge"><?= $cekP['jml_P'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah Peserta Laki-laki tiap kelompok/Desa</td>
                        <td><span class="badge"><?= ceil($cekL['jml_L'] / $jml) ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah Peserta Perempuan tiap kelompok/Desa</td>
                        <td><span class="badge"><?= ceil($cekP['jml_P'] / $jml) ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah kelompok/Desa setelah dibagi</td>
                        <td><span class="badge"><?= ceil($jml_p / $jml) ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Dominant</td>
                        <td><span class="badge"><?= $dd['jml'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Dominant laki laki</td>
                        <td><span class="badge"><?= $dl['jml_l'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Dominant perempuan</td>
                        <td><span class="badge"><?= $dp['jml_p'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Influencing</td>
                        <td><span class="badge"><?= $ii['jml'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Influencing laki laki</td>
                        <td><span class="badge"><?= $il['jml_l'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Influencing perempuan</td>
                        <td><span class="badge"><?= $ip['jml_p'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Steadiness</td>
                        <td><span class="badge"><?= $ss['jml'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Steadiness laki laki</td>
                        <td><span class="badge"><?= $sl['jml_l'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Steadiness perempuan</td>
                        <td><span class="badge"><?= $sp['jml_p'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Conscientiousness</td>
                        <td><span class="badge"><?= $cc['jml'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Conscientiousness laki laki</td>
                        <td><span class="badge"><?= $cl['jml_l'] ?></span></td>
                    </tr>
                    <tr style="border:1px solid #1b1f70;">
                        <td style="padding:5px">Jumlah mahasiswa dengan tipe Conscientiousness perempuan</td>
                        <td><span class="badge"><?= $cp['jml_p'] ?></span></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>

<?php

create_table(array("NIM", "Nama", "Jenis Kelamin", "Kategori", "Kelompok/Desa", "Periode"));

?>
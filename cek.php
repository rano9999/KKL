<?php
include "library/config.php";
$periode = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$sql = mysqli_query($mysqli, "SELECT * FROM `kelompok`, `siswa` WHERE kelompok.nim = siswa.nim AND kelompok.periode = '$periode[periode]' ORDER BY kelompok.kelompok, kelompok.periode ASC");
$sql2 = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.kormacam = 'kormacam' ORDER BY siswa.keaktifan DESC");

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body class="block">
    <div class="block container-fluid">
        <div class="row justify-content-center mt-30">
            <h4>DAFTAR PESERTA KKL STMIK AMIKOM PURWOKERTO TAHUN 2018</h4>
            <div class="col-md-12">
                <table id="customers">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Kelompok</th>
                    </tr>
                    <?php $no = 1;
                    while ($k = mysqli_fetch_array($sql)) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $k['nim'] ?></td>
                            <td><?= $k['nama'] ?></td>
                            <td><?= $k['prodi'] ?></td>
                            <td>Kelompok - <?= $k['kelompok'] ?></td>
                        </tr>
                        <?php $no++;
                        if ($no > 10) { ?>
                            <tr>
                                <td style="background-color:gray" colspan="5"> <br> </td>
                            </tr>
                            <?php
                            $no = 1;
                        }
                    } ?>
                </table>
            </div>
        </div>
        <div class="row justify-content-center mt-30">
            <div class="col-md-6"></div>
            <div class="col-md-4">
                <p>Purwokerto, <?= date('d M Y'); ?>
                    <br>
                    Ketua LPPM <br> STMIK AMIKOM Purwokerto,</p>
                <br>
                <br>
                <br>
                <b>
                    <p>(<u>Yovie Fesya Pratama</u>) <br>NIK.2424242435 </p>
                </b>
            </div>
        </div>

    </div>

</body>

</html>
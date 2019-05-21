<?php
session_start();
ob_start();
include "../../library/config.php";
$periode = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$setting = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM setting"));
$sql = mysqli_query($mysqli, "SELECT * FROM `kelompok`, `siswa` WHERE kelompok.nim = siswa.nim AND kelompok.periode = '$periode[periode]' ORDER BY kelompok.kelompok, kelompok.periode ASC");
$sql2 = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.kormacam = 'kormacam' ORDER BY siswa.keaktifan DESC");

// include autoloader
require_once 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

$html = '<!doctype html>
<html lang="en">

<head>
    <title>Hasil Pembagian Kelompok KKL Periode '. $periode['periode'] . '</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
        tbody:before, tbody:after { display: none; }
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
            margin-left:10px;
            margin-right:10px;
        }

        #customers td,
        #customers th {
            border: 1px solid grey;
            padding: 5px;
        }

        #customers tr:nth-child(even) {
            background-color: #fff;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #cecece;
            color: #000;
        }
        h4{
           padding-top:20px;
           padding-bottom:10px;
        }
    </style>
    </head>
<body class="block">
    <div class="block container-fluid">
        <div class="row justify-content-center mt-30">
            <center><h4>DAFTAR PESERTA KKL STMIK AMIKOM PURWOKERTO TAHUN PERIODE ' . $periode['periode'] . '</h4></center>
            <div class="col-md-12">
            <center><h6>DAFTAR KORMACAM/WAKIL KORMACAM KKL PERIODE ' . $periode['periode'] . '</h6></center>
                <table id="customers" class="table table-sm">
                    <thead>
                        <tr>
                              <th>No</th>
                              <th>NIM</th>
                              <th>Nama</th>
                              <th>Prodi</th>
                        </tr>
                    </thead>';
                     $no = 1;
                     while ($l = mysqli_fetch_array($sql2)) {
          $html .= '<tbody>
                     <tr>
                         <td>'. $no .'</td>
                         <td>'. $l['nim'] .'</td>
                         <td>'. $l['nama'] .'</td>
                         <td>'. $l['prodi'] .'</td>
                     </tr>
                    </tbody>';
                    $no++;
                    }              
        $html .= '</table>
        <br><br><br>
        <table id="customers" class="table table-sm">
                    <thead>
                        <tr>
                              <th>No</th>
                              <th>NIM</th>
                              <th>Nama</th>
                              <th>Prodi</th>
                              <th>Kelompok</th>
                        </tr>
                    </thead>';
                     $no = 1;
                     while ($k = mysqli_fetch_array($sql)) {
          $html .= '<tbody>
                     <tr>
                         <td>'. $no .'</td>
                         <td>'. $k['nim'] .'</td>
                         <td>'. $k['nama'] .'</td>
                         <td>'. $k['prodi'] .'</td>
                         <td>Kelompok - '. $k['kelompok'] . '</td>
                     </tr>
                    </tbody>';
                    $no++;
                     if ($no > 10) {
          $html .= '<tr>
                        <td style="background-color:#ddd; padding:11px" colspan="5"></td>
                    </tr>';
                     $no = 1;
                  }
               }              
        $html .= '</table>
            </div>
        </div>
        <table style="width:100%; margin-top:70px; background:white">
         <tr>
               <td style="color:white">lorem impsumlorem impsum</td>
               <td style="color:white">lorem impsumlorem impsum</td>
               <td>
                    <p>Purwokerto, ' . date('d M Y') . '
                    <br>
                    Ketua LPPM <br> STMIK AMIKOM Purwokerto,</p>
               </td>
         </tr>
         <tr>
               <td><br></td>
               <td><br></td>
               <td><br></td>
         </tr>
         <tr>
               <td><br></td>
               <td><br></td>
               <td><br></td>
         </tr>
         <tr>
               <td><br></td>
               <td><br></td>
               <td><br></td>
         </tr>
         <tr>
               <td style="color:white">lorem impsumlorem impsum</td>
               <td style="color:white">lorem impsumlorem impsum</td>
               <td><p><b><u>('. $setting['nama'] . ')</u> <br>NIK.' . $setting['nik'] . ' </p></b></td>
         </tr>
        </table>

    </div>

</body>

</html>';
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');
// echo $html; 
// Render the HTML as PDF
$dompdf->render();

// // Output the generated PDF to Browser
$dompdf->stream("Laporan-pembagian-kelompok-periode-" . $periode['periode'] . ".pdf");

?>

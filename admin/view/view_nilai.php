<script type="text/javascript" src="script/script_nilai.js"> </script>
<div id="loading">
   <img src="view/animacia3.gif">
</div>
<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['password'])) {
   header('location: ../login.php');
}

include "../../library/function_view.php";
include "../../library/function_form.php";
include "../../library/config.php";

?>
<div id="cek">
   <?php
   create_title("check", "Data Nilai Psikotes DISC");
   create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
   // create_button("warning", "download", "Export Nilai C", "btn-add", "export_nilai_c()");
   // create_button("warning", "download", "Export Nilai S", "btn-add", "export_nilai_s()");
   // create_button("warning", "download", "Export Nilai I", "btn-add", "export_nilai_i()");
   // create_button("warning", "download", "Export Nilai D", "btn-add", "export_nilai_d()");
   create_button("success", "plus-sign", "Import Data", "btn-add", "form_import()");

   $cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
   $jmlD = $cek['jml_D'] * $cek['jml_kel'];
   $jmlI = $cek['jml_I'] * $cek['jml_kel'];
   $jmlS = $cek['jml_S'] * $cek['jml_kel'];
   $jmlC = $cek['jml_C'] * $cek['jml_kel'];
   if ($cek['kormacam'] == 'belum') {
      echo '<a class="btn btn-primary btn-top pull-right" onclick="pilih()"><i class="glyphicon glyphicon-user"></i> Pilih Kormacam</a>';
   } else {
      echo '<a class="btn btn-primary btn-top pull-right" onclick="cek()"><i class="glyphicon glyphicon-check"></i> Cek Data Tipe</a>';
   }
   ?>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default" id="display_info">
         <?php
         if ($cek['kormacam'] == 'sudah') { ?>
            <div class="panel-heading">Mahasiswa Terpilih Sebagai Kormacam/Wakil Kormacam</div>
            <div class="panel-body">
               <table width="100%">
                  <?php
                  $qs = mysqli_query($mysqli, "SELECT * FROM nilai, siswa WHERE nilai.nim = siswa.nim AND nilai.kormacam = 'kormacam' ORDER BY siswa.keaktifan DESC");
                  while ($ss = mysqli_fetch_array($qs)) {
                     if ($ss['keaktifan'] == '5') {
                        $aktif = "Ketua";
                     } elseif ($ss['keaktifan'] == '4') {
                        $aktif = "Sekretaris";
                     } elseif ($ss['keaktifan'] == '3') {
                        $aktif = "Bendahara";
                     } elseif ($ss['keaktifan'] == '2') {
                        $aktif = "Koordinator";
                     } elseif ($ss['keaktifan'] == '1') {
                        $aktif = "Anggota";
                     } ?>
                     <tr style="border:1px solid #1b1f70;">
                        <td style="width:10%; padding:10px"><?= $ss['nim'] ?></td>
                        <td style="width:23%;"><?= $ss['nama'] ?></td>
                        <td style="width:10%">Nilai S</td>
                        <td style="width:12%"><span class="badge"><?= $ss['nilaiS'] ?></span></td>
                        <td style="width:15%">Jenis Keaktifan</td>
                        <td style="width:23%; padding:10px"><?= $aktif; ?></td>
                        <td><span class="badge"><?= $ss['keaktifan'] ?></span></td>
                     </tr>
                  <?php } ?>
               </table>
            </div>
         <?php }
      if ($cek['seleksi'] == 'ya') {
         $countD = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nilai.nim) as jml FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.validasi = 'Valid' AND nilai.kategori = 'Dominant'"));
         $countI = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nilai.nim) as jml FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.validasi = 'Valid' AND nilai.kategori = 'Influencing'"));
         $countS = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nilai.nim) as jml FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.validasi = 'Valid' AND nilai.kategori = 'Steadiness'"));
         $countC = mysqli_fetch_array(mysqli_query($mysqli, "SELECT count(nilai.nim) as jml FROM nilai, siswa WHERE nilai.nim = siswa.nim AND siswa.validasi = 'Valid' AND nilai.kategori = 'Compliance'"));
         ?>
            <!-- Default panel contents -->
            <div class="panel-heading">Analisis Kebutuhan Kelompok</div>
            <div class="panel-body">
               <table width="100%">
                  <?php
                  if ($jmlD > $countD['jml']) {
                     $bg = 'indianred';
                     $cl = 'ivory';
                  } else {
                     $bg = 'limegreen';
                     $cl = 'ivory';
                  }
                  if ($jmlI > $countI['jml']) {
                     $bgI = 'indianred';
                     $clI = 'ivory';
                  } else {
                     $bgI = 'limegreen';
                     $clI = 'ivory';
                  }
                  if ($jmlS > $countS['jml']) {
                     $bgS = 'indianred';
                     $clS = 'ivory';
                  } else {
                     $bgS = 'limegreen';
                     $clS = 'ivory';
                  }
                  if ($jmlC > $countC['jml']) {
                     $bgC = 'indianred';
                     $clC = 'ivory';
                  } else {
                     $bgC = 'limegreen';
                     $clC = 'ivory';
                  } ?>
                  <tr style="border:1px solid #1b1f70; background-color:<?= $bg ?>; color:<?= $cl ?>;">
                     <td style="width:23%; padding:10px">Jumlah Dominant yg dibutuhkan</td>
                     <td><span class="badge"><?= $jmlD ?></span></td>
                     <td style="width:18%">Jumlah Dominant yg ada</td>
                     <td><span class="badge"><?= $countD['jml'] ?></span></td>
                     <?php if ($jmlD > $countD['jml']) { ?>
                        <td style="width:18%">Kurang Tipe D Sejumlah </td>
                        <td><span class="badge"><?= $jmlD - $countD['jml'] ?></span></td>
                        <td><a class="btn btn-warning btn-center btn-sm pull-left" id="cek" onclick="cekUlangD()"><i class="glyphicon glyphicon-refresh"></i> </a></td>
                     <?php } else { ?>
                        <td style="width:18%">Lebih Tipe D Sejumlah </td>
                        <td><span class="badge"><?= $countD['jml'] - $jmlD ?></span></td>
                        <td><a class="btn btn-success btn-center btn-sm pull-left"><i class="glyphicon glyphicon-ok"></i> </a></td>
                     <?php } ?>
                  </tr>

                  <tr style="border:1px solid #1b1f70; background-color:<?= $bgI ?>; color:<?= $clI ?>;">
                     <td style="width:23%; padding:10px">Jumlah Influencing yg dibutuhkan</td>
                     <td><span class="badge"><?= $jmlI ?></span></td>
                     <td style="width:18%">Jumlah Influencing yg ada</td>
                     <td><span class="badge"><?= $countI['jml'] ?></span></td>
                     <?php if ($jmlI > $countI['jml']) { ?>
                        <td style="width:18%">Kurang Tipe I Sejumlah </td>
                        <td><span class="badge"><?= $jmlI - $countI['jml'] ?></span></td>
                        <td><a class="btn btn-warning btn-center btn-sm pull-left" id="cek" onclick="cekUlangI()"><i class="glyphicon glyphicon-refresh"></i> </a></td>
                     <?php } else { ?>
                        <td style="width:18%">Lebih Tipe I Sejumlah </td>
                        <td><span class="badge"><?= $countI['jml'] - $jmlI ?></span></td>
                        <td><a class="btn btn-success btn-center btn-sm pull-left"><i class="glyphicon glyphicon-ok"></i> </a></td>
                     <?php } ?>
                  </tr>

                  <tr style="border:1px solid #1b1f70; background-color:<?= $bgS ?>; color:<?= $clS ?>;">
                     <td style="width:23%; padding:10px">Jumlah Steadiness yg dibutuhkan</td>
                     <td><span class="badge"><?= $jmlS ?></span></td>
                     <td style="width:18%">Jumlah Steadiness yg ada</td>
                     <td><span class="badge"><?= $countS['jml'] ?></span></td>
                     <?php if ($jmlS > $countS['jml']) { ?>
                        <td style="width:18%">Kurang Tipe S Sejumlah </td>
                        <td><span class="badge"><?= $jmlS - $countS['jml'] ?></span></td>
                        <td><a class="btn btn-warning btn-center btn-sm pull-left" id="cek" onclick="cekUlangS()"><i class="glyphicon glyphicon-refresh"></i> </a></td>
                     <?php } else { ?>
                        <td style="width:18%">Lebih Tipe S Sejumlah </td>
                        <td><span class="badge"><?= $countS['jml'] - $jmlS ?></span></td>
                        <td><a class="btn btn-success btn-center btn-sm pull-left"><i class="glyphicon glyphicon-ok"></i> </a></td>
                     <?php } ?>
                  </tr>

                  <tr style="border:1px solid #1b1f70; background-color:<?= $bgC ?>; color:<?= $clC ?>;">
                     <td style="width:23%; padding:10px">Jumlah Compliance yg dibutuhkan</td>
                     <td><span class="badge"><?= $jmlC ?></span></td>
                     <td style="width:18%">Jumlah Compliance yg ada</td>
                     <td><span class="badge"><?= $countC['jml'] ?></span></td>
                     <?php if ($jmlC > $countC['jml']) { ?>
                        <td style="width:18%">Kurang Tipe C Sejumlah </td>
                        <td><span class="badge"><?= $jmlC - $countC['jml'] ?></span></td>
                        <td><a class="btn btn-warning btn-center btn-sm pull-left" id="cek" onclick="cekUlangC()"><i class="glyphicon glyphicon-refresh"></i> </a></td>
                     <?php } else { ?>
                        <td style="width:18%">Lebih Tipe C Sejumlah </td>
                        <td><span class="badge"><?= $countC['jml'] - $jmlC ?></span></td>
                        <td><a class="btn btn-success btn-center btn-sm pull-left"><i class="glyphicon glyphicon-ok"></i>
                           </a></td>
                     <?php } ?>
                  </tr>

               </table>
            </div>
         </div>
      <?php } ?>
   </div>
</div>
<div style="margin: 10px 60px 10px 60px">
   <?php
   create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiD", "NilaiI", "NilaiS", "NilaiC", "Periode", "Status"));
   ?>
</div>
<?php


//Membuat form import
open_form("modal_import", "return import_data()");
create_textbox("Pilih File .xlsx", "file", "file", 6, "", "required");
close_form("import", "Import");


// echo '<input type="hidden" id="id_ujian" value="'.$_GET['ujian'].'">
// <input type="hidden" id="id_kelas" value="'.$_GET['kelas'].'">';

// create_title("check", "Hasil Ujian Mahasiswa Nilai D");
// create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
// create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiD","NilaiD"));

// create_title("check", "Hasil Ujian Mahasiswa Nilai I");
// create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
// create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiI"));

// create_title("check", "Hasil Ujian Mahasiswa Nilai S");
// create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
// create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiS"));

// create_title("check", "Hasil Ujian Mahasiswa Nilai C");
// create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
// create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiC"));
?>
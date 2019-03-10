<?php
session_start();
include "library/config.php";

if(empty($_SESSION['username']) or empty($_SESSION['password']) ){
   header('location: login.php');
}

$kelas = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$_SESSION[kelas]'"));
//$ujian = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM ujian WHERE id_ujian='$_GET[ujian]'"));
?>

<h3 class="page-header"><i class="glyphicon glyphicon-user"></i> Data Mahasiswa</h3>
<div class="row">
   <div class="col-md-3">NIM</div>
   <div class="col-md-9">: <b><?= $_SESSION['nim']; ?> </b> </div>
</div><br/>
<div class="row">
   <div class="col-md-3">Nama Lengkap</div>
   <div class="col-md-9">: <b><?= $_SESSION['namalengkap']; ?> </b></div>
</div><br/>
<div class="row">
   <div class="col-md-3">Kelas</div>
   <div class="col-md-9">: <b><?= $kelas['kelas']; ?></b></div>
</div><br/>

<div class="row">
   <div class="col-md-12">

<?php	
//Jika nilai sudah ada tampilkan tombol Sudah Mengerjakan, jika belum ada tampilkan tombol Masuk Ujian
$qnilai = mysqli_query($mysqli, "SELECT * FROM nilai WHERE nim='$_SESSION[nim]'");
$tnilai = mysqli_num_rows($qnilai);
$rnilai = mysqli_fetch_array($qnilai);

if($tnilai>0 and $rnilai['nilaiD'] != "")  echo '<a class="btn btn-danger disabled"> Sudah mengerjakan </a>';
else echo '<a class="btn btn-primary" onclick="show_petunjuk('.$_GET['ujian'].')">
<i class="glyphicon glyphicon-log-in"></i> Masuk Ujian</a>';
?>
	
   </div>
</div><br/>

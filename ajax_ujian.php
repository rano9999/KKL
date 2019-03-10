<?php
session_start();
include "library/config.php";
$qp = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
$periode = $qp['periode'];
if(empty($_SESSION['username']) or empty($_SESSION['password']) ){
   header('location: login.php');
}

//Memproses data ajax ketika memilih salah satu jawaban
if($_GET['action']=="kirim_jawaban"){
   $rnilai = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM nilai WHERE nim='$_SESSION[nim]'"));

   $jawaban = explode(",", $rnilai['jawaban']);
   $index = $_POST['index'];
   $jawaban[$index] = $_POST['jawab'];

   $jawabanfix = implode(",", $jawaban);
   mysqli_query($mysqli, "UPDATE nilai SET jawaban='$jawabanfix', sisa_waktu='$_POST[sisa_waktu]' WHERE nim='$_SESSION[nim]'");

   echo "ok";
}

//Memproses data ajax ketika menyelesaikan ujian
elseif($_GET['action']=="selesai_ujian"){
  $rnilai = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM nilai WHERE nim='$_SESSION[nim]'"));

   $arr_soal = explode(",", $rnilai['acak_soal']);
   $jawaban = explode(",", $rnilai['jawaban']);
   $jumlahD = 0;
   $jumlahI = 0;
   $jumlahS = 0;
   $jumlahC = 0;
   for($i=0; $i<count($arr_soal); $i++){
      $rsoal = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM soal WHERE id_soal='$arr_soal[$i]'"));
      if($rsoal['kunci'] == $jawaban[$i]){
        $jumlahD=$jumlahD+1;
      }else if($rsoal['kunci2'] == $jawaban[$i]){
        $jumlahI=$jumlahI+1;
			}else if($rsoal['kunci3'] == $jawaban[$i]){
        $jumlahS=$jumlahS+1;
			}else if($rsoal['kunci4'] == $jawaban[$i]){
        $jumlahC=$jumlahC+1;
			}
   }
    $kategori="";
   $nilai = $jumlahD;
   $nilai = $jumlahI;
   $nilai = $jumlahS;
   $nilai = $jumlahC;
   if ($jumlahC>$jumlahD && $jumlahC>$jumlahS && $jumlahC>$jumlahI){
	    $kategori="Conscientiousness";
   }
   else if ($jumlahS>$jumlahD && $jumlahS>$jumlahI && $jumlahS>$jumlahC){
	    $kategori="Steadiness";
   }
   else if ($jumlahI>$jumlahD && $jumlahI>$jumlahS && $jumlahI>$jumlahC){
	    $kategori="Influencing";
   }
   else if($jumlahD>$jumlahI && $jumlahD>$jumlahS && $jumlahD>$jumlahC){
	    $kategori="Dominant";
   }

   mysqli_query($mysqli, "UPDATE nilai SET  nilaiD='$jumlahD', nilaiI='$jumlahI', nilaiS='$jumlahS', nilaiC='$jumlahC', kategori='$kategori', periode = '$periode' WHERE nim='$_SESSION[nim]'");

   mysqli_query($mysqli, "UPDATE siswa SET status='login' WHERE nim='$_SESSION[nim]'");

   echo "ok";
}
?>

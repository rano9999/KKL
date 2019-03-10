<?php
session_start();
include "../../library/config.php";
include "../../library/function_date.php";

$query = mysqli_query($mysqli, "SELECT * FROM ujian");
$data = array();
$no = 1;
while($r = mysqli_fetch_array($query)){

//Membuat tombol edit soal
   // $qsoal = mysqli_query($mysqli, "SELECT * FROM soal");
   $btn_soal = '<a class="btn btn-primary btn-sm" onclick="show_soal('.$r['id_ujian'].')"><i class="glyphicon glyphicon-edit"></i> Edit &nbsp;&nbsp;<span class="label label-warning">'.mysqli_num_rows($qsoal).'</span></a>';

//Membuat tombol kelas untuk melihat nilai


   $row = array();
   $row[] = $no;
   $row[] = $r['judul'];
   $row[] = tgl_indonesia($r['tanggal']);
   $row[] = $r['jml_soal'];
   $row[] = $r['waktu'];
   // $row[] = $btn_soal;

   $data[] = $row;
   $no++;
}

$output = array("data" => $data);
echo json_encode($output);
?>

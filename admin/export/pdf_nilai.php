<?php
session_start();
ob_start();
?>
<html>
<head>
   <style type="text/css">
      .box{
         border: 1px solid #000;
      }
      .header td{
         border-bottom: 1px solid #000;
      }
      .box td{
         padding: 5px 10px;
      }
   </style>
</head>
<body>

<?php
   
include "../../library/config.php";
	
// $query = mysqli_query($mysqli, "select * from siswa where id_kelas='$_GET[kelas]'");
// $no = 1;
// echo "<table width='100%' cellspacing='20'><tr>";
// while($r = mysqli_fetch_array($query)){
//    $password = substr(md5($r['nim']), 0, 5);
//    $kls = mysqli_fetch_array(mysqli_query($mysqli, "select * from kelas where id_kelas='$r[id_kelas]'"));

$query = mysqli_query($mysqli, "SELECT nilai.nim, siswa.nim, siswa.nama, nilai.nilai  FROM nilai, siswa WHERE nilai.nim = siswa.nim; ");

$no = 1;

echo "<table width='100%' cellspacing='20'><tr>";
   
  while($r = mysqli_fetch_array($query)){
  
  $nim = $r['nim'];
  $nama = $r['nama'];
  $nilai = $r['nilai'];

  
  
    
      
      // $row[] = $no;
      // $row[] = $r['nim'];
      // $row[] = $siswa['nama'];
      // $row[] = $r['kategori'];      
      // $row[] = $r['nilai'];
      // $data[] = $row;
     

      
     

		
   echo"<td class='box' width='335'>

<table width='100%' style='width: 330px' cellspacing='0'>
   
<tr class='header'>
   <td width='60' align='center'>
      <img src='../../images/logo.png' width='50'>
   </td>
   <td width='130' align='center' valign='middle' style='padding: 5px 30px;'>
   <b>KARTU PESERTA UJIAN</b>
   </td>
</tr>
				
<tr><td>Nim</td><td>: $nim</td></tr>
<tr><td>Nama</td><td>: $nama</td></tr>
<tr><td>Nilai</td><td>: <b>$nilai</b></td></tr>


</table>

</td>";

if($no%2==0) echo "</tr><tr>";
  $no++;

}
echo "</tr></table>";

?>
</body>
</html>

<?php
require_once('../../assets/html2pdf/html2pdf.class.php');
$content = ob_get_clean();
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Nilai Peserta.pdf');
?>

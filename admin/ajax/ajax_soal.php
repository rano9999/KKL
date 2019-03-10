<?php
session_start();
include "../../library/config.php";
include "../../library/function_view.php";

//Menampilkan data ke tabel
if($_GET['action'] == "table_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM soal ");
   $data = array();
   $no = 1;
   while($r = mysqli_fetch_array($query)){
      $soal = $r['soal'];
      $soal .= '<ol type="A">';		
      for($i=1; $i<=4; $i++){	
         $kolom = "pilihan_$i";
         if($r['kunci']==$i) $soal .= '<li class="text-primary" style="font-weight: bold">'.$r[$kolom].' D</li>';
		 if($r['kunci2']==$i) $soal .= '<li class="text-primary" style="font-weight: bold">'.$r[$kolom].' I</li>';
		 if($r['kunci3']==$i) $soal .= '<li class="text-primary" style="font-weight: bold">'.$r[$kolom].' S</li>';
		 if($r['kunci4']==$i) $soal .= '<li class="text-primary" style="font-weight: bold">'.$r[$kolom].' C</li>';
		 
      }
      $soal .= '</ol>';
		
      $row = array();
      $row[] = $no;
      $row[] = $soal;
      $row[] = create_action($r['id_soal']);
      $data[] = $row;
      $no++;
   }	
   $output = array("data" => $data);
   echo json_encode($output);
}

//Menampilkan data ke form edit
elseif($_GET['action'] == "form_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM soal WHERE id_soal='$_GET[id]'");
   $data = mysqli_fetch_array($query);	
   echo json_encode($data);
}

//Menambahkan data soal ke database
elseif($_GET['action'] == "insert"){
   $soal = addslashes($_POST['soal']);
   $pil_1 = addslashes($_POST['pil_1']);
   $pil_2 = addslashes($_POST['pil_2']);
   $pil_3 = addslashes($_POST['pil_3']);
   $pil_4 = addslashes($_POST['pil_4']);
   
   mysqli_query($mysqli, "INSERT INTO soal SET 
      id_ujian = '$_GET[ujian]',
      soal = '$soal',
      pilihan_1 = '$pil_1',
      pilihan_2 = '$pil_2',
      pilihan_3 = '$pil_3',
      pilihan_4 = '$pil_4',
      kunci = '$_POST[kunci]',
      kunci2= '$_POST[kunci2]',
	  kunci3 = '$_POST[kunci3]',
	  kunci4 ='$_POST[kunci4]'");	  
   echo "ok";
}

//Mengedit data soal pada database
elseif($_GET['action'] == "update"){
   $soal = addslashes($_POST['soal']);
   $pil_1 = addslashes($_POST['pil_1']);
   $pil_2 = addslashes($_POST['pil_2']);
   $pil_3 = addslashes($_POST['pil_3']);
   $pil_4 = addslashes($_POST['pil_4']);
   
   mysqli_query($mysqli, "UPDATE soal SET 
      soal = '$soal',
      pilihan_1 = '$pil_1',
      pilihan_2 = '$pil_2',
      pilihan_3 = '$pil_3',
      pilihan_4 = '$pil_4',
	  kunci = '$_POST[kunci]',
      kunci2 = '$_POST[kunci2]',
	  kunci3  = '$_POST[kunci3]',
	  kunci4  = '$_POST[kunci4]' WHERE id_soal='$_POST[id]'");
   echo "ok";
}

//Menghapus data
elseif($_GET['action'] == "delete"){
   mysqli_query($mysqli, "DELETE FROM soal WHERE id_soal='$_GET[id]'");	
}

//Import data dari format Excel

?>
<?php
session_start();
include "../../library/config.php";
include "../../library/function_view.php";

//Menampilkan data ke tabel
if($_GET['action'] == "table_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM periode ORDER BY id DESC");
   $data = array();
   $no = 1;
   while($r = mysqli_fetch_array($query)){
      $row = array();
      $row[] = $no;
      $row[] = $r['periode'];
      $row[] = $r['jml_kel'];
      $row[] = 10;
      $row[] = $r['jml_D'];
      $row[] = $r['jml_I'];
      $row[] = $r['jml_S'];
      $row[] = $r['jml_C'];
      $row[] = $r['aktif'];
      $row[] = create_action($r['id']);
      $data[] = $row;
      $no++;
   }

   $output = array("data" => $data);
   echo json_encode($output);
}


//Menampilkan data ke form edit
elseif($_GET['action'] == "form_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM periode WHERE id = '$_GET[id]'");
   $data = mysqli_fetch_array($query);
   echo json_encode($data);
}

//Menambah data ke database
elseif($_GET['action'] == "insert"){
   $jml = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM periode WHERE periode='$_POST[periode]'"));
   if($jml > 0){
      echo "Nama periode sudah digunakan!";
   }else{
      mysqli_query($mysqli, "INSERT INTO periode SET
         periode = '$_POST[periode]',
         jml_kel = '$_POST[jml_kel]',
         jml_D = '$_POST[jml_D]',
         jml_I = '$_POST[jml_I]',
         jml_S = '$_POST[jml_S]',
         jml_C = '$_POST[jml_C]',
         aktif= 'Tidak'");
      echo "ok";
   }
}

//Mengedit data
elseif($_GET['action'] == "update"){
    mysqli_query($mysqli, "UPDATE periode SET aktif = 'Tidak'");
    mysqli_query($mysqli, "UPDATE periode SET
      periode = '$_POST[periode]',
      jml_D = '$_POST[jml_D]',
      jml_I = '$_POST[jml_I]',
      jml_S = '$_POST[jml_S]',
      jml_C = '$_POST[jml_C]',
      aktif = '$_POST[aktif]',
      jml_kel = '$_POST[jml_kel]'
      WHERE id ='$_POST[id_tahun]'");
   echo "ok";
}

//Menghapus data
elseif($_GET['action'] == "delete"){
   mysqli_query($mysqli, "DELETE FROM periode WHERE id='$_GET[id]'");
}

?>

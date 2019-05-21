<?php
session_start();
include "../../library/config.php";
include "../../library/function_view.php";

if($_GET['action'] == "table_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM setting");
   $data = array();
      $no = 1;
      while($r = mysqli_fetch_array($query)){
         $row = array();
         $row[] = $no;
         $row[] = $r['nama'];
         $row[] = $r['nik'];
         $row[] = create_action1($r['id']);
         $data[] = $row;
         $no++;
      }

   $output = array("data" => $data);
   echo json_encode($output);
}

elseif($_GET['action'] == "form_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM setting WHERE id='$_GET[id]'");
   $data = mysqli_fetch_array($query);
   echo json_encode($data);
}


elseif($_GET['action'] == "update"){
   $nama = $_POST['nama'];
   $nik = $_POST['nik'];
   mysqli_query($mysqli, "UPDATE setting SET nama= '$nama', nik = '$nik' WHERE id='$_POST[id]'");
}

?>

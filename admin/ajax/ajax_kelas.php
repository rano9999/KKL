<?php
session_start();
include "../../library/config.php";
include "../../library/function_view.php";

if($_GET['action'] == "table_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM kelas ORDER BY id_kelas DESC, kelas ASC");
   $data = array();
      $no = 1;
      while($r = mysqli_fetch_array($query)){
         $row = array();
         $row[] = $no;
         $row[] = $r['kelas'];
         $row[] = create_action($r['id_kelas']);
         $data[] = $row;
         $no++;
      }

   $output = array("data" => $data);
   echo json_encode($output);
}

elseif($_GET['action'] == "form_data"){
   $query = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$_GET[id]'");
   $data = mysqli_fetch_array($query);
   echo json_encode($data);
}

elseif($_GET['action'] == "insert"){
   $password = md5($_POST['password']);

   mysqli_query($mysqli, "INSERT INTO kelas SET kelas = '$_POST[kelas]' ");
}

elseif($_GET['action'] == "update"){
   $password = md5($_POST['password']);
   mysqli_query($mysqli, "UPDATE kelas SET kelas= '$_POST[kelas]' WHERE id_kelas='$_POST[id]'");
}

elseif($_GET['action'] == "delete"){
   mysqli_query($mysqli, "DELETE FROM kelas WHERE id_kelas='$_GET[id]'");
}

elseif($_GET['action'] == "import"){
   include "../../assets/excel_reader/excel_reader2.php";
   $filename = strtolower($_FILES['file']['name']);
   $extensi  = substr($filename,-4);

   if($extensi != ".xls"){
      echo "File yang di-upload tidak berformat .xls!'";
   }else{
      $path = "../tmp";
      move_uploaded_file($_FILES['file']['tmp_name'], "$path/$filename");

      $file = "../tmp/$filename";

      $data = new Spreadsheet_Excel_Reader();
      $data->read($file);
      $jdata = $data->rowcount($sheet_index=0);

      for($i=2; $i<=$jdata; $i++){
         $kelas = addslashes($data->val($i,2));

         $cek = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM kelas WHERE kelas='$kelas'"));
         if($cek > 0){
            mysqli_query($mysqli, "UPDATE kelas SET kelas='$kelas' WHERE kelas='$kelas'");
         }else{
            mysqli_query($mysqli, "INSERT INTO kelas SET kelas='$kelas'");
         }
      }

      unlink($file);
      echo "ok";
   }
}
?>

<?php
  session_start();
  include "library/config.php";
  mysqli_query($mysqli, "UPDATE siswa SET tanda='off' WHERE nim='$_SESSION[nim]'");
  
  session_destroy();
  echo "<script>
   alert('Anda keluar dari ujian!'); 
   window.location = 'login.php';
   </script>";
?>

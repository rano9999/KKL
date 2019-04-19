<div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
   </button>
</div>

<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">

<?php

function menu_admin($link, $icon, $title){
   $item = '<li><a href="'.$link.'" class="navigation"><i class="fa fa-'.$icon.'"></i> '.$title.'</a></li>';
   return $item;
}

if($_SESSION['leveluser'] == "admin"){
   echo menu_admin("home.php", "home", "Beranda");
   echo menu_admin("view/view_soal.php", "edit", "Soal");
   echo menu_admin("view/view_tahun.php", "list-alt", "Periode");
   echo menu_admin("view/view_siswa.php", "user", "Mahasiswa");
   echo menu_admin("view/view_nilai.php", "check-square-o", "Nilai");
   // echo menu_admin("view/view_kelas.php", "list-alt", "Kelas");
   echo menu_admin("view/view_kelompok.php", "group", "Kelompok");
   echo menu_admin("view/view_arsip_kelompok.php", "list-alt", "Arsip Kelompok");
}

elseif($_SESSION['leveluser'] == "operator"){
   echo menu_admin("home.php", "home", "Beranda");
   echo menu_admin("view/view_siswa_operator.php", "list-alt", "Mahasiswa");
}
else{
   echo menu_admin("home.php", "home", "Beranda");
   echo menu_admin("view/view_ujian_teacher.php", "edit", "Ujian");
}
?>

   </ul>
   <ul class="nav navbar-nav navbar-right">

<?php
   echo menu_admin("view/view_profil.php", "user", $_SESSION['namalengkap']);
   echo menu_admin("logout.php", "sign-out", "Keluar");
?>

   </ul>
</div>

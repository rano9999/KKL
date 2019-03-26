<script type="text/javascript" src="script/script_siswa.js"> </script>

<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password']) or $_SESSION['leveluser']!="admin"){
   header('location: ../login.php');
}


//Include library yang dibutuhkan
include "../../library/config.php";
include "../../library/function_view.php";
include "../../library/function_form.php";

//Membuat judul, tombol tambah, tombol import dan tombol cetak kartu
create_title("list-alt", "Manajemen Mahasiswa");
// create_button("info", "print", "Cetak Kartu", "btn-print", "form_print()");
create_button("success", "plus-sign", "Tambah", "btn-add", "form_add()");
create_button("success", "plus-sign", "Import Data", "btn-add", "form_import()");

  echo '
  <div id="alr" class="row" hidden>
  <div class="col-md-12">
    <div style="background:#2979FF;color:white; text-align:center" class="alert col-md-12">
        <b>Berhasil Menambah Data</b>
    </div>
  </div>
  </div>
  ';
//Membuat header dan footer tabel
create_table(array("NIM", "Nama Mahasiswa", "Jenis Kelamin", "Kategori DISC", "Periode", "Aksi"));

//Membuat form tambah dan edit data
open_form("modal_siswa", "return save_data()");
   create_textbox("NIM", "nim", "text", 4, "", "required");
   create_textbox("Nama Siswa", "nama", "text", 6, "", "required");
   echo '
   <div class="form-group">
   <label class="col-sm-2 control-label">Jenis Kelamin</label>
   <div class="col-sm-4">
     <select class="form-control" name="jk" id="jk">
       <option value="L">Laki-laki</option>
       <option value="P">Perempuan</option>
     </select>
     </div>
   </div>
   ';
   $qperiode = mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'");
   $listP = array();
   while($pr = mysqli_fetch_array($qperiode)){
      $listP[] = array($pr['periode'], $pr['periode']);
   }
   ?>
   <?php
   echo '
   <div class="form-group">
   <label class="col-sm-2 control-label">Kategori DISC</label>
   <div class="col-sm-4">
     <select class="form-control" name="kategori" id="kategori">
       <option value="Dominant">Dominant</option>
       <option value="Influencing">Influencing</option>
       <option value="Steadiness">Steadiness</option>
       <option value="Conscientiousness">Conscientiousness</option>
     </select>
     </div>
   </div>
   ';
   create_combobox("Periode", "periode", $listP, 4, "", "required");

close_form();

//Membuat form import
open_form("modal_import", "return import_data()");
   create_textbox("Pilih File .xlsx", "file", "file", 6, "", "required");
   $qkelas = mysqli_query($mysqli, "SELECT * FROM kelas");
   $list = array();
close_form("import", "Import");
?>

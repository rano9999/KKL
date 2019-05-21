<script type="text/javascript" src="script/script_setting.js"> </script>

<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['password']) or $_SESSION['leveluser'] != "admin") {
   header('location: ../login.php');
}

include "../../library/function_view.php";
include "../../library/function_form.php";

create_title("signal", "Setting");

create_table(array("Nama Ketua LPPM", "NIK", "Aksi"));

open_form("modal_kelas", "return save_data()");
   create_textbox("Nama Ketua LPPM", "nama", "text", 4, "", "required");
   create_textbox("NIK", "nik", "text", 4, "", "required");
close_form();


//Membuat form import
open_form("modal_import", "return import_data()");
create_textbox("Pilih File .xlsx", "file", "file", 6, "", "required");
close_form("import", "Import");
?>
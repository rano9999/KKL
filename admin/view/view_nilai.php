<script type="text/javascript" src="script/script_nilai.js"> </script>

<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password']) ){
   header('location: ../login.php');
}

include "../../library/function_view.php";
include "../../library/function_form.php";

create_title("check", "Hasil Ujian");
create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
create_button("warning", "download", "Export Nilai C", "btn-add", "export_nilai_c()");
create_button("warning", "download", "Export Nilai S", "btn-add", "export_nilai_s()");
create_button("warning", "download", "Export Nilai I", "btn-add", "export_nilai_i()");
create_button("warning", "download", "Export Nilai D", "btn-add", "export_nilai_d()");
create_button("success", "plus-sign", "Import Data", "btn-add", "form_import()");

create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiD", "NilaiI", "NilaiS", "NilaiC", "Periode"));



//Membuat form import
open_form("modal_import", "return import_data()");
   create_textbox("Pilih File .xlsx", "file", "file", 6, "", "required");
close_form("import", "Import");


// echo '<input type="hidden" id="id_ujian" value="'.$_GET['ujian'].'">
// <input type="hidden" id="id_kelas" value="'.$_GET['kelas'].'">';

// create_title("check", "Hasil Ujian Mahasiswa Nilai D");
// create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
// create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiD","NilaiD"));

// create_title("check", "Hasil Ujian Mahasiswa Nilai I");
// create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
// create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiI"));

// create_title("check", "Hasil Ujian Mahasiswa Nilai S");
// create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
// create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiS"));

// create_title("check", "Hasil Ujian Mahasiswa Nilai C");
// create_button("warning", "download", "Export Nilai", "btn-add", "export_nilai()");
// create_table(array("NIM", "Nama Mahasiswa", "Tipe Kepribadian", "NilaiC"));
?>

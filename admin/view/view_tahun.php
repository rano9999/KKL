<script type="text/javascript" src="script/script_tahun.js"> </script>

<?php

//Include library yang dibutuhkan
include "../../library/config.php";
include "../../library/function_view.php";
include "../../library/function_form.php";

//Membuat judul, tombol tambah, tombol import dan tombol cetak kartu
create_title("list-alt", "Manajemen Tahun Periode");
// create_button("info", "print", "Cetak Kartu", "btn-print", "form_print()");
create_button("success", "plus-sign", "Tambah", "btn-add", "form_add()");
// create_button("success", "plus-sign", "Import Data", "btn-add", "form_import()");


//Membuat header dan footer tabel
create_table(array("Tahun Periode", "Jumlah Kelompok", "Jumlah Anggota Perkelompok", "Anggota D tiap Kelompok", "Anggota I tiap Kelompok", "Anggota S tiap Kelompok", "Anggota C tiap Kelompok", "Aktif", "Aksi"));

//Membuat form tambah dan edit data
open_form("modal_tahun", "return save_data()");
create_textbox("Id Periode", "id_tahun", "text", 6, "", "");
create_textbox("Tahun Periode", "periode", "text", 6, "", "required");
create_textbox("Jumlah Kelompok", "jml_kel", "number", 6, "", "required");
create_textbox("Jumlah D", "jml_D", "number", 6, "", "required");
create_textbox("Jumlah I", "jml_I", "number", 6, "", "required");
create_textbox("Jumlah S", "jml_S", "number", 6, "", "required");
create_textbox("Jumlah C", "jml_C", "number", 6, "", "required");
echo '
   <div class="form-group" id="aktif" hidden>
   <label class="col-sm-2 control-label">Aktifasi</label>
   <div class="col-sm-4">
     <select class="form-control" name="aktif" id="aktif1">
       <option value="Tidak">Tidak</option>
       <option value="Ya">Ya</option>
     </select>
     </div>
   </div>
   ';
close_form();

?>
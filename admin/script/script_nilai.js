var table;
$("#loading").hide();
// $("#panel").hide();

$(function(){
   var ujian = $('#id_ujian').val();
   var kelas = $('#id_kelas').val();
   table = $('.table').DataTable({
      "processing" : true,
      "pageLength" : 25,
      "paging" : true,
      "ajax" : {
         "url" : "ajax/ajax_nilai.php?action=table_data&ujian=" + ujian + "&kelas=" + kelas,
         "type" : "POST"
      }
   });
});

function pilih() {
   $("#loading").show(); // Tampilkan loadingnya
   $.ajax({
      url: "ajax/pilih.php",
      type: "POST",
      success: function (data) {
         $("#loading").hide(); // Sembunyikan loadingnya
         $("#display_info").load("view/view_nilai.php #display_info");
         $("#cek").load("view/view_nilai.php #cek");
         table.ajax.reload();
      },
      error: function () {
         alert("Tidak dapat menghapus data!");
      }
   });
}

function cek() {
   $("#loading").show(); // Tampilkan loadingnya
   $.ajax({
      url: "ajax/cek.php",
      type: "POST",
      success: function (data) {
         $("#loading").hide(); // Sembunyikan loadingnya
         $("#display_info").load("view/view_nilai.php #display_info");
         table.ajax.reload();
      },
      error: function () {
         alert("Tidak dapat menghapus data!");
      }
   });
}

function cekUlangD() {
   $("#loading").show(); // Tampilkan loadingnya
   $.ajax({
      url: "ajax/cek_ulangD.php",
      type: "POST",
      success: function (data) {
         $("#loading").hide(); // Sembunyikan loadingnya
         $("#display_info").load("view/view_nilai.php #display_info");
         table.ajax.reload();
      },
      error: function () {
         alert("Tidak dapat menghapus data!");
      }
   });
}

function cekUlangI() {
   $("#loading").show(); // Tampilkan loadingnya
   $.ajax({
      url: "ajax/cek_ulangI.php",
      type: "POST",
      success: function (data) {
         $("#loading").hide(); // Sembunyikan loadingnya
         $("#display_info").load("view/view_nilai.php #display_info");
         table.ajax.reload();
      },
      error: function () {
         alert("Tidak dapat menghapus data!");
      }
   });
}

function cekUlangS() {
   $("#loading").show(); // Tampilkan loadingnya
   $.ajax({
      url: "ajax/cek_ulangS.php",
      type: "POST",
      success: function (data) {
         $("#loading").hide(); // Sembunyikan loadingnya
         $("#display_info").load("view/view_nilai.php #display_info");
         table.ajax.reload();
      },
      error: function () {
         alert("Tidak dapat menghapus data!");
      }
   });
}

function cekUlangC() {
   $("#loading").show(); // Tampilkan loadingnya
   $.ajax({
      url: "ajax/cek_ulangC.php",
      type: "POST",
      success: function (data) {
         $("#loading").hide(); // Sembunyikan loadingnya
         $("#display_info").load("view/view_nilai.php #display_info");
         table.ajax.reload();
      },
      error: function () {
         alert("Tidak dapat menghapus data!");
      }
   });
}

function export_nilai(){
   ujian = $('#id_ujian').val();
   kelas = $('#id_kelas').val();
   window.open("export/excel_nilai.php", "Export Nilai");
}

function export_nilai_d(){
   ujian = $('#id_ujian').val();
   kelas = $('#id_kelas').val();
   window.open("export/nilai_d.php", "Export Nilai");
}

function export_nilai_i(){
   ujian = $('#id_ujian').val();
   kelas = $('#id_kelas').val();
   window.open("export/nilai_i.php", "Export Nilai");
}

function export_nilai_s(){
   ujian = $('#id_ujian').val();
   kelas = $('#id_kelas').val();
   window.open("export/nilai_s.php", "Export Nilai");
}

function export_nilai_c(){
   ujian = $('#id_ujian').val();
   kelas = $('#id_kelas').val();
   window.open("export/nilai_c.php", "Export Nilai");
}


//Ketika tombol Cetak Kartu diklik
function form_print(){
   $('#modal_print').modal('show');
   $('.modal-title').text('Cetak Nilai');
   $('#modal_print form')[0].reset();
}

//Ketika tombol Cetak pada modal diklik
function print_data(){
   $('#modal_print').modal('hide');
window.open("export/pdf_nilai.php?kelas="+$('#kelas_print').val(), "Cetak Nilai", "height=650, width=1024, left=150, scrollbars=yes");
   return false;
}


//Ketika tombol import diklik
function form_import(){
   $('#modal_import').modal('show');
   $('.modal-title').text('Import Excel');
   $('#modal_import form')[0].reset();
}

//Ketika tombol import pada modal diklik
function import_data(){
   var formdata = new FormData();
   var file = $('#file')[0].files[0];
   formdata.append('file', file);
   $.each($('#modal_import form').serializeArray(), function(a, b){
      formdata.append(b.name, b.value);
   });
   $.ajax({
      url: 'ajax/ajax_nilai.php?action=import',
      data: formdata,
      processData: false,
      contentType: false,
      type: 'POST',
      success: function(data) {
         if(data=="ok"){
            $('#modal_import').modal('hide');
            table.ajax.reload();
         }else{
            alert(data);
         }
      },
      error: function(data){
         alert('Tidak dapat mengimport data!');
      }
   });
   return false;
}

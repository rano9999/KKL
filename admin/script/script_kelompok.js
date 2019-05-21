var table;
$("#loading").hide();

$(function(){
   table = $('.table').DataTable({
      "processing" : true,
      "pageLength" : 10,
      "paging" : true,
      "ajax" : {
         "url" : "ajax/ajax_kelompok.php?action=table_data",
         "type" : "POST"
      }
   });
});

function Generate_kelompok(){
  $("#loading").show(); // Tampilkan loadingnya
    $.ajax({
       url : "ajax/bagi_kelompok.php",
       type : "POST",
       success : function(data){
           $("#loading").hide(); // Sembunyikan loadingnya
           $( "#display_info" ).load( "view/view_kelompok.php #display_info" );
           $.notify({
              title: '<strong>Sukses!</strong>',
              message: 'Kelompok Berhasil di generate.'
           }, {
              type: 'success'
           });
           table.ajax.reload();
       },
       error : function(){
          alert("Tidak dapat menghapus data!");
       }
    });
}

//Ketika tombol Cetak pada modal diklik
function pdf_kelompok() {
   window.open("export/pdf_kel.php");
   return false;
}

function export_kelompok(){
   window.open("export/kelompok.php", "Export Nilai");
}

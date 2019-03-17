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

function analisis_kelompok(){
  $("#loading").show(); // Tampilkan loadingnya
    $.ajax({
       url : "ajax/analisis_kelompok.php",
       type : "POST",
       success : function(data){
         $("#loading").hide(); // Sembunyikan loadingnya
           $( "#display_info" ).load( "view/view_kelompok.php #display_info" );
       },
       error : function(){
          alert("Tidak dapat menghapus data!");
       }
    });
}

function Generate_kelompok(){
  $("#loading").show(); // Tampilkan loadingnya
    $.ajax({
       url : "ajax/bagi_kelompok.php",
       type : "POST",
       success : function(data){
         $("#loading").hide(); // Sembunyikan loadingnya
           // $( "#display_info" ).load( "view/view_kelompok.php #display_info" );
           table.ajax.reload();

       },
       error : function(){
          alert("Tidak dapat menghapus data!");
       }
    });
}

function export_kelompok(){
   window.open("export/kelompok.php", "Export Nilai");
}

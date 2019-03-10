var table;

$(document).ready(function(){

 load_data();

 function load_data(query='')
 {
  $.ajax({
   url:"ajax/ajax_arsip_kelompok.php?action=all_data",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('tbody').html(data);
   }
  })
 }

 $('#multi_search_filter').change(function(){
  $('#hidden_country').val($('#multi_search_filter').val());
  var query = $('#hidden_country').val();
  load_data(query);
 });

});

$(function(){
   table = $('.table').DataTable({
      "processing" : true,
      "pageLength" : 50,
      "paging" : true,
      "ajax" : {
         "url" : "ajax/ajax_arsip_kelompok.php?action=table_data",
         "type" : "POST"
      }
   });
});

function generate_kelompok(id){
    $.ajax({
       url : "export/bagi.php",
       success : function(data){
          table.ajax.reload();
       },
       error : function(){
          alert("Tidak dapat menghapus data!");
       }
    });
}

function export_nilai_c(){
   ujian = $('#id_ujian').val();
   kelas = $('#id_kelas').val();
   window.open("export/nilai_c.php", "Export Nilai");
}

var table;
$("#loading").hide();

$(function(){
   table = $('.table').DataTable({
     "processing" : true,
     "ajax" : {
        "url" : "ajax/ajax_ujian_teacher.php",
        "type" : "POST"
     }
   });
});

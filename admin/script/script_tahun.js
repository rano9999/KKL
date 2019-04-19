var save_method, table;
$("#loading").hide();

//Menampilkan data ke tabel dengan plugin dataTable
$(function(){
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "ajax/ajax_tahun.php?action=table_data",
         "type" : "POST"
      }
   });
});

//Ketika tombol tambah diklik
function form_add(){
   save_method = "add";
   $('#id_tahun').hide();
   $('label[for="id_tahun"]').hide();
   $('#modal_tahun').modal('show');
   $('#modal_tahun form')[0].reset();
   $('.modal-title').text('Tambah Tahun');
}

//Ketika tombol edit diklik
function form_edit(id){
   save_method = "edit";
   $('#modal_tahun form')[0].reset();
   $.ajax({
      url : "ajax/ajax_tahun.php?action=form_data&id="+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal_tahun').modal('show');
         $('.modal-title').text('Edit Tahun');
         $('#id_tahun').val(data.id).hide();
         $('label[for="id_tahun"]').hide();
         $('#jml_kel').val(data.jml_kel);
         $('#jml_D').val(data.jml_D);
         $('#jml_I').val(data.jml_I);
         $('#jml_S').val(data.jml_S);
         $('#jml_C').val(data.jml_C);
         $('#periode').val(data.periode);
         $('#aktif').val(data.aktif).attr('hidden',false);
         $('#aktif1').val(data.aktif);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

//Ketika tombol simpan diklik
function save_data(){
   if(save_method == "add")
      url = "ajax/ajax_tahun.php?action=insert";

   else url = "ajax/ajax_tahun.php?action=update";
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal_tahun form').serialize(),
      success : function(data){
         if(data=="ok"){
            $('#modal_tahun').modal('hide');
              $('#alr').show();
            table.ajax.reload();
         }else{
            alert(data);
            $('#id_tahun').focus();
         }
      },
      error : function(){
         alert("Tidak dapat menyimpan data!");
      }
   });
   return false;
}

//Ketika tombol hapus diklik
function delete_data(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "ajax/ajax_tahun.php?action=delete&id="+id,
         type : "GET",
         success : function(data){
            table.ajax.reload();
         },
         error : function(){
            alert("Tidak dapat menghapus data!");
         }
      });
   }
}

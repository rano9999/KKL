$("#loading").hide();

function form(){
   $('#enb').click(function () {
      $('#inp').removeAttr('disabled');
   });
}

$(function(){	
   $('#form-profil').submit(function(){
      if($('#baru').val() != $('#ulang').val()){
         alert('Password Baru tidak sama dengan Ulang Password');
      }else{
         $.ajax({
            url : "ajax/ajax_profil.php",
            type : "POST",
            data : $('#form-profil').serialize(),
            success : function(data){
               if(data=="ok"){
                  alert("Password berhasil diubah");
                  $('#form-profil')[0].reset();
                  window.location.href = "./logout.php";

               }else{
                  alert(data);
               }
            },
            error : function(){
               alert("Tidak dapat mengubah data!");
            }			
         });
      }
      return false;
   });
});

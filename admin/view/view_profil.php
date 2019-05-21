<?php session_start(); ?>
<script type="text/javascript" src="script/script_profil.js"> </script>

<?php

include "../../library/function_view.php";
include "../../library/function_form.php";
include "../../library/config.php";

$user = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM user WHERE id_user = '$_SESSION[iduser]'"));

create_title("user", "Profil User");

echo '<hr/><form id="form-profil" class="form-horizontal" onsubmit="return edit_data()">';

echo '<div class="form-group">
   <label for="nama" class="col-sm-2 control-label"> Nama Lengkap</label>
   <div class="col-sm-4">
      <input type="text" class="form-control" id="nama" name="nama" value="' . $user['nama'] . '" required>
   </div> </div>';

echo '<div class="form-group">
   <label for="nama" class="col-sm-2 control-label"> Username</label>
   <div class="col-sm-4">
      <input type="text" class="form-control" id="nama" name="username" value="' . $user['username'] . '" required>
   </div> </div>';

create_textbox("Password Lama", "lama", "password", 4, "", "required");
create_textbox("Password Baru", "baru", "password", 4, "", "required");
create_textbox("Ulang Password", "ulang", "password", 4, "", "required");

echo '<div class="form-group">
        <div class="col-md-2 col-md-offset-2">
            <button class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Ubah Password </button>
        </div>
     </div></form>';
?>
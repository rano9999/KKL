<script type="text/javascript" src="script/script_arsip_kelompok.js"> </script>

<?php

include "../../library/function_view.php";
include "../../library/function_form.php";
include "../../library/config.php";


create_title("check", "Arsip Kelompok KKL");
echo "<br>";
echo "<br>";
echo "<br>";
// create_button("warning", "download", "Export Data Kelompok", "btn-add", "export_kelompok()");
// create_button("primary", "user", "Generate Kelompok", "btn-add", "generate_kelompok()");

$query = "SELECT * FROM periode ORDER BY id DESC";

$statement = $pdo->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$cekP = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM periode WHERE aktif = 'Ya'"));
?>
<div class="row">
  <div class="col-md-12">
    <select name="multi_search_filter" id="multi_search_filter" class="form-control">
      <option value="">Pilih Periode</option>
    <?php
    foreach($result as $row)
    {
     echo '<option value="'.$row["periode"].'">'.$row["periode"].'</option>';
    }
    ?>
    </select>
    <input type="hidden" name="hidden_country" id="hidden_country" />
    <div style="clear:both"></div>
    <br />
    <div class="table-responsive">
     <table class="table table-striped table-bordered">
      <thead>
       <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>kategori</th>
        <th>Kelompok</th>
        <th>Periode</th>
       </tr>
      </thead>
      <tbody>
      </tbody>
     </table>
    </div>
  </div>
</div>

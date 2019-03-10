<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=psikotes", "root", "");

if($_POST["query"] != '')
{
 $search_array = explode(",", $_POST["query"]);
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "
 SELECT * FROM kelompok
 WHERE periode IN (".$search_text.")
 ORDER BY id DESC
 ";
}
else
{
 $query = "SELECT * FROM kelompok ORDER BY id DESC";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["nim"].'</td>
   <td>'.$row["kategori"].'</td>
   <td>'.$row["periode"].'</td>
  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;


?>

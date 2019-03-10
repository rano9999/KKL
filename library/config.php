<?php
// Membuat variabel, ubah sesuai dengan nama host dan database pada hosting
$host	= "localhost";
$user	= "root";
$pass	= "";
$db	= "psikotes";

//Menggunakan objek mysqli untuk membuat koneksi dan menyimpanya dalam variabel $mysqli
$mysqli = new mysqli($host, $user, $pass, $db);

//Membuat variabel yang menyimpan url website dan folder website
$url_website = "http://localhost/psikotes2/";
$folder_website = "/cbt";
$pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);

//Menentukan timezone
date_default_timezone_set('Asia/Jakarta');
?>

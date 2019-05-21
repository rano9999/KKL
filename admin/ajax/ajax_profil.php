<?php
session_start();
include "../../library/config.php";

$lama = md5($_POST['lama']);
$baru = md5($_POST['baru']);
$user = $_POST['username'];
$nama = $_POST['nama'];

$cek = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM user WHERE id_user='$_SESSION[iduser]'"));
if($cek['password'] != $lama){
   echo "Password lama salah!";
}else{
   mysqli_query($mysqli, "UPDATE user SET password='$baru', username = '$user', nama = '$nama' WHERE id_user='$_SESSION[iduser]'");
   echo "ok";
}
?>

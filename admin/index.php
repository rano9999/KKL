<?php
session_start();
ob_start();

//Mengatur batas login
$timeout = $_SESSION['timeout'];
if(time()<$timeout){
   $_SESSION['timeout'] = time()+5000;
}else{
   $_SESSION['login'] = 0;
}

//Mengecek status login
if(empty($_SESSION['username']) or empty($_SESSION['password']) or $_SESSION['login']==0){
   header('location: login.php');
}
?>

<html>
<head>

<title>Halaman Administrator</title>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="../assets/img/brand/favicon1.png" rel="icon" type="image/png">

<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="../assets/dataTables/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/admin.css"/>

<script type="text/javascript" src="../assets/jquery/jquery-2.0.2.min.js"></script>

<style media="screen">
  #loading{
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    display: flex;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
    background: white;
  }
  #loading > img{
    width: 30%;
  }
</style>


</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container">
      <?php include "menu.php"; ?>
   </div>
</nav>

<section>
   <div  class="container">
      <div class="row">
         <div class="col-xs-12" id="content"></div>
      </div>
   </div>
</section>

<footer>
   <div class="container">
      <p class="text-center">Copyright &copy; Dita. All right reserved.</p>
   </div>
</footer>

<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/dataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/dataTables/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="../js/admin.js"></script>

</body>
</html>

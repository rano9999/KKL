<?php
error_reporting(0);
$a = 30;
$b = 90;

$c = $b/$a;
$d = ceil($b/$a);

$data = array($c);
$j = 1;

for ($i=1; $i < $d; $i++) {
  if ($j > $c) {
    $j = 1;
    $data[$j] = $data[$j] + 1;
    $j++;
  }else{
    $data[$j] = $data[$j] + 1;
    $j++;
  }
}

for ($i=0; $i < $c; $i++) {
   $info = array($i+1, $a+$data[$i]);
   print_r($info);
}

 ?>

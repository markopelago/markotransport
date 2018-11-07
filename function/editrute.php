<?php 
include 'db.php';
$identity=$_GET['id'];
$asal=$_POST['asal'];
$tujuan=$_POST['tujuan'];
$harga=$_POST['harga'];
error_reporting(ALL);
   mysqli_query($db,"UPDATE data_rute SET kota_asal='$asal',kota_tujuan='$tujuan',harga='$harga' WHERE id='$identity'");
header('Location:../index.php?page=rute');
?>
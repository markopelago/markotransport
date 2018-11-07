<?php 
include 'db.php';
$identity=$_GET['id'];
$asal=$_POST['asal'];
$tujuan=$_POST['tujuan'];
$harga=$_POST['harga'];
error_reporting(ALL);
for($i=0;$i<count($asal);$i++)
 {
  if($asal[$i]!="" && $tujuan[$i]!="" && $harga[$i]!="")
  {
   mysqli_query($db,"insert into data_rute (armadaID,kota_asal,kota_tujuan,harga) values ('$identity','$asal[$i]','$tujuan[$i]','$harga[$i]')");	 
  }
 }

header('Location:../index.php?page=rute');
?>
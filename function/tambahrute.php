<?php 
include 'db.php';
$identity=$_GET['id'];
$asal=$_POST['asal'];
$tujuan=$_POST['tujuan'];
$harga=$_POST['harga'];
$forwarder=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM forwarder_vehicle where id='$identity'"));
$type=$forwarder['load_type'];
$by=$_SESSION['name'];
$ip=$_SERVER['REMOTE_ADDR'];
$ida=$idasal['id'];
$idt=$idtujuan['id'];

error_reporting(0);
for($i=0;$i<count($asal);$i++)
 {

 	$idasal=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM locations where name_id='$asal[$i]'"));
$idtujuan=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM locations where name_id='$tujuan[$i]'"));
$ida=$idasal['id'];
$idt=$idtujuan['id'];
  if($asal[$i]!="" && $tujuan[$i]!="" && $harga[$i]!="")
  {
   mysqli_query($db,"insert into routes (forwarder_id,source_location_id,destination_location_id,price,load_type,created_by,created_at,created_ip,update_at,update_by,update_ip) values ('$identity','$ida','$idt','$harga[$i]','$type','$date','$by','$ip','$date','$by','$ip')");	 
  }
 }

header('Location:../index.php?page=rute');
?>
<?php
include 'db.php';
include 'inv.php';
$id=$_GET['id'];
$service=$_GET['service'];
$nama=$_POST['nama'];
$nomor=$_POST['nomor_pengirim'];
$plat=$_POST['plat'];
$catatan=$_POST['catatan'];
$waktu=date("Y-m-d H:i:s");
$dtrtt=mysqli_fetch_array(mysqli_query($db,"SELECT id,rute_id,qty_truck FROM data_pemesanan where id=$id"));
$dtarmdd=mysqli_fetch_array(mysqli_query($db,"SELECT id,armadaID FROM data_rute where id=$dtrtt[rute_id]"));
if($service=='boarding'){
	mysqli_query($db,"UPDATE data_pemesanan SET nama_pengirim='$nama',kontak_pengirim='$nomor',plat_kendaraan='$plat',status='Shiping' where id=$id ");
}elseif($service=='shiping'){
	mysqli_query($db,"UPDATE data_pemesanan SET catatan_transporter='$catatan',waktu_tiba='$waktu',status='Delivered' where id=$id ");
	mysqli_query($db,"UPDATE data_armada SET available=available + $dtrtt[qty_truck] where id=$dtarmdd[armadaID] ");
}
header('Location:../index.php?page=history');

?>
<?php
include 'db.php';
include 'inv.php';
$rute=$_GET['rute'];
$transporter=$_GET['id'];
$armada=$_GET['armada'];
$nama=$_POST['nama'];
$catatan=$_POST['catatan'];
$qty_truck=$_POST['qty_truck'];
$jemput=$_POST['jmpt'];
$tiba=$_POST['tiba'];
$kontak=$_POST['nomor_pemesan'];
$tgljemput=$_POST['tgljmpt'];
mysqli_query($db,"UPDATE data_armada SET available=available - $qty_truck where id=$armada");
mysqli_query($db,"INSERT INTO data_pemesanan (`pemesan`, `transporter_id`, `rute_id`, `qty_truck`,`catatan_pemesan`, `titik_tiba`, `kontak_pemesan`, `titik_jemput`, `invoiceID`, `tanggal_jemput`) VALUES ('$nama', '$transporter', '$rute', '$qty_truck', '$catatan', '$tiba', '$kontak', '$jemput', '$formcode', '$tgljemput')");
header('Location:../order.php');
?>
<?php
include 'db.php';
$nama=$_POST['nama'];
$email=$_POST['email'];
$unpass=$_POST['pass'];
$pass=md5($unpass);
$alamat=$_POST['alamat'];
$nomor=$_POST['nomor'];
$mysql="INSERT INTO transporter (nama,alamat,email,password,nomor_telp) VALUES ('$nama','$alamat','$email','$pass','$nomor')";
$insert=mysqli_query($db,$mysql);
header('Location:../login/index.php');


?>
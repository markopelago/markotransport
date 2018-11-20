<?php
$act=$_GET['act'];
include 'db.php';
if ($act=='login') {
$email=$_POST['form-email'];
$unenrcrypted=$_POST['form-password'];
$password=base64_encode($unenrcrypted);
$ceklogin=mysqli_fetch_array(mysqli_query($db,"SELECT * from transporter where email='$email' AND password='$password'"));
if ($ceklogin['id']==TRUE) {
$_SESSION['transporter_email']=$ceklogin['email'];
$_SESSION['nama_transporter']=$ceklogin['nama'];
$_SESSION['id_transporter']=$ceklogin['id'];
$updatelogin=mysqli_query($db,"UPDATE transporter set last_login=$date where email=$email");
	  header('Location:../index.php');
} else {
echo "<script type='text/javascript'>alert('Data Login Anda Salah'); window.location.href='../login/index.php';
   </script>";
}
}elseif($act='logout'){
unset($_SESSION['transporter_email']);
unset($_SESSION['nama_transporter']);
unset($_SESSION['id_transporter']);
session_destroy();
header('Location:../login/index.php');
exit();

}

?>
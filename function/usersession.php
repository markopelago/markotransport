<?php
$act=$_GET['act'];
include 'db.php';
if ($act=='login') {
$email=$_POST['form-email'];
$unenrcrypted=$_POST['form-password'];
$clientip=$_SERVER['REMOTE_ADDR'];
$password=base64_encode($unenrcrypted);
$ceklogin=mysqli_fetch_array(mysqli_query($db,"SELECT * from a_users where email='$email' AND password='$password'"));
if ($ceklogin['id']==TRUE) {
$_SESSION['email']=$ceklogin['email'];
$_SESSION['name']=$ceklogin['name'];
$_SESSION['id']=$ceklogin['id'];
$updatelogin=mysqli_query($db,"UPDATE a_users set last_sign_in_at=$date AND last_sign_in_ip=$clientip where email=$email");
	  header('Location:../index.php');
} else {
echo "<script type='text/javascript'>alert('Data Login Anda Salah'); window.location.href='../login/index.php';
   </script>";
}
}elseif($act='logout'){
unset($_SESSION['email']);
unset($_SESSION['name']);
unset($_SESSION['id']);
session_destroy();
header('Location:../login/index.php');
exit();

}

?>
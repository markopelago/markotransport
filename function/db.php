<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
$server = '192.168.1.123' ;
$username = 'user' ;
$password = '' ;
$database = 'markopelago';
$db=mysqli_connect("$server","$username","$password","$database");
$date=date("Y-m-d H:i:s");
$mysqli = new mysqli("$server","$username","$password","$database");
function buatrp($angka)
{
 $jadi = "Rp " . number_format($angka,2,',','.');
return $jadi;
}
?>

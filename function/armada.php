<?php
$service=$_GET['service'];
include 'db.php';
$nama=$_POST['nama'];
$jenis_armada=$_POST['vehicle_types'];
$max_load=$_POST['max_load'];
$typeload=$_POST['typeload'];
$identity=$_SESSION['id'];
$ekstensi_diperbolehkan	= array('png','jpg');
			$namafile = $_FILES['file']['name'];
			$x = explode('.', $namafile);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];



if($service=='addarmada'){

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, '../image/'.$namafile);
					if($query){echo "<script type='text/javascript'>alert('Data Berhasil Masuk!')</script>
			<meta http-equiv='refresh' content='1; url=../index.php?page=kendaraan'>
			";}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}	
$mysql="INSERT INTO forwarder_vehicles (user_id,name,vehicle_types,photo,max_load,load_type) VALUES ('$identity','$nama','$jenis_armada','$namafile','$max_load','$typeload')";
$insert=mysqli_query($db,$mysql);
header('Location:../index.php?page=kendaraan');
}elseif($service=='editarmada'){

}

?>
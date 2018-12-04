<?php
$service=$_GET['service'];
include 'db.php';
$nama=$_POST['name'];
$type=$_POST['vehicle_type'];
$max_load=$_POST['max_load'];
$typeload=$_POST['typeload'];
$brands=$_POST['brands'];
$weight=$_POST['dimension_weight'];
$lenght=$_POST['dimension_lenght'];
$height=$_POST['dimension_height'];
$nopol=$_POST['nopol'];
$desc=$_POST['desc'];
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
$mysql="INSERT INTO forwarder_vehicles (user_id,name,vehicle_type_id,vehicle_brand_id,dimension_load_l,dimension_load_w,dimension_load_h,max_load,nopol,load_type,photo,description) VALUES ('$identity','$nama','$type','$brands','$lenght','$weight','$height','$max_load','$nopol','$typeload','$namafile','$desc')";
$insert=mysqli_query($db,$mysql);
header('Location:../index.php?page=kendaraan');
}elseif($service=='editarmada'){

}

?>
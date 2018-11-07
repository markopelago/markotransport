<div class="row">
	EDIT RUTE <?php $idd=$_GET['id']; $dT=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM data_rute where id=$idd")); ?>
	<form action="function/editrute.php?id=<?php echo $idd; ?>" method="POST">
<table class="col-md-12" id="tabel_barang" >
   <tr id="row1">
   <td><label>Kota Asal</label> </td> <td>:</td>  <td><input type="text" class="form-control1" name="asal" value="<?php echo $dT[kota_asal]; ?>" placeholder="PILIH KOTA ASAL" list="cityname">
<datalist id="cityname">
  <?php include 'function/db.php'; $slctasal=mysqli_query($db,"SELECT * FROM kabupaten"); while ($dtt=mysqli_fetch_array($slctasal)) {
    ?>
  <option value="<?php echo $dtt[nama]; ?>">
  <?php } ?></td>
   <td><label> Kota Tujuan </label></td> <td>:</td>  <td><input type="text" value="<?php echo $dT[kota_tujuan]; ?>" class="form-control1" name="tujuan" placeholder="PILIH KOTA TUJUAN" list="cityname"></td>
    
    <td> <label>Harga</label> </td> <td>:</td> <td><input type="text" required="required" class="form-control1" value="<?php echo $dT[harga]; ?>" name="harga" placeholder="Harga"></td>
   </tr>
  
  </table>
<button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
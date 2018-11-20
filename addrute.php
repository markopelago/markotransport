<div class="row">
  INPUT RUTE ARMADA <?php $idd=$_GET['id'];$sss=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM forwarder_vehicles where id=$idd" )); echo $sss[nama]; ?>
  <form action="function/tambahrute.php?id=<?php echo $idd; ?>" method="POST">
<table class="col-md-12" id="tabel_barang" >
   <tr id="row1">
   <td><label>Kota Asal</label> </td> <td>:</td>  <td><input type="text" class="form-control1" name="asal[]" placeholder="PILIH KOTA ASAL" list="cityname">
<datalist id="cityname">
  <?php  $slctasal=mysqli_query($db,"SELECT * FROM locations where parent_id!=0"); while ($dtt=mysqli_fetch_array($slctasal)) {
    ?>
  <option value="<?php echo $dtt[name_id]; ?>">
  <?php } ?>
</datalist></td>
   <td><label> Kota Tujuan </label></td> <td>:</td>  <td><input type="text" class="form-control1" name="tujuan[]" placeholder="PILIH KOTA TUJUAN" list="cityname"></td>
    
    <td> <label>Harga</label> </td> <td>:</td> <td><input type="text" required="required" class="form-control1" name="harga[]" placeholder="Harga"></td>
   </tr>
<script>$(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })</script>
  
  </table>
<input style="float: right" type="button" onclick="add_row();" value="Tambah Rute">
<button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
<link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd MM yy',showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,

            orientation: "right bottom",
            changeMonth: true,
            changeYear: true });
  } );
  </script>
  <style type="text/css">
  	.datepicker{z-index:1151 !important;}
</style>
<?php 
    include 'function/db.php';
      $idg=$_POST['post_id'];
     $dtrute=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM data_rute where id=$idg"));
    $dtarmada=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM data_armada where id=$dtrute[armadaID]"));
    if($dtarmada[available]==0){
    ?>
<h1 class="label label-danger">Out Of Order</h1>
<?php }else{ ?>
	<span style="float: right;" class="label label-success">Available</span>
	<form method="post" enctype="multipart/form-data" action="function/order.php?id=<?php echo $dtarmada[transporterID]."&rute=".$idg."&armada=".$dtrute[armadaID]; ?>">
											<h2>Data PIC</h2>
											<div class="form-group">
												<label for="nama-armada" class="control-label">Nama Pemesan</label>
												<input type="text" class="form-control" name="nama">
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label">Nomor telfon</label>
												<input type="text" class="form-control" name="nomor_pemesan">
											</div>
											<label>Gambar Armada</label>
											<img width="100px" height="100px" src="image/<?php echo $dtarmada[foto]; ?>">
											<h2>Data Pemesanan</h2>
											<div class="form-group">
												<label for="foto" class="control-label">Alamat Lengkap Penjemputan</label>
												<input type="text" class="form-control" name="jmpt">
											</div>
											<div class="form-group">
												<label for="foto" class="control-label">Alamat Lengkap Tujuan</label>
												<input type="text" class="form-control" name="tiba">
											</div>
											<div class="form-group">
												<label for="foto" class="control-label">Tanggal Jemput</label>
												<input type="text" class="form-control datepicker" id="datepicker" name="tgljmpt">
											</div>
											<div class="form-group">
												<label for="qty" class="control-label">Qty Truck</label>
												<input type="number" min="1" max="<?php echo $dtarmada['available']; ?>" class="form-control" name="qty_truck">
											</div>
					<div class="form-group">
												<label for="qty" class="control-label">Catatan</label>
												<textarea name="catatan" class="form-control" placeholder="Catatan"></textarea>
											</div>
											<div class="modal-footer">
										<button type="button" onclick="document.getElementById('modal-pesan').style.display='none'" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Save Data</button>
									</div>
										</form>
										<?php } ?>
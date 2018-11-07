	<form method="post" enctype="multipart/form-data" action="function/proccess.php?id=<?php echo $_POST['post_id']; ?>&service=boarding">
											<h2>Data Pengantar</h2>
											<div class="form-group">
												<label for="nama-armada" class="control-label">Nama Pengirim</label>
												<input type="text" class="form-control" placeholder="Nama Pengirim" name="nama">
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label">Nomor telfon</label>
												<input type="text" class="form-control" placeholder="Nomor Telfon" name="nomor_pengirim">
											</div>
										
											<h2>Data Armada</h2>
											<div class="form-group">
												<label for="foto" class="control-label" >Plat Nomor Kendaraan</label>
												<input type="text" class="form-control" name="plat" placeholder="Plat Nomor Kendaraan">
											</div>
											
											<div class="modal-footer">
										<button type="button" onclick="document.getElementById('modal-board').style.display='none'" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Save Data</button>
									</div>
										</form>
							
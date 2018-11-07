<div class="modal fade" id="tambaharmada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="exampleModalLabel">Tambah Armada</h4>
									</div>
									<div class="modal-body">
										<form method="post" enctype="multipart/form-data" action="function/armada.php?service=addarmada">
											<div class="form-group">
												<label for="nama-armada" class="control-label">Nama Armada</label>
												<input type="text" class="form-control" name="nama">
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label">Jenis Armada</label>
												<input type="text" class="form-control select2" name="jenis_armada" list="truk">
												<datalist  id="truk" >
                  <?php 
                  $query=mysqli_query($db,"SELECT * FROM jenis_truck");
                  while ( $grp=mysqli_fetch_array($query)) {
                   ?>
                  <option value="<?php echo $grp[Nama]; ?>" ><?php echo $grp[Nama]; ?></option>
                <?php } ?>
                </select>
											</div>
											<div class="form-group">
												<label for="foto" class="control-label">Foto Armada</label>
												<input type="file" class="form-control" name="file">
											</div>
											
											<div class="form-group">
												<label for="max-load" class="control-label">Max Load</label>
												<input type="text" class="form-control" name="max_load">
											</div>
<div class="form-group">
												<label for="qty" class="control-label">Qty Truck</label>
												<input type="text" class="form-control" name="qty_truck">
											</div>
											<div class="form-group">
                  <label for="typeload" class="control-label">Type Load</label>

                  
                    <div class="radio">
                    <label>
                      <input type="radio" name="typeload" value="food">
                      food
                    </label>
                    <label>
                      <input type="radio" name="typeload" value="non-food">
                      non-food
                    </label>
                  </div>
                
                </div>
											<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Save Data</button>
									</div>
										</form>
									</div>
									
								</div>
							</div>
						</div>
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
												<input type="text" class="form-control" name="name">
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label">Jenis Armada</label>
												<input type="text" class="form-control select2" name="vehicle_type" list="vehicle">
												<datalist  id="vehicle" >
                  <?php 
                  $query=mysqli_query($db,"SELECT * FROM vehicle_types");
                  while ( $grp=mysqli_fetch_array($query)) {
                   ?>
                  <option value="<?php echo $grp[id]; ?>" ><?php echo $grp[name]; ?></option>
                <?php } ?>
                </select>
											</div>
											<div class="form-group">
												<label for="foto" class="control-label">Foto Armada</label>
												<input type="file" class="form-control" name="file">
											</div>
											<div class="form-group">
												<label for="dimension-weight" class="control-label">Berat Beban Dimensi</label>
												<input type="text" class="form-control" name="dimension_weight">
											</div>
											<div class="form-group">
												<label for="dimension-lenght" class="control-label">Panjang Beban Dimensi</label>
												<input type="text" class="form-control" name="dimension_lenght">
											</div>

											<div class="form-group">
												<label for="dimension-height" class="control-label">Tinggi Beban Dimensi</label>
												<input type="text" class="form-control" name="dimension_height">
											</div>
											<div class="form-group">
												<label for="max-load" class="control-label">Max Load</label>
												<input type="text" class="form-control" name="max_load">
											</div>
											<div class="form-group">
												<label for="nopol" class="control-label">Nopol</label>
												<input type="text" class="form-control" name="nopol">
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label">Merek Armada</label>
												<input type="text" class="form-control select2" name="brand" list="merek">
												<datalist  id="merek" >
                  <?php 
                  $query=mysqli_query($db,"SELECT * FROM vehicle_brands");
                  while ( $grp=mysqli_fetch_array($query)) {
                   ?>
                  <option value="<?php echo $grp[name]; ?>" ><?php echo $grp[name]; ?></option>
                <?php } ?>
                </select>
											</div>
											<div class="form-group">
												<label for="desc" class="control-label">Deskripsi</label>
												<input type="text" class="form-control" name="desc">
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
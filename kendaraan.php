
<div class="row">
	<button style="margin-bottom: 5px;" data-toggle="modal" data-target="#tambaharmada" class="btn btn-primary">TAMBAH ARMADA</button>
					
					<div class="col-md widget-shadow">
						<table class="table stats-table ">
							<thead>
								<tr>
									<th>NO</th>
									<th>Jenis Armada</th>
									<th>Nama Armada</th>
									<th>Truck Qty</th>
									<th>Load Type</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
include 'modaladd.php';
								$no = 1; 
								$transid=$_SESSION['id_transporter'];
						
							$sl=mysqli_query($db,"SELECT * from data_armada where transporterID='$transid'"); 
							$s1=5;
							while ( $dtp=mysqli_fetch_array($sl)) {

							?>
								<tr>
									<th scope="row"><?php echo $no++ ?></th>
									<td><?php echo $dtp['jenis_armada']; ?></td>
									<td><?php echo $dtp['nama']; ?></td>
									<td><?php echo $dtp['qty_truck']; ?></td>
										<td> <?php echo $dtp['load_type']; ?>  </td>
										<td><a href="index.php?page=tambahrute&id=<?php echo $dtp['id'];?>">Tambah Rute</a> | <a href="delete.php?id=<?php echo $dtp['id'];?>">Delete</a> </td> 
																</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="clearfix"> </div>
				</div>
				

<div class="row">
	<button style="margin-bottom: 5px;" data-toggle="modal" data-target="#tambaharmada" class="btn btn-primary">TAMBAH ARMADA</button>
					
					<div class="col-md widget-shadow">
						<table class="table stats-table ">
							<thead>
								<tr>
									<th>NO</th>
									<th>Jenis Armada</th>
									<th>Nama Armada</th>
									<th>Max Loady</th>
									<th>Load Type</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
include 'modaladd.php';
								$no = 1; 
								$transid=$_SESSION['id'];
						
							$sl=mysqli_query($db,"SELECT * from forwarder_vehicles where user_id='$transid'"); 
							$s1=5;
							while ( $dtp=mysqli_fetch_array($sl)) {

							?>
								<tr>
									<th scope="row"><?php echo $no++ ?></th>
									<td><?php $vid=$dtp[vehicle_type_id]; $vt=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM vehicle_types where id=$vid")); echo $vt[name]; ?></td>
									<td><?php echo $dtp['name']; ?></td>
									<td><?php echo $dtp['max_load']; ?></td>
									<td><?php echo $dtp['load_type']; ?></td>
										<td><a href="index.php?page=tambahrute&id=<?php echo $dtp['id'];?>">Tambah Rute</a> | <a href="delete.php?id=<?php echo $dtp['id'];?>">Delete</a> </td> 
																</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="clearfix"> </div>
				</div>
				
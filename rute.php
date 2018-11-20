
<div class="row">	
					<div class="col-md widget-shadow">
						<table class="table stats-table ">
							<thead>
								<tr>
									<th>NO</th>
									<th>Armada</th>
									<th>Kota Asal</th>
									<th>Kota Tujuan</th>
									<th>Harga</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
include 'modaladd.php';
								$no = 1; 
								$transid=$_SESSION['id'];
						
							$sl=mysqli_query($db,"SELECT * from routes"); 
							$s1=5;
							while ( $dtp=mysqli_fetch_array($sl)) {

							?>
								<tr>
									<th scope="row"><?php echo $no++ ?></th>
									<td><?php $armd=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM forwarder_vehicles where id=$dtp[forwarder_id]"));echo $armd[name]; ?></td>
									<td><?php $ka=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM locations where id=$dtp[source_location_id]")); echo $ka['name_id']; ?></td>
									<td><?php $kt=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM locations where id=$dtp[destination_location_id]")); echo $kt['name_id']; ?></td>
										<td> <?php echo buatrp($dtp['price']); ?>  </td>
										<td><a href="index.php?page=editrute&id=<?php echo $dtp['id'];?>">Edit Rute</a> | <a href="delete.php?qry=rute&id=<?php echo $dtp['id'];?>">Delete</a> </td> 
																</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="clearfix"> </div>
				</div>
				
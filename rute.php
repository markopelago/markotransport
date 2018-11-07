
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
								$transid=$_SESSION['id_transporter'];
						
							$sl=mysqli_query($db,"SELECT * from data_rute"); 
							$s1=5;
							while ( $dtp=mysqli_fetch_array($sl)) {

							?>
								<tr>
									<th scope="row"><?php echo $no++ ?></th>
									<td><?php $armd=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM data_armada where id=$dtp[armadaID]"));echo $armd[nama]; ?></td>
									<td><?php echo $dtp['kota_asal']; ?></td>
									<td><?php echo $dtp['kota_tujuan']; ?></td>
										<td> <?php echo buatrp($dtp['harga']); ?>  </td>
										<td><a href="index.php?page=editrute&id=<?php echo $dtp['id'];?>">Edit Rute</a> | <a href="delete.php?qry=rute&id=<?php echo $dtp['id'];?>">Delete</a> </td> 
																</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="clearfix"> </div>
				</div>
				
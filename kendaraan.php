
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
									<th>Nopol</th>
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
									<td><?php echo $dtp['nopol']; ?></td>
										<td><a href="index.php?page=tambahrute&id=<?php echo $dtp['id'];?>"><button style="margin-bottom: 5px;" class="btn btn-success" >Tambah Rute</a></button> | <a href="function/armada.php?service=hapusarmada&id=<?php echo $dtp['id'];?>"><button class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span>Delete</a> </td> 
																</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="clearfix"> </div>
				</div>
				<script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok, 
        // pass the id to delete.php and execute the delete query
        window.location = 'delete.php?id=' + id;
    } 
}
</script>
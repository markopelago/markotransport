History Pesanan
<div class="row">	

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

					<div class="col-md widget-shadow">
						<table class="table stats-table ">
							<thead>
								<tr>
									<th>NO</th>
									<th>Status</th>
									<th>Invoice ID</th>
									<th>Pemesan</th>
									<th>Kota Asal</th>
									<th>Kota Tujuan</th>
									<th>Kontak Pemesan</th>
									<th>Harga</th>
									<th>Action</th>
								</tr>
							</thead>
							<div class="modal" id="modal-board">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"> Process Pesanan 
                <button onclick="document.getElementById('modal-board').style.display='none'" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body popupboard" style="display: none; max-height: calc(100vh - 200px); overflow-y: auto;" >
               
              </div>
            </div>
          </div>
            </div>

							<tbody>
								<?php 
include 'modaladd.php';
								$no = 1; 
								$transid=$_SESSION['id_transporter'];
						
							$sl=mysqli_query($db,"SELECT * from data_pemesanan where transporter_id=$idtrp"); 
							$s1=5;
							while ( $dtp=mysqli_fetch_array($sl)) {

							?>
								<tr>
									<th scope="row"><?php echo $no++ ?></th>
									<td><?php  if($dtp[status]=='Pending'){ $lbll='label-warning'; }elseif($dtp[status]=='Shiping'){ $lbll='label-info'; }elseif($dtp[status]=='Delivered'){ $lbll='label-success'; }elseif($dtp[status]=='Rejected'){ $lbll='label-danger'; }    ?><span class='label <?php echo $lbll."'>"; echo $dtp[status]; ?></span></td>
									<td><?php echo $dtp[invoiceID]; ?></td>
									<td><?php echo $dtp[pemesan]; ?></td>
									<td><?php $rt=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM data_rute where id=$dtp[rute_id]"));echo $rt['kota_asal']; ?></td>
									<td><?php echo $rt['kota_tujuan']; ?></td>
									<td><?php echo $dtp[kontak_pemesan]; ?></td>
										<td> <?php echo buatrp($rt['harga']); ?>  </td>
										<td><?php if($dtp[status]=='Pending'){ ?><a class="push" id="<?php echo $dtp['id'];?>" href="#">Proccess</a> |  <a href="delete.php?qry=rute&id=<?php echo $dtp['id'];?>">Reject</a> <?php }elseif($dtp[status]=='Shiping'){ ?><a class="psh" id="<?php echo $dtp['id'];?>" href="#">Proccess</a>  <?php }else{ ?> <a href="delete.php?qry=rute&id=<?php echo $dtp['id'];?>">Delete</a>   <?php } ?></td> 
																</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="clearfix"> </div>
				</div>
<script>
	$(function(){

   $('.push').click(function(){
      var essay_id = $(this).attr('id');

       $.ajax({
          type : 'post',
           url : 'prcs.php', // in here you should put your query 
          data :  'post_id='+ essay_id, // here you pass your id via ajax .
                     // in php you should use $_POST['post_id'] to get this value 
       success : function(r)
           {
              // now you can show output in your modal 
              $('#modal-board').show();  // put your modal id 
             $('.popupboard').show().html(r);
           }
    });


});

   });

$(function(){

   $('.psh').click(function(){
      var essay_id = $(this).attr('id');

       $.ajax({
          type : 'post',
           url : 'dlvrd.php', // in here you should put your query 
          data :  'post_id='+ essay_id, // here you pass your id via ajax .
                     // in php you should use $_POST['post_id'] to get this value 
       success : function(r)
           {
              // now you can show output in your modal 
              $('#modal-board').show();  // put your modal id 
             $('.popupboard').show().html(r);
           }
    });


});

   });
</script>
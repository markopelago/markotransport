<html>
<head>
<title>ORDER MARKO TRANSPORT</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
</head>
<body> 
<div class="container" style="margin-top:100px;"> 
<div class="row"> 
<div class="col-lg-2">&nbsp;</div> 
<div class="col-lg-8"> 
<div class="row"> 
<div class="col-md-12"> 
<form method="POST" action="#">
<div class="form-group"> 
	<label>MASUKAN KOTA ASAL</label>
<input type="text" class="form-control" value="<?php echo $_POST['asal']; ?>" required="required" name="asal" placeholder="PILIH KOTA ASAL" list="cityname">
<datalist id="cityname">
  <?php include 'function/db.php'; $slctasal=mysqli_query($db,"SELECT * FROM kabupaten"); while ($dtt=mysqli_fetch_array($slctasal)) {
  	?>
  <option value="<?php echo $dtt[nama]; ?>">
  <?php } ?>
</datalist>
</div>
<div class="form-group"> 
	<label>MASUKAN KOTA TUJUAN</label>
<input type="text" class="form-control" value="<?php echo $_POST['tujuan']; ?>" required="required" name="tujuan" placeholder="PILIH KOTA TUJUAN" list="cityname">
</div>
<div class="form-group">
	<label for="typeload" class="control-label">Type Load</label>

                  
                    <div class="radio">
                    <label>
                      <input type="radio" name="load" value="food">
                      food
                    </label>
                    <label>
                      <input type="radio" name="load" value="non-food">
                      non-food
                    </label>
                  </div>
                
</div>
<button type="submit" name="submit" class="btn btn-primary">CARI TRANSPORTER</button>
</form> 
</div> 
</div> 
<div class="modal" id="modal-pesan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"> Pesan Transport 
                <button onclick="document.getElementById('modal-pesan').style.display='none'" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body popuppesan" style="display: none; max-height: calc(100vh - 200px); overflow-y: auto;" >
               
              </div>
            </div>
          </div>
            </div>


								<?php 
if(isset($_POST['submit'])){
$asal=$_POST['asal'];
$tujuan=$_POST['tujuan'];
$load=$_POST['load'];
if($load!=null){
$lhtrt=mysqli_query($db,"SELECT * FROM data_rute WHERE kota_asal='$asal' AND kota_tujuan='$tujuan' AND type_load='$load'");	
}else{
$lhtrt=mysqli_query($db,"SELECT * FROM data_rute WHERE kota_asal='$asal' AND kota_tujuan='$tujuan'");
}
if (mysqli_num_rows($lhtrt)==0){ 
echo "TRANSPORTER TIDAK TERSEDIA";
							}else{

?><div class="col-md widget-shadow">
						<table class="table stats-table ">
							<thead>
								<tr>
									<th>NO</th>
									<th>Armada</th>
									<th>Jenis Armada</th>
									<th>Max Load</th>
									<th>Harga</th>
									<th></th>
								</tr>
							</thead>
							<tbody>					
							<?php 
$no=1;
							
							while ($lhtrute=mysqli_fetch_array($lhtrt)) { 	 ?>			
								<tr>
									<th scope="row"><?php echo $no++ ?></th>
									<td><?php $rmd=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM data_armada where id=$lhtrute[armadaID]")); echo $rmd[nama]; ?></td>
									<td><?php echo $rmd[jenis_armada]; ?></td>
									<td><?php echo $rmd[max_load]; ?></td>
										<td> <?php echo buatrp($lhtrute['harga']); ?>  </td>
										<td><?php if($rmd[available]==0){ ?><button class="push btn btn-primary" disabled="disabled" id="<?php echo $lhtrute['id'];?>" href="#">CEK KETERSEDIAAN</button> <span style="float: right;" class="label label-danger">Unavailable</span> <?php }else{ ?><button class="push btn btn-primary" id="<?php echo $lhtrute['id'];?>" href="#">CEK KETERSEDIAAN</button><span style="float: right;" class="label label-success">Available</span> <?php } ?></td> 
																</tr>
							
							
							<?php }   ?>
							</tbody>
						</table>
					</div>
				<?php }  } ?>
</div> 
<div class="col-lg-2">&nbsp;</div> 
</div> 
</div> 
</body>
<script>
	$(function(){

   $('.push').click(function(){
      var essay_id = $(this).attr('id');

       $.ajax({
          type : 'post',
           url : 'ordertr.php', // in here you should put your query 
          data :  'post_id='+ essay_id, // here you pass your id via ajax .
                     // in php you should use $_POST['post_id'] to get this value 
       success : function(r)
           {
              // now you can show output in your modal 
              $('#modal-pesan').show();  // put your modal id 
             $('.popuppesan').show().html(r);
           }
    });


});

   });

</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })

</script>

<script type="text/javascript"> 
$(document).ready(function() { 
$("#provinsi").append('<option value="">Pilih</option>'); 
$("#kabupaten").html(''); 
$("#kecamatan").html(''); 
$("#kelurahan").html(''); 
$("#kabupaten").append('<option value="">Pilih</option>'); 
$("#kecamatan").append('<option value="">Pilih</option>'); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
url = 'function/get_provinsi.php'; 
$.ajax({ url: url, 
type: 'GET', 
dataType: 'json', 
success: function(result) { 
for (var i = 0; i < result.length; i++) 
$("#provinsi").append('<option value="' + result[i].id_prov + '">' + result[i].nama + '</option>'); 
} 
}); 
}); 
$("#provinsi").change(function(){ 
var id_prov = $("#provinsi").val(); 
var url = 'function/get_kabupaten.php?id_prov=' + id_prov; 
$("#kabupaten").html(''); $("#kecamatan").html(''); 
$("#kelurahan").html(''); $("#kabupaten").append('<option value="">Pilih</option>'); 
$("#kecamatan").append('<option value="">Pilih</option>'); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kabupaten").append('<option value="'+ result[i].id_kab +'">' + result[i].nama + '</option>'); 
} 
});  
}); 
$("#kabupaten").change(function(){ 
var id_kab = $("#kabupaten").val(); 
var url = 'function/get_kecamatan.php?id_kab=' + id_kab; 
$("#kecamatan").html(''); $("#kelurahan").html(''); 
$("#kecamatan").append('<option value="">Pilih</option>'); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kecamatan").append('<option value="'+ result[i].id_kec +'">' + result[i].nama + '</option>'); 
} 
});  
}); 
$("#kecamatan").change(function(){ 
var id_kec = $("#kecamatan").val(); 
var url = 'function/get_kelurahan.php?id_kec=' + id_kec; $("#kelurahan").html(''); 
$("#kelurahan").append('<option value="">Pilih</option>'); 
$.ajax({ url : url, 
type: 'GET', 
dataType : 'json', 
success : function(result){ 
for(var i = 0; i < result.length; i++) 
$("#kelurahan").append('<option value="'+ result[i].id_kel +'">' + result[i].nama + '</option>'); 
} 
});  
}); 
</script>
</html>
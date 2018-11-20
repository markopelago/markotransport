<?php
include 'function/db.php';
session_start();
if($_SESSION['id']==FALSE){
	  header('Location:login/index.php');

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Transporter Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->

<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script type="text/javascript">
function add_row()
{
 $rowno=$("#tabel_barang tr").length;
 $rowno=$rowno+1;
 $("#tabel_barang tr:last").after("<tr id='row"+$rowno+"'><td><label> Kota Asal</label> </td> <td>:</td><td><input type='text' class='form-control1' name='asal[]' placeholder='PILIH KOTA TUJUAN' list='cityname'></td><td><label> Kota Tujuan</label> </td> <td>:</td><td><input type='text' class='form-control1' name='tujuan[]' placeholder='PILIH KOTA TUJUAN' list='cityname'></td></td><td><label> Harga</label> </td> <td>:</td><td><input class='form-control1' type='text' name='harga[]' placeholder='Harga'></td><td><input type='button' value='X' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}

</script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<li>
							<a href="index.php"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
						<li>
							<a href="index.php?page=kendaraan"><i class="fa fa-home nav_icon"></i>Data Kendaraan</a>
						</li>
						<li>
							<a href="index.php?page=rute"><i class="fa fa-home nav_icon"></i>Data Rute</a>
						</li>
						<li>
							<a href="index.php?page=history"><i class="fa fa-home nav_icon"></i>History layanan <?php $idtrp=$_SESSION['id_transporter']; $cnt=mysqli_num_rows(mysqli_query($db,"SELECT * FROM data_pemesanan where transporter_id=$idtrp AND status NOT IN ('Delivered','Rejected')")); ?> <span class="badge"><?php echo $cnt; ?></span></a>
						</li>
					</ul></nav>	
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="index.html">
						<h1>NOVUS</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->
			
			</div>
			<div class="header-right">
				<div class="profile_details_left"><!--notifications of menu start -->
											<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/a.png" alt=""> </span> 
									<div class="user-name">
										<p><?php echo $_SESSION['name']; ?></p>
										<span><?php echo $_SESSION['email'] ?></span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
								<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
								<li> <a href="function/usersession.php?act=logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->

		<div id="page-wrapper">
			<div class="main-page">
		<?php 
$page=$_GET['page'];
if($page=='kendaraan'){
include 'kendaraan.php';
}elseif($page=='tambahrute'){
include 'addrute.php';
}elseif($page=='rute'){
include 'rute.php';
}elseif($page=='editrute'){
include 'editrute.php';
}elseif($page=='history'){
include 'history.php';
}else{
		?>				
<?php echo "SELAMAT DATANG DI DASHBOARD, ".$_SESSION['name'];  ?>
		<?php } ?>
	
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2016 Novus Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>

	
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
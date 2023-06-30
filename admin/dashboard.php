<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>BBDMS | Admin Dashboard</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Administrator Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$query=mysqli_query($con,"SELECT id from tblbloodgroup");                       
$bg = mysqli_num_rows($query);
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bg);?></div>
													<div class="stat-panel-title text-uppercase">Blood Groups</div>
												</div>
											</div>
											<a href="manage-bloodgroup.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
<?php 
$query1=mysqli_query($con,"SELECT id from tblblooddonors");                       
$regbd = mysqli_num_rows($query1);
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">Registered Blood Donors</div>
												</div>
											</div>
											<a href="donor-list.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php 
$totalBloodVolume = 0;
$query6=mysqli_query($con,"SELECT * from tblblooddonated");                       
while ($row=mysqli_fetch_array($query6)) 
{ 
	$totalBloodVolume = $totalBloodVolume + $row['bloodVolume'];
}
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($totalBloodVolume);?> ml</div>
													<div class="stat-panel-title text-uppercase">Total Volume of All Blood Donated</div>
												</div>
											</div>
											<a href="manage-donordonation.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
							
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
<?php 
$query11=mysqli_query($con,"SELECT * from tblcontactus");                       
$regbdd = mysqli_num_rows($query11);
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbdd);?></div>
													<div class="stat-panel-title text-uppercase">Messages</div>
												</div>
											</div>
											<a href="manage-conactus.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

							<div class="col-md-12">
								<div class="row">
								<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
												<?php 
												
$query9=mysqli_query($con,"SELECT * from tblbloodrequesters");    
$reslt = mysqli_num_rows($query9);

?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($reslt);?></div>
													<div class="stat-panel-title text-uppercase">Blood Requesters</div>
												</div>
											</div>
											<a href="manage-bloodrequesters.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>	

									<div class="col-md-3">
										<div class="panel panel-default">
										<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
												<?php 
												$totalUnitBlood = 0;
$query9=mysqli_query($con,"SELECT * from tblbloodrequesters where is_approved='1'");    
while ($roww=mysqli_fetch_array($query9)) 
{ 
	$totalUnitBlood = $totalUnitBlood + $roww['unit_blood'];
}
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($totalUnitBlood);?> ml</div>
													<div class="stat-panel-title text-uppercase">Total voulme of Blood requested</div>
												</div>
											</div>
											<a href="manage-bloodrequesters.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>	
									
									</div>
							</div>


								</div>
							</div>
						</div>
					</div>
				</div>

			










			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>
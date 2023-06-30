<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


if(isset($_REQUEST['approve']))
{
	$aeid=intval($_GET['approve']);
	$status=1;
	$dateCreated = date("Y-m-d h:m:s");

	$qquery=mysqli_query($con,"SELECT * from tblbloodrequesters where id='$aeid'");
	if($qquery == True){
		$rw=mysqli_fetch_array($qquery);
		$bloodGroup = $rw['blood_group'];
		$unitOfBlood = $rw['unit_blood'];

		$retss=mysqli_query($con,"SELECT * from tblbloodgroup where BloodGroup = '$bloodGroup'");
		if($retss == True){

			$roww=mysqli_fetch_array($retss);
			$remBloodVolume = $roww['BloodVolume'];
			if($remBloodVolume < $unitOfBlood){
				$error="There is no sufficient blood for this blood group requested for!";
			}
			else{

				$query=mysqli_query($con,"update tblbloodrequesters set is_approved='$status', date_approved='$dateCreated' where id='$aeid'");
				if($query == True) {
			
					$rets=mysqli_query($con,"SELECT * from tblbloodrequesters where id='$aeid'");
					if($rets == True){
						$rows=mysqli_fetch_array($rets);
						$bloodGroup = $rows['blood_group'];
						$unitOfBlood = $rows['unit_blood'];
			
						$ret=mysqli_query($con,"SELECT * from tblbloodgroup where BloodGroup = '$bloodGroup'");
						if($ret == True){
			
							$row=mysqli_fetch_array($ret);
							$remBloodVolume = $row['BloodVolume'];
							$newBloodVolume = $remBloodVolume - $unitOfBlood;
			
							$querys=mysqli_query($con,"update tblbloodgroup set BloodVolume='$newBloodVolume' where BloodGroup='$bloodGroup'");
							if($querys == True) {
								$que = mysqli_query($con,"insert into tblbloodrequests(requesterId,bloodVolume,bloodGroup,DateCreated) value('$aeid','$unitOfBlood','$bloodGroup','$dateCreated')");
								if($que == True)
								{
									echo "<script type='text/javascript'> document.location = 'manage-bloodrequesters.php'; </script>";
									$msg="Record approved and taken successfully";
								}
								else 
								{
									$error="Something went wrong. Please try again";
								}
							}
							else{
								$error="Something went wrong. Please try again";
							}
						}
						else{
							$error="Something went wrong. Please try again";
						}
					}
					else{
						$error="Something went wrong. Please try again";
					}
				}
				else{
					$error="Something went wrong. Please try again";
				}
			}
		}
		else{
			$error="Something went wrong. Please try again";
		}
	}
	else{
		$error="Something went wrong. Please try again";
	}











	









}
if(isset($_REQUEST['decline']))
{
	$did=intval($_GET['decline']);
	$status=2;
	$dateCreated = date("Y-m-d h:m:s");

	$query=mysqli_query($con,"update tblbloodrequesters set is_approved='$status', date_approved='$dateCreated' where id='$did'");
	if($query == True) {
		echo "<script type='text/javascript'> document.location = 'manage-bloodrequesters.php'; </script>";
		$msg="Request declined successfully!";
	}
	else{
		$error="Something went wrong. Please try again";
	}
}
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
	
	<title>BBDMS | Blood Requesters List  </title>

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
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
<script language="javascript">
function isNumberKey(evt)
      {
         
        var charCode = (evt.which) ? evt.which : event.keyCode
                
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
           return false;

         return true;
      }
      </script>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Blood Requesters List</h2>

						<!-- Zero Configuration Table -->
						
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<a href="download-blood-req-records.php" class="btn btn-success" style="font-size:20px;">Download blood requesters list</a><br><br>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
										<th>Patient Name</th>
											<th>Gender</th>
											<th>Genotype</th>
											<th>Blood Group</th>
											<th>Unit of Blood</th>
											<th>Hosp Name</th>
											<th>Hosp Email</th>
											<th>Hosp Contact Person</th>
											<th>Hosp Contact No</th>
											<th>Hosp Address</th>
											<th>Reason</th>
											<th>Date Req </th>
											<th>Date Approved </th>
											<th>Approval/Status </th>
											<th>Decline </th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>Patient Name</th>
											<th>Gender</th>
											<th>Genotype</th>
											<th>Blood Group</th>
											<th>Unit of Blood</th>
											<th>Hosp Name</th>
											<th>Hosp Email</th>
											<th>Hosp Contact Person</th>
											<th>Hosp Contact No</th>
											<th>Hosp Address</th>
											<th>Reason</th>
											<th>Date Req </th>
											<th>Date Approved </th>
											<th>Approval/Status </th>
											<th>Decline </th>
										</tr>
									</tfoot>
									<tbody>

<?php 
$cnt = 1;
$ret=mysqli_query($con,"SELECT * from tblbloodrequesters");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 
	
	?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['firstName']." ".$row['lastName']);?></td>
											<td><?php echo htmlentities($row['gender']);?></td>
											<td><?php echo htmlentities($row['genoType']);?></td>
											<td><?php echo htmlentities($row['blood_group']);?></td>
											<td><?php echo htmlentities($row['unit_blood']);?></td>
											<td><?php echo htmlentities($row['hosp_name']);?></td>
											<td><?php echo htmlentities($row['hosp_email']);?></td>
											<td><?php echo htmlentities($row['hosp_contact_person']);?></td>
											<td><?php echo htmlentities($row['hosp_contact_no']);?></td>
											<td><?php echo htmlentities($row['hosp_address']);?></td>
											<td><?php echo htmlentities($row['request_reason']);?></td>
											<td><?php echo htmlentities($row['date_created']);?></td>
											<td><?php echo htmlentities($row['date_approved']);?></td>
										
										
										<td>
<?php if($row['is_approved']==0)
{?>
<a href="manage-bloodrequesters.php?approve=<?php echo htmlentities($row['id']);?>" class="btn btn-success" onclick="return confirm('Do you really want to approve this request')"><i class="fa fa-check"></i>&nbsp;Approve</a> 
<?php } else if($row['is_approved']==1){?>

<a href="#" class="btn btn-success" >Approved</a>

<?php }else {?>

<a href="#" class="btn btn-danger" >Declined</a>

<?php } ?>
</td>
<td>
<?php if($row['is_approved']==0)
{?>
<a href="manage-bloodrequesters.php?decline=<?php echo htmlentities($row['id']);?>" class="btn btn-danger" onclick="return confirm('Do you really want to decline this request')"> <i class="fa fa-close"></i>&nbsp;Decline</a>
<?php}?>
</td>
										</tr>
										<?php $cnt=$cnt+1; }}} ?>
									</tbody>
								</table>
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
</body>
</html>
<?php } ?>

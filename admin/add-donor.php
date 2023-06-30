<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$mobile=$_POST['mobileno'];
	$email=$_POST['emailid'];
	$genoType = $_POST['genoType'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$maritalStatus = $_POST['maritalStatus'];
	$blodgroup=$_POST['bloodgroup'];
	$address=$_POST['address'];
	$status=1;
	$dateCreated = date("Y-m-d h:m:s");
	
	$ret=mysqli_query($con,"SELECT * from tblblooddonors where EmailId = '$email'");
	if(mysqli_num_rows($ret) > 0 )
	{
		$error="This Email Address Already Exist!";
	}
	else{
		$query = mysqli_query($con,"insert into tblblooddonors(FirstName,LastName,MobileNumber,EmailId,Gender,Age,BloodGroup,MaritalStatus,Address,Genotype,Status,DateCreated) 
		value('$firstName','$lastName','$mobile','$email','$gender','$age','$blodgroup','$maritalStatus','$address','$genoType','$status','$dateCreated')");
		if($query == True)
		{
		$msg="Your info submitted successfully";
		}
		else 
		{
		$error="Something went wrong. Please try again";
		}
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
	
	<title>BBDMS| Admin Add Donor</title>

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
					
						<h2 class="page-title">Add New Blood Donor</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add New Blood Donor</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">First Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="firstName" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Last Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="lastName"  maxlength="10" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Email Address <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="email" name="emailid" class="form-control">
</div>
<label class="col-sm-2 control-label">Age<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="age" onKeyPress="return isNumberKey(event)" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender <span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="gender" class="form-control" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
<label class="col-sm-2 control-label">Blood Group<span style="color:red">*</span></label>
<div class="col-sm-4">


<select name="bloodgroup" class="form-control" required>
<option value="">Select</option>
<?php 
$ret=mysqli_query($con,"SELECT * from tblbloodgroup");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 
?>  
<option value="<?php echo $row['BloodGroup'];?>"><?php echo $row['BloodGroup'];?></option>
<?php }} ?>
</select>

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Phone No <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="mobileno" required onKeyPress="return isNumberKey(event)" class="form-control">
</div>
<label class="col-sm-2 control-label">Genotype<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="genoType" class="form-control" required>
<option value="">Select</option>
<option value="AA">AA</option>
<option value="AS">AS</option>
<option value="SS">SS</option>
</select>
</div>
</div>
											
<div class="form-group">
<label class="col-sm-2 control-label">Marital Status </label>
<div class="col-sm-4">
<select name="maritalStatus" class="form-control" required>
<option value="">Select</option>
<option value="Single">Single</option>
<option value="Married">Married</option>
<option value="Divorced">Divorced</option>
</select>
</div>
<label class="col-sm-2 control-label">Address<span style="color:red">*</span></label>
<div class="col-sm-4">
<textarea name="address" class="form-control" ></textarea>
</div>
</div>




											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>

										</form>
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
</body>
</html>
<?php } ?>
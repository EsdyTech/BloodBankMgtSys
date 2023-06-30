<?php
//session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
  {
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
    $gender=$_POST['gender'];
    $bloodgroup=$_POST['bloodgroup'];
    $genoType = $_POST['genoType'];
    $unitOfBlood = $_POST['unitOfBlood'];
    $hospName = $_POST['hospName'];
    $hospContactPerson = $_POST['hospContactPerson'];
    $hospContactNo = $_POST['hospContactNo'];
    $hospAddress = $_POST['hospAddress'];
	$hospEmail=$_POST['hospEmail'];
	$reqReason=$_POST['reqReason'];
	
	$status=1;
	$dateCreated = date("Y-m-d h:m:s");
	
		$query = mysqli_query($con,"insert into tblbloodrequesters(firstName,lastName,gender,blood_group,genoType,unit_blood,hosp_name,hosp_contact_person,hosp_address,hosp_email,hosp_contact_no,request_reason,is_approved,date_approved,date_created) 
		value('$firstName','$lastName','$gender','$bloodgroup','$genoType','$unitOfBlood','$hospName','$hospContactPerson','$hospAddress','$hospEmail','$hospContactNo','$reqReason','0','','$dateCreated')");
		if($query == True)
		{
		$msg="Your information was captured and submitted successfully";
		}
		else 
		{
		$error="Something went wrong. Please try again";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blood Bank & Donor Management System | Request for Blood</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
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

    <!-- Page Content -->
    <div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Request for Blood</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Request for Blood</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" method="post">
            <b>PATIENT INFORMATION</b> <br><br>
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Patient FirstName<span style="color:red">*</span></div>
<div><input type="text" name="firstName" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Patient LastName<span style="color:red">*</span></div>
<div><input type="text" name="lastName" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Genotype <span style="color:red">*</span></div>
<select name="genoType" class="form-control" required>
<option value="">Select</option>
<option value="AA">AA</option>
<option value="AS">AS</option>
<option value="SS">SS</option>
</select>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Gender<span style="color:red">*</span></div>
<div><select name="gender" class="form-control" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>


<div class="col-lg-4 mb-4">
<div class="font-italic">Blood Group<span style="color:red">*</span> </div>
<div><select name="bloodgroup" class="form-control" required>
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

<div class="col-lg-4 mb-4">
<div class="font-italic">Unit of Blood<span style="color:red">*</span></div>
<div><input type="text" name="unitOfBlood" onKeyPress="return isNumberKey(event)" class="form-control" required></div>
</div>
</div>

<b>HOSPITAL INFORMATION</b><br><br>
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Hospital EmailAddress<span style="color:red">*</span></div>
<div><input type="email" name="hospEmail" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Hospital Contact Person Name<span style="color:red">*</span></div>
<div><input type="text" name="hospContactPerson" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Hospital Contact No</div>
<div><input type="text" name="hospContactNo" onKeyPress="return isNumberKey(event)" class="form-control" required></div>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Hospital Name<span style="color:red">*</span></div>
<div><input type="text" name="hospName" class="form-control" required></div>
</div>

<div class="col-lg-8 mb-4">
<div class="font-italic">Hospital Address<span style="color:red">*</span></div>
<div><textarea class="form-control" name="hospAddress" required> </textarea></div>
</div>
</div>


<div class="row">
<!-- <div class="col-lg-4 mb-4">
<div class="font-italic">Address</div>
<div><textarea class="form-control" name="address"></textarea></div>
</div> -->

<div class="col-lg-12 mb-4">
<div class="font-italic">Reason for blood Request<span style="color:red">*</span></div>
<div><textarea class="form-control" name="reqReason" required> </textarea></div>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>



</div>



        <!-- /.row -->
</form>   
        <!-- /.row -->
</div>
  <?php include('includes/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>

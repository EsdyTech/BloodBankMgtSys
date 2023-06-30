<?php
error_reporting(0);
include('includes/config.php');
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


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blood Bank & Donor Management System | Become A Donor</title>
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


</head>

<body>

<?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Become a Donor</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Become a Donor</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">FirstName<span style="color:red">*</span></div>
<div><input type="text" name="firstName" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">LastName<span style="color:red">*</span></div>
<div><input type="text" name="lastName" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Email Address</div>
<div><input type="email" name="emailid" class="form-control"></div>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">GenoType<span style="color:red">*</span></div>
<div><select name="genoType" class="form-control" required>
<option value="">Select</option>
<option value="AA">AA</option>
<option value="AS">AS</option>
<option value="SS">SS</option>
</select>
</div></div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Mobile Number<span style="color:red">*</span></div>
<div><input type="text" name="mobileno" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">Marital Status</div>
<div><select name="maritalStatus" class="form-control" required>
<option value="">Select</option>
<option value="Single">Single</option>
<option value="Married">Married</option>
<option value="Divorced">Divorced</option>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Age<span style="color:red">*</span></div>
<div><input type="text" name="age" class="form-control" required></div>
</div>


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
</div>


<div class="row">
<!-- <div class="col-lg-4 mb-4">
<div class="font-italic">Address</div>
<div><textarea class="form-control" name="address"></textarea></div>
</div> -->

<div class="col-lg-12 mb-4">
<div class="font-italic">Home Address<span style="color:red">*</span></div>
<div><textarea class="form-control" name="address" required> </textarea></div>
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

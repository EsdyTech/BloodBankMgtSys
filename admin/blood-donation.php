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
$BloodGroup=$_POST['BloodGroup'];
$donorId=$_POST['donorId'];
$bloodVolume=$_POST['bloodVolume'];
$dateCreated = date("Y-m-d h:m:s");

  $query = mysqli_query($con,"insert into tblblooddonated(donorId,bloodVolume,bloodGroup,dateCreated) value('$donorId','$bloodVolume','$BloodGroup','$dateCreated')");
    if($query == True)
    {
        $ret=mysqli_query($con,"SELECT * from tblbloodgroup where BloodGroup = '$BloodGroup'");
        if($ret == True){

            $row=mysqli_fetch_array($ret);
            $newBloodVolume = 0;
            $remBloodVolume = $row['BloodVolume'];

            $newBloodVolume = $bloodVolume + $remBloodVolume;

            $querys=mysqli_query($con,"update tblbloodgroup set BloodVolume='$newBloodVolume' where BloodGroup='$BloodGroup'");
            if($querys == True) {

                $msg="Record Taken Successfully";

            }
            else{
                $error="Something went wrong. Please try again";
            }
        }
        else{
            $error="Something went wrong. Please try again";
        }

    }
    else 
    {
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
	
	<title>BBDMS| Admin Add Blood Donations</title>

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

      <script>
function showBloodGroup(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCallBloodGroup.php?did="+str,true);
        xmlhttp.send();
    }
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
					
						<h2 class="page-title">Blood Donations</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">


<div class="form-group">
<label class="col-sm-2 control-label">Select Donor<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="donorId" class="form-control" onchange="showBloodGroup(this.value)" required>
<option value="">Select</option>
<?php 
$ret=mysqli_query($con,"SELECT * from tblblooddonors");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 
?>  
<option value="<?php echo $row['Id'];?>"><?php echo $row['FirstName']." ".$row['LastName'];?></option>
<?php }} ?>
</select>
<?php echo"<div id='txtHint'></div>";?>      
</div>
<label class="col-sm-2 control-label">Blood Volume<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="bloodVolume" onKeyPress="return isNumberKey(event)" class="form-control" required>
</div>
</div>



											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save</button>
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
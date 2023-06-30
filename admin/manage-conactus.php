<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status=1;
$query=mysqli_query($con,"update tblcontactusquery set status='$status' where id='$eid'");
if($query == True) {
$msg="Successfully Updated";
}
	}

if(isset($_REQUEST['del']))
	{
$did=intval($_GET['del']);
$que = mysqli_query($con,"DELETE FROM tblcontactusquery WHERE id='$did'");
if($query == True) {
$msg="Record deleted Successfully ";
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

    <title>BBDMS |Admin Manage Queries </title>

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
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
    </style>

</head>

<body>
    <?php include('includes/header.php');?>

    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Manage Messages</h2>

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Messages</div>
                            <div class="panel-body">
                                <?php if($error){?><div class="errorWrap">
                                    <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                                </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email Address</th>
                                            <th>Contact No</th>
                                            <th>Message</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email Address</th>
                                            <th>Contact No</th>
                                            <th>Message</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
									
									$cnt=1;
$ret=mysqli_query($con,"SELECT * from tblcontactus");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{
			?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['FullName']);?></td>
                                            <td><?php echo htmlentities($row['EmailAddress']);?></td>
                                            <td><?php echo htmlentities($row['ContactNo']);?></td>
                                            <td><?php echo htmlentities($row['Message']);?></td>
                                            <td><?php echo htmlentities($row['DateCreated']);?></td>
                                            <td>
                                                <a href="manage-conactus.php?del=<?php echo htmlentities($row['Id']);?>"
                                                  class="btn btn-danger"  onclick="return confirm('Do you really want to Delete')">Delete</a>
                                            </td>
                                            </td>
                                        </tr>
                                        <?php $cnt=$cnt+1; }} ?>

                                    </tbody>
                                </table>



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
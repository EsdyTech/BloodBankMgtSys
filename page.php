<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blood Bank & Donor Management System | Become A Donor</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Temporary navbar container fix -->
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

</head>

<body>


<?php include('includes/header.php');?>
    <!-- Page Content -->
    <div class="container">
                    <?php 
$pagetype=$_GET['type']; 
$ret=mysqli_query($con,"SELECT type,detail,PageName from tblpages where type = '$pagetype'");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{    
    
    
    ?>
        <h1 class="mt-4 mb-3"><?php   echo $row['PageName']; ?> </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active"><?php   echo $row['PageName'];  ?></li>
        </ol>

        <p><?php   echo $row['detail'];; ?> </p>

    </div>
    <!-- /.container -->
    <?php } } ?>

    <!-- Footer -->
   <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>

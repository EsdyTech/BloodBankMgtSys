<?php
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

    <title>Blood Bank & Donor Management System</title>
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
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>

</head>

<body>

    <!-- Navigation -->
<?php include('includes/header.php');?>
<?php include('includes/slider.php');?>
   
    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">Welcome to Blood Bank & Donor Management System</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- <div class="card"> -->
                    <!-- <h4 class="card-header">The need for blood and its health benefits</h4> -->
                   
                        <p class="card-text" style="padding-left:2%">
                        The reason to donate is simple…it helps save lives. In fact, every two seconds of every day, someone needs blood. Since blood cannot be manufactured outside the body and has a limited shelf life, the supply must constantly be replenished by generous blood donors.</p>
                        <p class="card-text" style="padding-left:2%">Blood donations help to reduce harmful iron stores. According to the Mayo Clinic, one in every 200 people in the U.S. is affected by a condition called hemochromatosis that causes an iron overload. ...
Preserve cardiovascular health. ...
Reduce the risk cancer. ...
Burn calories. ...
Free blood analysis. ...
Give you a sense of pride.</p>
                <!-- </div> -->
            </div>
            <!-- <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Blood Tips</h4>
                   
                        <p class="card-text" style="padding-left:2%">Before your blood donation:

Get plenty of sleep the night before you plan to donate.
Eat a healthy meal before your donation.
Avoid fatty foods, such as hamburgers, french fries or ice cream before donating. Tests for infections done on all donated blood can be affected by fats that appear in your blood for several hours after eating fatty foods.
Drink an extra 16 ounces (473 milliliters) of water and other fluids before the donation.
If you are a platelet donor, remember that you must not take aspirin for two days prior to donating. Otherwise, you can take your normal medications as prescribed.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Health benefits</h4>
                   
                       
                </div>
            </div> -->
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->

       
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2>BLOOD GROUPS</h2>
          <p>  Blood group of any human being will mainly fall in any one of the following groups.</p>
                <ul>
                
                
<li>A positive or A negative</li>
<li>B positive or B negative</li>
<li>O positive or O negative</li>
<li>AB positive or AB negative.</li>
                </ul>
                <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="images/blood-donor (1).jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
                <p>
The most common blood type is O, followed by type A.

Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="become-donar.php">Become a Donor</a>
                <!-- <a class="btn btn-lg btn-secondary btn-block" href="become-donar.php">Requester</a> -->
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>

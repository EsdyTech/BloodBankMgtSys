<?php

include('includes/config.php');

    $did = intval($_GET['did']);

        $queryss=mysqli_query($con,"select * from tblblooddonors where Id=".$did."");                        
        $countt = mysqli_num_rows($queryss);
      
        if($queryss){               
          $row = mysqli_fetch_array($queryss);
            echo '<br><font color="green"><b>Selected Donor Details:';
            echo '<br><font color="red"><b>Blood Group: '.$row['BloodGroup'];
            echo '<br><font color="red"><b>Genotype: '.$row['GenoType'];
            echo '<input type="hidden" name="BloodGroup" value="'.$row['BloodGroup'].'" class="form-control">';
        }

?>


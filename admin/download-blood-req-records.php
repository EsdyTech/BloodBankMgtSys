<?php 
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
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
		</tr>
	</thead>
<?php 
$filename="Blood Requesters list";

$cnt=1;			
$ret=mysqli_query($con,"SELECT * from tblbloodrequesters");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$FullName= $row['firstName'].' '.$row['lastName'].'</td> 
<td>'.	$MobileNumber= $row['gender'].'</td> 
<td>'.$EmailId= $row['genoType'].'</td> 
<td>'.$Gender= $row['blood_group'].'</td> 
<td>'.$Age= $row['unit_blood'].'</td> 
 <td>'.$BloodGroup=$row['hosp_name'].'</td>	
  <td>'.$Address=$row['hosp_email'].'</td>	 
  <td>'.$Address=$row['hosp_contact_person'].'</td>	 
  <td>'.$Address=$row['hosp_contact_no'].'</td>	 
  <td>'.$Address=$row['hosp_address'].'</td>	 
  <td>'.$Address=$row['request_reason'].'</td>	 
   <td>'.$Address=$row['date_created'].'</td>	
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php } ?>
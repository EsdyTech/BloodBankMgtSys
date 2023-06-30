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
			<th>FullName</th>
			<th>Mobile No</th>
			<th>Email</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Blood Group</th>
			<th>Genotype</th>
			<th>Address </th>
			<th>Date Created</th>
		</tr>
	</thead>
<?php 
$filename="Donor list";

$cnt=1;			
$ret=mysqli_query($con,"SELECT * from tblblooddonors");
if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$FullName= $row['FirstName'].' '.$row['LastName'].'</td> 
<td>'.	$MobileNumber= $row['MobileNumber'].'</td> 
<td>'.$EmailId= $row['EmailId'].'</td> 
<td>'.$Gender= $row['Gender'].'</td> 
<td>'.$Age= $row['Age'].'</td> 
 <td>'.$BloodGroup=$row['BloodGroup'].'</td>	
  <td>'.$Address=$row['GenoType'].'</td>	 
   <td>'.$Address=$row['Address'].'</td>	
  <td>'.$DateCreated=$row['DateCreated'].'</td>	 					
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
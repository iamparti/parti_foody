<?php
require('config.php');
$sql="select * from user";
$res=mysqli_query($conn,$sql);
$html='<table><tr>
<td>id</td>
<td>First Name</td>
<td>Last Name</td>
<td>Dob</td>
<td>Gender</td>
<td>Address</td>
<td>Mobile</td>
<td>State</td>
<td>Card User Name</td>
<td>Card Number</td>
<td>Card Valid Upto</td>
<td>Cvv</td>
<td>Date</td>
<td>Status</td>

</tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['id'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td> <td>'.$row['dob'].'</td>
	<td>'.$row['gender'].'</td>
	<td>'.$row['address'].'</td>
	<td>'.$row['mobile'].'</td>
	<td>'.$row['state'].'</td>
	<td>'.$row['card_username'].'</td>
	<td>'.$row['card_number'].'</td>
	<td>'.$row['card_valid'].'</td>
	<td>'.$row['cvv'].'</td>
	<td>'.$row['time'].'</td>
	<td>'.$row['status'].'</td>
	</tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');
echo $html;
?>
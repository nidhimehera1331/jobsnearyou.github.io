<?php
include('connect.php');
$query="select * from register";
$res=mysqli_query($con,$query);//data
while($row=mysqli_fetch_array($res))
{

	/*echo $row['fname']."<br/>";
	echo $row['email_id']."<br/>";
	echo $row['phone']."<br/>";*/
	echo $row['fname']." ".$row['email']." ". $row['phone']."<br/>";
}
?>
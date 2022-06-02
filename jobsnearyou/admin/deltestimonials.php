<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from testimonials where test_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:managetestimonials.php");
}
else
{
	echo "Error while deleting data";
}

?>
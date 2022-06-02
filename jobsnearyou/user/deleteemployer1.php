<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from jobs where job_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:empjobs.php");
}
else
{
	echo "Error while deleting data";
}

?>
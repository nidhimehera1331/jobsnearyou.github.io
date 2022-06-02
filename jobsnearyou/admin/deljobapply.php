<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from jobapply where apply_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:managejobapply.php");
}
else
{
	echo "Error while deleting data";
}

?>
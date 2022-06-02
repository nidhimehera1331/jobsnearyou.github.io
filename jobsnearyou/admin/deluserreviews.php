<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from userreviews where review_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:manageuserreviews.php");
}
else
{
	echo "Error while deleting data";
}

?>
<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from compreviews where creview_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:managecompreviews.php");
}
else
{
	echo "Error while deleting data";
}

?>
<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from users where reg_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:manageusers.php");
}
else
{
	echo "Error while deleting data";
}

?>
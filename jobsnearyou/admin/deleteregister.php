<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from register where reg_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:manageregisters.php");
}
else
{
	echo "Error while deleting data";
}

?>
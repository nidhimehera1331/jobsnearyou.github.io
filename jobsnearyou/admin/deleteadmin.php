<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from admin where admin_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:manageadmin.php");
}
else
{
	echo "Error while deleting data";
}

?>
<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from companies where comp_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:managecompany.php");
}
else
{
	echo "Error while deleting data";
}

?>
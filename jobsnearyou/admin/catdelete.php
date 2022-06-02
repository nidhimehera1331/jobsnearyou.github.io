<?php

include('connect.php');
$id=$_GET['id'];
$query="delete from category where cat_id=$id";
$res=mysqli_query($con,$query);
if($res)
{
	header("location:managecategory.php");
}
else
{
	echo "Error while deleting data";
}

?>
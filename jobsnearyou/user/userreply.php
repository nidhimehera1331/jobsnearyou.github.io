<?php
ob_start();
 include('uheader.php');

session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
{
	header("location:login.php");
}
if(isset($_POST['btnadd'])) 
{

	$msg=$_POST['txtmsg'];
	$sub=$_POST['txtsub'];
	$msgr=$_GET['id'];
	$uid=$_SESSION['id'];
	
	$query_upd="insert into emp_msg(msg_sender,msg_receiver,subject,msg) values($uid,$msgr,'$sub','$msg')";
	
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:usermsg.php");
	}
	else
	{
		echo "Error while adding data".mysqli_error($con);
	}
}

 ?>

<div class="row">
<div class="col-lg-4 mx-auto shadow p-4 bg-light mt-3">
	<div class="review-submission">
	<h3 class="tab-title text-uppercase mb-3 text-primary text-center"> Messages</h3>
	<!-- Rate -->
	<div class="rate">
	<div class="starrr"></div>
	</div>
	<div class="review-submit">
	<form method="post" class="row">
		
		<div class="col-lg-12">
						
									
								
								
					<input type="text" class="form-control"  placeholder="subject" name="txtsub"><br/>	
		<div class="col-12 mt-4">
			<textarea name="txtmsg" id="message" rows="6" class="form-control" placeholder="message"></textarea>
		</div>
		<div class="col-12 d-grid">
			<button type="submit" class="btn btn-main btn-primary mt-4" name="btnadd">Sumbit</button>
	<?php
	if(!empty($msg)&& $msg!="")
	{
	echo "<p class='alert alert-danger mt-3'>$msg</p>";
	}
	?>
		</div>
	</form>
	</div>
	</div>
</div>
</div>
<?php include('footer.php'); 
ob_flush();
?>

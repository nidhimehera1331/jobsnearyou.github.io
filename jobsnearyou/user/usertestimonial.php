<?php
ob_start();
 include('header.php');

session_start();
if(!isset($_SESSION['cid']) && empty($_SESSION['cid'])) 
{
	header("location:login.php");
}
if(isset($_POST['btnadd'])) 
{

	$test=$_POST['testimonial'];
	
	$empid=$_GET['id'];
	$cid=$_SESSION['cid'];
	
	$query_upd="insert into testimonials(emp_id,testimonial,postedby) values($empid,'$test',$cid)";
	
	
	$res=mysqli_query($con,$query_upd);
	
}

 ?>

<div class="row">
<div class="col-lg-4 mx-auto shadow p-4 bg-light">
	<div class="review-submission">
	<h3 class="tab-title text-uppercase mb-3 text-primary text-center">Submit your Testimonial</h3>
	<!-- Rate -->
	<div class="rate">
	<div class="starrr"></div>
	</div>
	<div class="review-submit">
	<form method="post" class="row">
		

		<div class="col-12">
			<textarea name="testimonial" id="testimonial" rows="6" class="form-control" placeholder="Testimonial"></textarea>
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

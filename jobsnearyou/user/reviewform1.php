<?php 
ob_start();
include('uheader.php');
$msg="";
session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
{
	header("location:login.php");
}

if(isset($_POST['btnreview']))
{
	

	$rating=$_POST['ddlrating'];
	$difficulty=$_POST['ddldifficulty'];
	$process=$_POST['ddlprocess'];
	$activity=$_POST['ddlactivity'];
	
	$cid=$_POST['ddlcomp'];
	$userid=$_SESSION['id'];
	
	

	$query="insert into compreviews(comp_id,creview_postedby,c_rating,int_difficulty,int_processtime,int_activity) values('$cid','$userid','$rating','$difficulty','$process','$activity')";

	$res=mysqli_query($con,$query);//True/False
	if($res)
	{
		
		header("location:compdetail.php?id=$cid");
	}
	else
	{
		$msg= "Error while posting review.Pls try again later".mysqli_error($con);
	}

}

?>

<div class="row mt-5">
<div class="col-lg-8 shadow-sm p-3 mx-auto">
										<h3 class="tab-title text-capitalize mb-4">Submit your review</h3>
										
										<!-- Rate -->
										<div class="rate">
											<div class="starrr"></div>
										</div>
										<div class="review-submit">
											<form method="post" >
											<select class="form-select"  name="ddlcomp" style="height: 55px;">
							<option selected>Choose Compaines</option>
							<?php
						$queryc="select * from companies";
						$resc=mysqli_query($con,$queryc);
						while($rowc=mysqli_fetch_array($resc))
						{
						?>
							<option value="<?php echo $rowc['comp_id'];   ?>"><?php echo $rowc['comp_name'];   ?></option>
							<?php
						}
						?>
						</select><br/>

											<div class="row">
												<div class="col-lg-6">
													Rate Company<select name="ddlrating" id="name" class="form-select bg-white">
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
</select></div>
<div class="col-lg-6">
<span>Rate Interview Difficulty Level</span>
<select name="ddldifficulty" id="name" class="form-select bg-white">
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
</select>
</div>

</div><br/>
<span>How long did it take from the beginning of the interview process until you received your job offer?</span>
<select name="ddlprocess" id="name" class="form-select bg-white">
	<option selected>Choose</option>
	<option>About a day or two</option>
	<option>About a week</option>
	<option>About two weeks</option>
	<option>About a month</option>
	<option>More than one month</option>
</select><br/>
<span>What kinds of interview activities did you have?</span>
<select name="ddlactivity" id="name" class="form-select bg-white">
	<option selected>Choose</option>
	<option>Phone call/screening</option>
	<option>Written test</option>
	<option>Take-home/sample work</option>
	<option>Problem solving exercises</option>
	<option>Group interview</option>
	<option>On-site interview</option>
	<option>Presentation</option>
	<option>Background check</option>
	<option>Drug test</option>
	<option>They have no interview</option>
	<option>Other</option>
</select>
												<div class="col-12">
													<button type="submit" class="btn  btn-primary mt-3" name="btnreview">Sumbit</button>
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
									
<?php
include('footer.php');
ob_flush();
 ?>									
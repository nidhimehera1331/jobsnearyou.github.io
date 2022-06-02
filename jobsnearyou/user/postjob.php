
<?php
ob_start();
 include('eheader.php'); 
session_start();
if(!isset($_SESSION['eid']) && empty($_SESSION['eid'])) 
{
	header("location:emplogin.php");
}
$msg="";
if(isset($_POST['btnadd'])) 
{
	$postedby=$_SESSION['eid'];
	
	$category=$_POST['txtcategory'];
	

	$job=$_POST['txtjob'];
	$salary=$_POST['txtsalary'];
	$jobtype=$_POST['txtjobtype'];
	
	$joblocation=$_POST['txtjoblocation'];
	$benefits=$_POST['txtbenefits'];
	$desc=$_POST['txtdesc'];
	$schedule=$_POST['txtschedule'];
	$qualification=$_POST['txtqualification'];
	$receive=$_POST['txtreceive'];
	$resume=$_POST['txtresume'];
	$plan=$_POST['txtplan'];
	$exp=$_POST['txtexp'];
	$vac=$_POST['txtvac'];
	$plan=$_POST['txtplan'];
	
	
	
	
	$query_upd="insert into jobs (job_postedby,job_name,salary,job_type,cat_id,job_location,job_benefits,job_schedule,plan_date,job_desc,resume_upload,qualification,receive_application,experience,vacancy) values('$postedby','$job','$salary','$jobtype','$category','$joblocation','$benefits','$schedule','$plan','$desc','$resume','$qualification','$receive','$exp','$vac')";

	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:empjobs.php");
	}
	else
	{
		$msg= "Error while adding data".mysqli_error($con);
	}
}

?>

<div class="container-fluid">
	<div class="row p-5 ">
		<div class="col-lg-7 mx-auto border rounded py-4 px-4 shadow bg-light">
			<div class="p-3 text-center">
				<h2 class="text-primary">Post Job</h2><br/>
				<?php
								if(!empty($msg)&& $msg!="")
								{
									echo "<p class='alert alert-success mt-3'>$msg</p>";
								}
							?>
				<form method="post" enctype="multipart/form-data">
					<fieldset>
					
					
						<select class="form-select bg-white border-0 border-bottom"  name="txtcategory">
							<option selected>Choose Category</option>
							<?php
						$query="select * from category";
						$res=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($res))
						{
						?>
							<option value="<?php echo $row['cat_id'];   ?>"><?php echo $row['cat_name'];   ?></option>
							<?php
						}
						?>
						</select><br/><br/>
				
					
					<div class="row">
					<div class="col-lg-6">
					<input type="text" name="txtjob" placeholder="Job Name" class="border-0 border-bottom form-control"/>
					</div>
					<div class="col-lg-6">
					<input type="text" name="txtqualification" placeholder="Qualification" class="border-0 border-bottom form-control"/>
					</div>
					</div><br/><br/>
					
					
					
				
						<input type="text" name="txtsalary" placeholder="Salary"class="border-0 border-bottom form-control"/><br/><br/>
					
					
					
					<select class="form-select bg-white border-0 border-bottom"  name="txtjobtype">
							<option selected>Job Type</option>
							<option>Full Time</option>
							<option>Part Time</option>
							<option>Regular/Permanent</option>
							<option>Contracrual/Temporary</option>
							<option>Freelance</option>
							<option>Volunteer</option>
							<option>Internship</option>
							<option>Fresher</option>
						</select><br/><br/>
					
						<input type="text" name="txtexp" placeholder="Experience "class="border-0 border-bottom form-control"/><br/><br/>
					
						<div class="row">
					<div class="col-lg-6">
						<select class="form-select bg-white border-0 border-bottom"  name="txtreceive">
							<option selected>Receive Application Through</option>
							<option>Email</option>
							<option>Walk-In</option>
							
							
						</select>
					</div>
					<div class="col-lg-6">
						<input type="text" name="txtjoblocation" placeholder="Job Location"class="border-0 border-bottom form-control"/><br/><br/>
					</div>	
					</div>
						
						
						
						
						
						
					
						<div class="row">
						<div class="col-lg-6">
						<input type="text" name="txtbenefits" placeholder="Job Benefits " class="border-0 border-bottom form-control"/>
						</div>
						<div class="col-lg-6">
						<input type="text" name="txtplan" placeholder="Plan " class="border-0 border-bottom form-control"/>
						</div>
						
						
					</div><br/><br/>
					
						
						<select class="form-select bg-white border-0 border-bottom"  name="txtschedule">
							<option selected>Schedule</option>
							<option>Morning Shift</option>
							<option>Day Shift</option>
							<option>Evening Shift</option>
							<option>Night Shift</option>
							<option>Flexible Shift</option>
							<option>Rotational Shift</option>
						
						</select>
						<br/></br/>
						<select class="form-select bg-white border-0 border-bottom"  name="txtplan">
							<option selected>Plan Date</option>
							<option>Within 5 Days</option>
							<option>Within 10 Days</option>
							<option>Within 15 Days</option>
							<option>Within a  Month</option>
							
						
						</select>
						<br/></br/>
						<select class="form-select bg-white border-0 border-bottom"  name="txtresume">
							<option selected>Resume Upload</option>
							<option>Yes</option>
							<option>No</option>
							
						</select><br/><br/>					
						<input type="text" name="txtvac" placeholder="Vacancy " class="border-0 border-bottom form-control"/><br/><br/>		
						
							<textarea name="txtdesc" rows="6" placeholder="Job Description" class="border-0 border-bottom form-control"></textarea><br/><br/>
						<div class="loggedin-forgot d-inline-flex my-2 mb-4">
								<input type="checkbox" id="registering" class="mt-1">
								<label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
						</div>
						<div class="d-grid">
							<button class="btn btn-primary mt-2 mb-3 d-grid btn-default p-2" name="btnadd">Submit</button>
						</div>
						
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
ob_flush();
 include('footer.php'); ?>


<?php 
ob_start();
include('header.php'); ?> 
<?php
include('connect.php');
$id=$_GET['id'];
$query="select * from jobs where job_id=$id";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	
	
	$salary=$_POST['txtsalary'];
	$jobtype=$_POST['txtjobtype'];

	
	
	$joblocation=$_POST['txtjoblocation'];
	$benefits=$_POST['txtbenefits'];
	$name=$_POST['txtname'];
	$schedule=$_POST['txtschedule'];
	$date=$_POST['txtdate'];
	$desc=$_POST['txtdesc'];
	$resume=$_POST['txtresume'];
	$qual=$_POST['txtqual'];
	$vac=$_POST['txtvac'];
	$qual=$_POST['txtqual'];
	
	
	
	$app=$_POST['txtapp'];
	
	$id=$_GET['id'];
	$query_upd="update jobs set job_name='$name',salary='$salary',job_type='$jobtype',job_location='$joblocation',job_benefits='$benefits',job_schedule='$schedule',plan_date='$date',job_desc='$desc',resume_upload='$resume',qualification='$qual',receive_application='$app',experience='$exp',vacancy='$vac' where job_id=$id";
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:managejobs.php");
	}
	else
	{
		echo "Error while updating data";
	}
}
?>

                    
                       
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Basic Form Elements</h3>
                                   
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Edit Jobs</h5>
                                    <div class="card-body">
                                        <form method="post">
                                             <div class="form-group">
                                                <label for="inputtext">Job Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtname" value="<?php echo $row['job_name']; ?>">
                                               
                                            </div>
											
                                            
                                            
                                            <div class="form-group">
                                                <label for="inputtext">Salary</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtsalary" value="<?php echo $row['salary']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Job Type</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtjobtype" value="<?php echo $row['job_type']; ?>">
                                            </div>
											 
											
											
											
											<div class="form-group">
                                                <label for="inputtext"> Job Location</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtjoblocation" value="<?php echo $row['job_location']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Job Benefits</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtbenefits" value="<?php echo $row['job_benefits']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext"> Job Schedule</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtschedule" value="<?php echo $row['job_schedule']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Plan Date</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtdate" value="<?php echo $row['plan_date']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext"> Job Description</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtdesc" value="<?php echo $row['job_desc']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Resume Upload</label>
                                                <input id="inputtext" type="file"  class="form-control" name="txtresume" value="<?php echo $row['resume_upload']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Qualification</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtqual" value="<?php echo $row['qualification']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Receive Application</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtrecruiters" value="<?php echo $row['receive_application']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Vacancy</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtdetail" value="<?php echo $row['vacancy']; ?>">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputtext">Experience</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtexp" value="<?php echo $row['experience']; ?>">
                                            </div>
                                          <input type="submit" value="Update" name="btnedit" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                      
                        <!-- end basic form  -->
           <?php 
		   ob_flush();
		   include('footer.php'); ?>        
            <!-- ============================================================== -->
           
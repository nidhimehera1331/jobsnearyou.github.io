


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
	
	$qual=$_POST['txtqual'];
	
	$exp=$_POST['txtexp'];
	
	$id=$_GET['id'];
	$query_upd="update jobs set job_name='$name',salary='$salary',job_type='$jobtype',job_location='$joblocation',job_benefits='$benefits',job_schedule='$schedule',qualification='$qual',experience='$exp' where job_id=$id";
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:empjobs.php");
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
                            <div class=" col-md-7 mx-auto mt-5">
                                
                                <div class="card shadow p-3 ">
                                    <h5 class=" mt-4 text-uppercase text-center text-primary text-decoration-underline">Edit Posted Jobs</h5>
                                    <div class="card-body ">
                                        <form method="post">
                                             <div class="form-group">
                                                <label for="inputtext">Job Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtname" value="<?php echo $row['job_name']; ?>">
                                               
                                            </div><br/>
											
                                           
                                           
                                            <div class="form-group">
                                                <label for="inputtext">Salary</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtsalary" value="<?php echo $row['salary']; ?>">
                                            </div><br/>
											<div class="form-group">
                                                <label for="inputtext">Job Type</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtjobtype" value="<?php echo $row['job_type']; ?>">
                                            </div><br/>
											 
											
											
											<div class="form-group">
                                                <label for="inputtext"> Job Location</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtjoblocation" value="<?php echo $row['job_location']; ?>">
                                            </div><br/>
											<div class="form-group">
                                                <label for="inputtext">Job Benefits</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtbenefits" value="<?php echo $row['job_benefits']; ?>">
                                            </div><br/>
											<div class="form-group">
                                                <label for="inputtext"> Job Schedule</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtschedule" value="<?php echo $row['job_schedule']; ?>">
                                            </div>
											<br/>
											
											<div class="form-group">
                                                <label for="inputtext">Qualification</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtqual" value="<?php echo $row['qualification']; ?>">
                                            </div><br/>
											
											
											<div class="form-group">
                                                <label for="inputtext">Experience</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtexp" value="<?php echo $row['experience']; ?>">
                                            </div><br/>
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
           
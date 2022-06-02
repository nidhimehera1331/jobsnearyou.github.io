<?php 
ob_start();
include('header.php');
include('connect.php');
 ?> 
<?php
if(isset($_POST['btnedit']))
{
	
	$title=$_POST['txttitle'];
	
	$postedby=$_POST['txtpostby'];
	$salary=$_POST['txtsalary'];
	$jobtype=$_POST['txtjobtype'];

	$jobpost=$_POST['txtjobpost'];
	$jobcatid=$_POST['txtcatid'];
	$joblocation=$_POST['txtjoblocation'];
	$benefits=$_POST['txtbenefits'];
	$name=$_POST['txtname'];
	$schedule=$_POST['txtschedule'];
	$date=$_POST['txtdate'];
	$desc=$_POST['txtdesc'];
	$resume=$_POST['txtresume'];
	$qual=$_POST['txtqual'];
	$recruiters=$_POST['txtrecruiters'];
	$detail=$_POST['txtdetail'];
	$cname=$_POST['txtcname'];
	$exp=$_POST['txtexp'];
	
	$query_upd="insert into  jobs (job_title,job_postedby,job_name,salary,job_type,job_postedon,cat_id,job_location,job_benefits,job_schedule,plan_date,job_desc,resume_upload,qualification,recruiters,comp_details,comp_name,experience) values('$title','$postedby','$name','$salary','$jobtype','$jobpost','$jobcatid','$joblocation','$benefits','$schedule','$date','$desc','$resume','$qual','$recruiters','$detail','$cname','$exp')";

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
                                    <h5 class="card-header">Add company</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                             <div class="form-group">
                                                <label for="inputtext">Job Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtname" >
                                               
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Company Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcname">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext">Job Title</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txttitle" ">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Job Postedby</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtpostby">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext">Salary</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtsalary" ">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Job Type</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtjobtype" ">
                                            </div>
											 
											
											<div class="form-group">
                                                <label for="inputtext"> Job Postedon</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtjobpost" ">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Cat Id</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcatid" ">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext"> Job Location</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtjoblocation" ">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Job Benefits</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtbenefits">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext"> Job Schedule</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtschedule">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Plan Date</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtdate" ">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext"> Job Description</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtdesc" >
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Resume Upload</label>
                                                <input id="inputtext" type="file"  class="form-control" name="txtresume" >
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Qualification</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtqual" >
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Recruiters</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtrecruiters" >
                                            </div>
											<div class="form-group">
                                                <label for="inputtext"> Company Details</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtdetail" >
                                            </div>
											
											<div class="form-group">
                                                <label for="inputtext">Experience</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtexp" >                                            </div>
                                          
                                          <input type="submit" value="Add" name="btnedit" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                      
                        <!-- end basic form  -->
           <?php 
		   ob_flush();
		   include('footer.php'); ?>  
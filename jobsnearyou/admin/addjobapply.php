<?php 
ob_start();
include('header.php');
include('connect.php');

 ?> 
<?php
if(isset($_POST['btnedit']))
{
	
	$userid=$_POST['txtuserid'];
	$compid=$_POST['txtcompid'];
	$date=$_POST['txtdate'];
	$status=$_POST['txtstatus'];
	$name=$_POST['txtname'];
	$mail=$_POST['txtemail'];
	$resume=$_POST['txtresume'];
	$pass=$_POST['txtpass'];
	
	
	
	$query_upd="insert into  jobapply (user_id,comp_id,apply_date,apply_status,email,password,resume_upload,name) values('$userid','$compid','$date','$status','$mail','$pass','$resume','$name')";

	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:managejobapply.php");
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
                                    <h5 class="card-header">Add JobApply</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                           
                                             <div class="form-group">
                                                <label for="inputtext">Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtname" >
                                               
                                            </div>
											 <div class="form-group">
                                                <label for="inputtext">Email</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtmail" >
                                               
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Password</label>
                                                <input id="inputtext" type="password"  class="form-control" name="txpass" >
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">User Id</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtuserid">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext">Comp Id</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcompid">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Apply Date</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtdate" >
                                            </div>
											  <div class="form-group">
                                                <label for="inputtext">Resume Upload</label>
                                                <input id="inputtext" type="file"  class="form-control" name="txtstatus" >
                                            </div>
											 <div class="form-group">
                                                <label for="inputtext">Apply Status</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtstatus" >
                                            </div>
											
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
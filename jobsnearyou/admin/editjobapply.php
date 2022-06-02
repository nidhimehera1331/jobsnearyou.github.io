
<?php 
ob_start();
include('header.php'); ?> 
<?php
include('connect.php');
$id=$_GET['id'];
$query="select * from jobapply where apply_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
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
	
	
	$id=$_GET['id'];
	$query_upd="update jobapply set user_id='$userid',comp_id='$compid',apply_date='$date',apply_status='$status',email='$mail',password='$pass',resume_upload='$resume',name='$name' where apply_id=$id";
	
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
                                    <h5 class="card-header">Edit JobApply</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                            <div class="form-group">
                                                <label for="inputtext">Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtname" value="<?php echo $row['name']; ?>">
                                               
                                            </div>
											 <div class="form-group">
                                                <label for="inputtext">Email</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtmail" value="<?php echo $row['email']; ?>">
                                               
                                            </div>
											 <div class="form-group">
                                                <label for="inputtext">Password</label>
                                                <input id="inputtext" type="password"  class="form-control" name="txtpass" value="<?php echo $row['password']; ?>">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">User Id</label>
                                                <input id="inputText4" type="text" class="form-control" value="<?php echo $row['user_id']; ?>" name="txtuserid">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext">Comp Id</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcompid" value="<?php echo $row['comp_id']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Apply Date</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtdate" value="<?php echo $row['apply_date']; ?>">
                                            </div>
											  <div class="form-group">
                                                <label for="inputtext">Resume Upload</label>
                                                <input id="inputtext" type="file"  class="form-control" name="txtstatus" value="<?php echo $row['resume_upload']; ?>">
                                            </div>
											 <div class="form-group">
                                                <label for="inputtext">Apply Status</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtstatus" value="<?php echo $row['apply_status']; ?>">
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
           
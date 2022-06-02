
<?php 
ob_start();
include('header.php'); ?> 
<?php
include('connect.php');
$id=$_GET['id'];
$query="select * from users where reg_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	
	$mail=$_POST['txtmail'];
	$imagepath="img/".$_FILES['userimage']['name'];
	
	$pass=$_POST['txtpass'];
	$city=$_POST['txtcity'];
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$phone=$_POST['txtphone'];
	$resume=$_POST['txtresume'];
	$job=$_POST['txtjob'];
	
	$id=$_GET['id'];
	$query_upd="update users set email_id='$mail',password='$pass',user_profile='$imagepath',city='$city',first_name='$fname',last_name='$lname',phone='$phone',resume_upload='$resume',job_preference='$job' where reg_id=$id";
	
	$res=mysqli_query($con,$query_upd);
	move_uploaded_file($_FILES['userimage']['tmp_name'],"../../user/img/".$_FILES['userimage']['name']);
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:manageusers.php");
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
                                    <h5 class="card-header">Edit Users</h5>
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input id="inputEmail" type="text"  class="form-control" name="txtmail" value="<?php echo $row['email_id']; ?>">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Password</label>
                                                <input id="inputText4" type="password" class="form-control" value="<?php echo $row['password']; ?>" name="txtpass">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext">City</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcity" value="<?php echo $row['city']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">First Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtfname" value="<?php echo $row['first_name']; ?>">
                                            </div>
											 
											 <div class="form-group">
                                                <label for="inputtext">Last Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtlname" value="<?php echo $row['last_name']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Phone</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtphone" value="<?php echo $row['phone']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Resume Upload</label>
                                                <input id="inputtext" type="file"  class="form-control" name="txtresume" value="<?php echo $row['resume_upload']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Job Preferance</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtjob" value="<?php echo $row['job_preference']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">User Profile</label>
                                                <input id="inputtext" type="file"  class="form-control" name="userimage" value="<?php echo $row['user_profile']; ?>">
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
           
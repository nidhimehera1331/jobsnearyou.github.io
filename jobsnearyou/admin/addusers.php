<?php 
ob_start();
include('header.php');
include('connect.php');

 ?> 
<?php
if(isset($_POST['btnedit']))
{
	$imagepath="img/".$_FILES['userimage']['name'];
	
	$mail=$_POST['txtmail'];
	$pass=$_POST['txtpass'];
	$city=$_POST['txtcity'];
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$phone=$_POST['txtphn'];
	$resume=$_POST['txtresume'];
	$job=$_POST['txtjob'];
	
	$query_upd="insert into  users (email_id,password,user_profile,city,first_name,last_name,phone,resume_upload,job_preferance) values('$mail','$pass','$imagepath','$city','$fname','$lname','$phone','$resume','$job')";

	
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
                                    <h5 class="card-header">Add Company</h5>
                                    <div class="card-body">
                                        <form method="post"  enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="form-group">
                                                <label for="inputemail">Email</label>
                                                <input id="inputemail" type="text"  class="form-control" name="txtmail" >
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Password</label>
                                                <input id="inputText4" type="password" class="form-control"  name="txtpass">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext">City</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcity" >
                                            </div>
											
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">First Name</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtfname">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Last Name</label>
                                                <input id="inputText4" type="text" class="form-control" name="txtlname">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Phone</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtphn">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Resume Upload</label>
                                                <input id="inputText4" type="file" class="form-control" name="txtresume">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Job Preferance</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtjob">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">User Profile</label>
                                                <input id="inputtext" type="file"  class="form-control" name="userimage" value="<?php echo $row['user_profile']; ?>">
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
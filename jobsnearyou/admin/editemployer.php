
<?php 
ob_start();
include('header.php'); 

$id=$_GET['id'];
$query="select * from employer where emp_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	
	$mail=$_POST['txtmail'];
	
	
	$pass=$_POST['txtpass'];
	$city=$_POST['txtcity'];
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$phone=$_POST['txtphone'];
	$comp=$_POST['txtcomp'];
	$role=$_POST['txtrole'];
	$total=$_POST['txttotal'];
	$imagepath="img/".$_FILES['empimage']['name'];
	$id=$_GET['id'];
	$query_upd="update employer set comp_id='$comp',email_id='$mail',password='$pass',total_emp='$total',first_name='$fname',last_name='$lname',emp_profile='$imagepath',role='$role',phone='$phone' where emp_id=$id";
	
	$res=mysqli_query($con,$query_upd);
	move_uploaded_file($_FILES['empimage']['tmp_name'],"../../user/img/".$_FILES['empimage']['name']);
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
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Basic Form Elements</h3>
                                   
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Edit Employer</h5>
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="inputtext">First Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtfname" value="<?php echo $row['first_name']; ?>">
                                            </div>
											 
											 <div class="form-group">
                                                <label for="inputtext">Last Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtlname" value="<?php echo $row['last_name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input id="inputEmail" type="text"  class="form-control" name="txtmail" value="<?php echo $row['email_id']; ?>">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Password</label>
                                                <input id="inputText4" type="password" class="form-control" value="<?php echo $row['password']; ?>" name="txtpass">
                                            </div>
                                           <div class="form-group">
                                                <label for="inputtext">Company Id</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcomp" value="<?php echo $row['comp_id']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Phone</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtphone" value="<?php echo $row['phone']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Profile</label>
                                                <input id="inputtext" type="file"  class="form-control" name="empimage" value="<?php echo $row['emp_profile']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Total Employer</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txttotal" value="<?php echo $row['total_emp']; ?>">
                                            </div>
																						<div class="form-group">
                                                <label for="inputtext">Role</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtrole" value="<?php echo $row['role']; ?>">
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
           
<?php 
ob_start();
include('header.php');


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
	$query_upd="insert into  employer (comp_id,email_id,password,total_emp,first_name,last_name,emp_profile,role,phone) values('$comp','$mail','$pass','$total','$fname','$lname','$imagepath','$role','$phone')";

	
	move_uploaded_file($_FILES['empimage']['tmp_name'],"../../user/img/".$_FILES['empimage']['name']);
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:manageemployer.php");
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
                                    <h5 class="card-header">Add Employer</h5>
                                    <div class="card-body">
                                        <form method="post"  enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="form-group">
                                                <label for="inputtext">First Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtfname" >
                                            </div>
											 
											 <div class="form-group">
                                                <label for="inputtext">Last Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtlname" >
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input id="inputEmail" type="text"  class="form-control" name="txtmail" >
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Password</label>
                                                <input id="inputText4" type="password" class="form-control" name="txtpass">
                                            </div>
                                           <div class="form-group">
                                                <label for="inputtext">Company Id</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcomp" >
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Phone</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtphone" >
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Profile</label>
                                                <input id="inputtext" type="file"  class="form-control" name="empimage" >
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Total Employer</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txttotal" >
                                            </div>
																						<div class="form-group">
                                                <label for="inputtext">Role</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtrole" >
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
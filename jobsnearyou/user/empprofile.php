<?php 
ob_start();
include('eheader.php'); 
session_start();
if(!isset($_SESSION['eid']) && empty($_SESSION['eid'])) 
{
	header("location:emplogin.php");
}

$eid=$_SESSION['eid'];                           										
$query="select e.*,c.* from employer e join companies c on e.comp_id=c.comp_id  where emp_id=$eid";
$res1=mysqli_query($con,$query);
$row=mysqli_fetch_array($res1);

if(isset($_POST['btnprofile'])) 
{
	
	$mail=$_POST['txtmail'];
	
	$pass=$_POST['txtpass'];
	$totalemp=$_POST['txttotal'];
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$role=$_POST['txtrole'];
	$phone=$_POST['txtphone'];
	
	
	
	
	$query_upd="update employer set email_id='$mail',password='$pass',total_emp='$totalemp',first_name='$fname',last_name='$lname',role='$role',phone='$phone' where emp_id=$eid";
	
	
	$res=mysqli_query($con,$query_upd);
	if($res1)
	{
		header("location:empprofile.php");
	}
	else
	{
		echo "Error while updating data";
	}
}



if(isset($_POST['btncomp'])) 
{
	
	
	$name=$_POST['txtname'];
	$size=$_POST['txtsize'];
	$desc=$_POST['txtdesc'];
	$web=$_POST['txtweb'];
	
	
	
	$cid=$row['comp_id'];
	$query_upd="update companies set comp_name='$name',comp_size='$size',comp_desc='$desc',comp_website='$web' where comp_id=$cid";
	
	
	$res=mysqli_query($con,$query_upd);
	if($res1)
	{
		header("location:empprofile.php");
	}
	else
	{
		echo "Error while updating data";
	}
}



if(isset($_POST['btnchange'])) 
{
	
	
	
	
	
		$imagepath="img/".$_FILES['empimage']['name'];
	$query_upda="update employer set emp_profile='$imagepath' where emp_id='$eid'";
	move_uploaded_file($_FILES['empimage']['tmp_name'],$imagepath);
	
	$res=mysqli_query($con,$query_upda);
	if($res)
	{
		header("location:empprofile.php");
	}
	else
	{
		echo "Error while updating data";
	}
}




if(isset($_POST['btnsubmit']))
{
	$eid=$_SESSION['eid'];
	$oldpass=$_POST['txtoldpass'];
	$newpass=$_POST['txtnewpass'];
	
	$query="select * from employer where emp_id=$eid";
	$res1=mysqli_query($con,$query);//data
	$row=mysqli_fetch_array($res1);

if($row['password']==$oldpass)
	{
		$query_upd="update employer set password='$newpass' where emp_id=$eid";
		$res1=mysqli_query($con,$query_upd);//data
		if($res1)
		{
			$msg1="Password Changed successfully";
		}
		else
		{
			$msg="Error while changing password".mysqli_error($con);
		}
	}
	else
	{
		$msg="Old Password Incorrect";
	}
}


if(isset($_POST['btnedit']))
{
	$eid=$_SESSION['eid'];
	$oldemail=$_POST['txtoldemail'];
	$newemail=$_POST['txtnewemail'];
	
	$query="select * from employer where emp_id=$eid";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);

if($row['email_id']==$oldemail)
	{
		$query_upd="update employer set email_id='$newemail' where emp_id=$eid";
		$res1=mysqli_query($con,$query_upd);//data
		if($res1)
		{
			$msge1="Email Changed successfully";
		}
		else
		{
			$msge="Error while changing email".mysqli_error($con);
		}
	}
	else
	{
		$msge="Old Email Address Incorrect";
	}
}
?>
<style>
.ps-5 {
  padding-left: 9rem !important;
}
.mb-5 {
  margin-bottom: -2rem !important;
}
</style>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
			<div class="shadow-sm mb-5 pb-5">
		
            <div class="d-flex flex-column align-items-center text-center p-3"><img class="rounded-circle" height="100px" width="100px" src="<?php echo $row['emp_profile']; ?>"><span class="font-weight-bold"></span><span class="text-black-50"><?php echo $row['first_name']; ?></span><span><?php echo $row['email_id']; ?> </span></div>
			<div class="text-center mb-3"><a class="btn btn-danger profile-button mx-auto" href="logout.php">Log Out</a></div>
			</div>
			 <div class="p-5 shadow-sm">
			 <?php
								if(!empty($msgr)&& $msgr!="")
								{
									echo "<p class='alert alert-success mt-3'>$msgr</p>";
								}
							?>
							<h2 class="text-center">+ Post Job</h2>
						<div class="text-center">
			 <a href="postjob.php" class="btn btn-primary  mt-3 p-2 ms-2 text-white " >
                                                        + Post Job</a>
                  </div>                                    
			 </div>
			 
			 <div class="shadow-sm p-3 text-center mt-5">
			 
			   <form method="post" enctype="multipart/form-data" class="form-horizontal">
			   <h4 class="text-center text-decoration-underline mb-3">Change Profile Pic</h4>
			    <div class="row">
				<div class="col-lg-4">
				<img src="<?php echo $row['emp_profile']; ?>" style="height:50px;width:50px" class="rounded-circle img-fluid"/>
				</div>
				<div class="col-lg-8">
				<input type="file" class="form-control" id="text-input"  name="empimage">
				</div>
				</div><br/>
				<button type="submit" class="btn btn-success btn-sm " name="btnchange">
                                                           Save Profile
                                                        </button>
				
			   </form>
			 </div>
			 
			
        </div>
		
        <div class="col-lg-4 border-right">
		<form method="post" class=" shadow-sm m-3">
            <div class="p-3 py-5 ">
                <div class="d-flex justify-content-between align-items-center mb-3 ">
                    <h4 class="text-right"> Edit Employer Details</h4>
                </div>
				
				<label class="labels">First Name </label><input type="text" class="form-control"  value= "<?php echo $row['first_name'];?>" name="txtfname"><br/>
				<label class="labels">Last Name</label><input type="text" class="form-control" value="<?php echo $row['last_name'];?>"  name="txtlname"><br/>
				<label class="labels">Email </label><input type="text" class="form-control"  value= "<?php echo $row['email_id'];?>" name="txtmail"><br/>
				<label class="labels">Password</label><input type="password" class="form-control" value="<?php echo $row['password'];?>"  name="txtpass"><br/>
                
                
                <label class="labels">Total Employer </label><input type="text" class="form-control" value="<?php echo $row['total_emp'];?>" name="txttotal"><br/>
                  <label class="labels">Phone </label><input type="text" class="form-control"  value="<?php echo $row['phone'];?>" name="txtphone"><br/>
                    
                   <label class="labels">Role </label><input type="text" class="form-control"  value="<?php echo $row['role'];?>"name="txtrole"><br/>
				 
                 
                 <button type="submit" class="btn btn-primary btn-sm mt-3 p-2" name="btnprofile">
                                                           Save Details
                                                        </button>
            </div>
			</form>
			<div class="row shadow-sm m-3">
                    
                     <div >
                                                <div >
                                                    <div >
                                                      <h4>  Change Password</h4>
													</div>
                                                    <div>
                                                        <form method="post" class="mt-3" >
                                                            
                                                            Old Password<input type="password" id="text-input" name="txtoldpass" class="form-control ">
      
                                                                
                                                              New Password <input type="password" id="text-input" name="txtnewpass" class="form-control ">
                                                          
                                                              Confirm Password
                                                                <input type="password" id="text-input" class="form-control" >
                                                        <button type="submit" class="btn btn-primary btn-sm mt-3 mb-4  p-2" name="btnsubmit">
                                                           Change Password
                                                        </button>
                                                        
    </form>                                              
                                                </div>
                                          
                                            </div>

                                           

                                                                               </div>
                                        </div>
			
			
			
			 
        </div>
		
		
		
		 
       <div class="col-lg-4  pt-4">
	   
	   <div class=" border-right shadow-sm m-3">
		<form method="post">
            <div class="p-3 py-5 ">
                <div class="d-flex justify-content-between align-items-center mb-3 ">
                    <h4 class="text-right">Edit Company Details</h4>
                </div>
				
			<label class="labels">Company Name </label><input type="text" class="form-control"  value="<?php echo $row['comp_name'];?>"name="txtname"><br/>
                   <label class="labels">Company Size </label><input type="text" class="form-control"  value="<?php echo $row['comp_size'];?>"name="txtsize"><br/>
                   <label class="labels">Company Website </label><input type="text" class="form-control"  value="<?php echo $row['comp_website'];?>"name="txtweb"><br/>
                   <label class="labels">Company Description </label><input type="text" class="form-control"  value="<?php echo $row['comp_desc'];?>"name="txtdesc"><br/>
              
                 <button type="submit" class="btn btn-primary btn-sm mt-3 p-2" name="btncomp">
                                                           Save Details
                                                        </button>
            </div>
			</form>
        </div>
		
          
                <!-- .animated -->
                                    <!-- .content -->
                 
                      <div class="col-lg-12 pt-4">
            <div >
                <div class="row col_lg-12 shadow-sm p-5">
                    
                     <div >
                                                <div class="mb-5">
                                                    <div >
                                                      <h4>  Change Email</h4>
													</div>
                                                    <div>
                                                        <form method="post" class="mt-3" >
                                                            
                                                            Old Email<input type="text" id="text-input" name="txtoldemail" class="form-control ">
      
                                                                
                                                              New Email <input type="text" id="text-input" name="txtnewemail" class="form-control ">
                                                          
                                                              Confirm Email
                                                                <input type="text" id="text-input" class="form-control">
                                                            
                                                       
                                                    
                                                    
                                                        <button type="submit" class="btn btn-primary btn-sm mt-3 p-2" name="btnedit">
                                                           Change Email
                                                        </button>
                                                        
    </form>                                              
                                                </div>
                                          
                                            </div>

                                           

                                                                               </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                              
    </div>
    </div>
	      </div>
</div>
</div>
<?php
ob_flush();
 include('footer.php'); ?>
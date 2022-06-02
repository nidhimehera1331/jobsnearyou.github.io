<?php 
ob_start();
include('uheader.php'); 
$msg="";

session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
{
	header("location:login.php");
}

$id=$_SESSION['id'];
$query="select * from users where reg_id=$id";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);

if(isset($_POST['btnprofile'])) 
{
	$mail=$_POST['txtmail'];
	
	$pass=$_POST['txtpass'];
	$city=$_POST['txtcity'];
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$phone=$_POST['txtphone'];
	$resume=$_POST['txtresume'];
	$job=$_POST['txtjob'];
	
	
	$query_upd="update users set email_id='$mail',password='$pass',city='$city',first_name='$fname',last_name='$lname',phone='$phone',resume_upload='$resume',job_preference='$job' where reg_id=$id";
	
	
	$res1=mysqli_query($con,$query_upd);
	if($res1)
	{
		header("location:userprofile.php");
	}
	else
	{
		echo "Error while updating data";
	}
	
	
}




if(isset($_POST['btnchange'])) 
{
	
	
	
	
	
		$imagepath="img/".$_FILES['profile']['name'];
	$query_upda="update users set user_profile='$imagepath' where reg_id='$id'";
	move_uploaded_file($_FILES['profile']['tmp_name'],$imagepath);
	
	$res=mysqli_query($con,$query_upda);
	if($res)
	{
		header("location:userprofile.php");
	}
	else
	{
		echo "Error while updating data";
	}
}




if(isset($_POST["SubmitBtn"])){

  $fileName=$_FILES["resume"]["name"];
  $fileSize=$_FILES["resume"]["size"]/1024;
  $fileType=$_FILES["resume"]["type"];
  $fileTmpName=$_FILES["resume"]["tmp_name"];  

  if($fileType=="application/msword"){
    if($fileSize<=200){

      //New file name
      $random=rand(1111,9999);
      $newFileName=$random.$fileName;

      //File upload path
      $uploadPath="testUpload/".$newFileName;

      //function for upload file
      if(move_uploaded_file($fileTmpName,$uploadPath)){
        echo "Successful"; 
        echo "File Name :".$newFileName; 
        echo "File Size :".$fileSize." kb"; 
        echo "File Type :".$fileType; 
      }
	  
	  $query_updx="update users set resume_upload='$uploadPath' where reg_id='$id'";
	 $resx=mysqli_query($con,$query_updx);
    }
	
    else{
      echo "Maximum upload file size limit is 200 kb";
    }
  }
  else{
    echo "You can only upload a Word doc file.";
  }  
}


if(isset($_POST['btnsubmit']))
{
	$id=$_SESSION['id'];
	$oldpass=$_POST['txtoldpass'];
	$newpass=$_POST['txtnewpass'];
	
	$query="select * from users where reg_id=$id";
	$res=mysqli_query($con,$query);//data
	$row=mysqli_fetch_array($res);

if($row['password']==$oldpass)
	{
		$query_upd="update users set password='$newpass' where reg_id=$id";
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
	$uid=$_SESSION['id'];
	$oldemail=$_POST['txtoldemail'];
	$newemail=$_POST['txtnewemail'];
	
	$query="select * from users where reg_id=$uid";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);

if($row['email_id']==$oldemail)
	{
		$query_upd="update users set email_id='$newemail' where reg_id=$uid";
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
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row ">
        <div class="col-md-3 border-right">
			<div class="shadow-sm mb-5 pb-5">
           <div class="d-flex flex-column align-items-center text-center p-3"><img class="rounded-circle mt-5" style="width:90px;height:90px;" src="<?php echo $row['user_profile']; ?>"><span class="font-weight-bold"></span><span class="text-black-50"><?php echo $row['first_name']; ?></span><span><?php echo $row['email_id']; ?> </span></div>
			<div class="text-center mb-3"><a class="btn btn-danger profile-button mx-auto" href="logout.php">Log Out</a></div>
			</div>
			 <div class="p-5 shadow-sm">
			 <?php
								if(!empty($msgr)&& $msgr!="")
								{
									echo "<p class='alert alert-success mt-3'>$msgr</p>";
								}
							?>
									Check Uploaded Resume: <a href=" <?php echo $row['resume_upload']; ?>"> <?php echo $row['resume_upload']; ?> <a/>  
										  <form method="post" enctype="multipart/form-data" class="form-horizontal">

			 <label class="labels ">Resume Upload </label><input type="file" class=" mx-auto" value="<?php echo $row['resume_upload'];?>"name="resume" id="resume">
			 <button type="submit" class="btn btn-primary btn-sm mt-3 p-2 ms-5 mx-auto" name="SubmitBtn">
                                                           Upload Resume
                                                        </button>
														</form>
														
			 </div>
			 
			 
			  
			 <div class="shadow-sm p-3 text-center mt-5">
			 
			   <form method="post" enctype="multipart/form-data" class="form-horizontal">
			   <h4 class="text-center text-decoration-underline mb-3">Change Profile Pic</h4>
			    <div class="row">
				<div class="col-lg-4">
				<img src="<?php echo $row['user_profile']; ?>" style="height:50px;width:50px" class="rounded-circle img-fluid"/>
				</div>
				<div class="col-lg-8">
				<input type="file" class="form-control" id="text-input"  name="profile">
				</div>
				</div><br/>
				<button type="submit" class="btn btn-success btn-sm  " name="btnchange">
                                                           Save Profile
                                                        </button>
				
			   </form>
			 </div>
			 <div class="shadow-sm mb-5 pb-5 text-center">
			 <a href="applyjoball.php" class="btn btn-success mt-5 text-center ">Apply For Job</a>
			 </div>
	
        </div>
		
        <div class="col-lg-4 border-right shadow-sm m-3">
		<?php
								if(!empty($msg)&& $msg!="")
								{
									echo "<p class='alert alert-success mt-3'>$msg</p>";
								}
							?>
		<form method="post">
            <div class="p-3 py-5">
			
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">User Details</h4>
                </div>
				
				<label class="labels">First Name </label><input type="text" class="form-control"  value= "<?php echo $row['first_name'];?>" name="txtfname"><br/>
				<label class="labels">Last Name</label><input type="text" class="form-control" value="<?php echo $row['last_name'];?>"  name="txtlname"><br/>
                
                
                <label class="labels">City </label><input type="text" class="form-control" value="<?php echo $row['city'];?>" name="txtcity"><br/>
                  <label class="labels">Phone </label><input type="text" class="form-control"  value="<?php echo $row['phone'];?>" name="txtphone"><br/>
                    
                   <label class="labels">Job Preferance </label><input type="text" class="form-control"  value="<?php echo $row['job_preference'];?>"name="txtjob"><br/>
                 <button type="submit" class="btn btn-primary btn-sm mt-3 p-2" name="btnprofile">
                                                           Save Details
                                                        </button>
            </div>
			</form>
        </div>
		  
       <div class="col-lg-4  pt-4">
            <div >
                <div class="row shadow-sm p-5">
                    
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
                                                            
                                                       
                                                    
                                                    
                                                        <button type="submit" class="btn btn-primary btn-sm mt-3 p-2" name="btnsubmit">
                                                           Change Password
                                                        </button>
                                                        
    </form>                                              
                                                </div>
                                          
                                            </div>

                                           

                                                                               </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                 
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

 include('footer.php');
ob_flush();
 ?>
<?php 
ob_start();
 include('header.php');?>
<?php
if(isset($_POST['btnregister']))
{
	
	$con=mysqli_connect("localhost","root","","jobsnearyou");
	if(!$con)
	{
		die( "Error while esatblishing connection".mysqli_connect_error());
	}
	$email=$_POST['txtemail'];
	$password=$_POST['txtpass'];
	$imagepath="img/".$_FILES['userimage']['name'];
	$city=$_POST['txtcity'];
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	
	
	$phone=$_POST['txtphone'];
	$resumepath="img/".$_FILES['applyresume']['name'];
	$job=$_POST['txtjob'];
	
	
	$query="insert into users(email_id,password,user_profile,city,first_name,last_name,phone,resume_upload,job_preference) values('$email','$password','$imagepath','$city','$fname','$lname','$phone','$resumepath','$job')";
	move_uploaded_file($_FILES['userimage']['tmp_name'],"../../user/img/".$_FILES['userimage']['name']);
move_uploaded_file($_FILES['applyresume']['tmp_name'],$resumepath);
	$res=mysqli_query($con,$query);//True/False
	if($res)
	{

	header("location:login.php");

	}
	else
	{
		echo "Error while registering user.Pls try again later".mysqli_error($con);
	}

}
?>
<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>
                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                            <fieldset class="p-4">

																		<input type="text" placeholder="Firstname*" class="border p-3 w-100 my-2" name="txtfname">
																																				<input type="text" placeholder="Lastname*" class="border p-3 w-100 my-2" name="txtlname">
																		<input type="text" placeholder="Emailid" class="border p-3 w-100 my-2" name="txtemail">
                            <input type="password" placeholder="Password" class="border p-3 w-100 my-2" name="txtpass">
							<input type="text" placeholder="Phone" class="border p-3 w-100 my-2" name="txtphone">
                            <input type="text" placeholder="City" class="border p-3 w-100 my-2" name="txtcity">
                               
                                <input type="text" placeholder="Job Preference" class="border p-3 w-100 my-2" name="txtjob"><br/><br/>
									<div class="row">
					<div class="col-lg-6">
						User Profile:<input type="file" name="userimage" placeholder="Profile  "class="border-0 border-bottom form-control"/>
					</div>
					<div class="col-lg-6">
						Resume Upload:<input type="file" name="applyresume" placeholder="Resume Upload"class="border-0 border-bottom form-control"/><br/><br/>
					</div>	
					</div>
                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <input type="checkbox" id="registering" class="mt-1">
                                        <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                </div>
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold" name="btnregister">Register Now</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php  include('footer.php');
ob_flush();
?>

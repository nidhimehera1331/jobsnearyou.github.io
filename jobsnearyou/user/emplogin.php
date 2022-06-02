<?php 
ob_start();
include('header.php'); ?>
<?php
if(isset($_POST['btnlogin']))

{
	
	$email=$_POST['txtemail'];
	$pass=$_POST['txtpass'];
	
	$query="select * from employer where email_id='$email' and password='$pass'";
	
	$res=mysqli_query($con,$query);//data or no result
	$count=mysqli_num_rows($res);
	
	if($count==1)
	{
		session_start();
		$row=mysqli_fetch_array($res);
		$_SESSION['eid']=$row['emp_id'];
		header("location:empprofile.php");
	}
	else
	{
		echo "Invalid Username/Password";
	}
}

?>
<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login Now</h3>
                    <form method="post">
                        <fieldset class="p-4">
                            <input type="text" placeholder="Emailid" class="border p-3 w-100 my-2" name="txtemail">
                            <input type="password" placeholder="Password" class="border p-3 w-100 my-2" name="txtpass">
                            <div class="loggedin-forgot">
                                    <input type="checkbox" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                            </div>
                            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3"name="btnlogin">Log in</button>
                            <a class="mt-3 d-block  text-primary" href="#">Forget Password ?</a>
                            <a class="mt-3 d-inline-block text-primary" href="#">Register Now</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--============================
=            Footer            =
=============================-->
<?php include('footer.php');
ob_flush();
 ?>
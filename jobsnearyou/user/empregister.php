
<?php
ob_start();
 include('header.php'); 

$msg="";
if(isset($_POST['btnadd'])) 
{
	
	$mail=$_POST['txtmail'];
	$totalemp=$_POST['txttotalemp'];
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$role=$_POST['txtrole'];
	$phone=$_POST['txtphone'];
	$pass=$_POST['txtpass'];
	$exp=$_POST['txtexp'];
	$add=$_POST['txtadd'];
	
	$compname=$_POST['txtcompname'];
	$compdesc=$_POST['txtcompdesc'];
	$compweb=$_POST['txtcompweb'];
	$comploc=$_POST['txtloc'];
	$compfound=$_POST['txtfound'];
	
	
	$query_updc="insert into companies(comp_name,comp_location,comp_foundedon,comp_size,comp_desc,comp_website) values('$compname','$comploc','$compfound','$totalemp','$compdesc','$compweb')";
	
	$resc=mysqli_query($con,$query_updc);
	if($resc)
	{
		$compid=mysqli_insert_id($con);
		$query_upd="insert into employer (email_id,password,total_emp,first_name,last_name,role,phone,address,experience,comp_id) values('$mail','$pass','$totalemp','$fname','$lname','$role','$phone','$add','$exp',$compid)";
	
		$res=mysqli_query($con,$query_upd);
		if($res)
		{
			header("location:emplogin.php");
		}
		else
		{
			$msg= "Error while adding data".mysqli_error($con);
		}
	}
	else
	{
		$msg= "Error while adding data".mysqli_error($con);
	}
	
	
}

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 mx-auto border rounded py-4 px-4 mt-4 shadow-sm">
			<div class="p-3 text-center ">
				<h2 class="text-primary">Register Form</h2><br/>
				<form method="post" enctype="multipart/form-data">
					<fieldset>
					<?php
								if(!empty($msg)&& $msg!="")
								{
									echo "<p class='alert alert-success mt-3'>$msg</p>";
								}
							?>
					
						<input type="text" name="txtfname" placeholder="First Name" class="border-0 border-bottom form-control"/><br/><br/>
					
					
						<input type="text" name="txtlname" placeholder="Last Name" class="border-0 border-bottom form-control"/><br/><br/>
					
					
					
					
						<input type="text" name="txttotalemp" placeholder="Total Employees "class="border-0 border-bottom form-control"/><br/><br/>
							
						<input type="text" name="txtmail" placeholder="Email"class="border-0 border-bottom form-control"/><br/><br/>
						<input type="password" name="txtpass" placeholder="Password"class="border-0 border-bottom form-control"/><br/><br/>
					
						<input type="text" name="txtphone" placeholder="Phone " class="border-0 border-bottom form-control"/><br/><br/>
						<input type="text" name="txtexp" placeholder="Experience " class="border-0 border-bottom form-control"/><br/><br/>
					
						<select class="form-select bg-white border-0 border-bottom"  name="txtrole">
							<option selected>Role</option>
							<option>HR</option>
							<option>CEO</option>
							<option>Manager</option>
							<option>OThers</option>
						</select><br/><br/>
						<input type="text" name="txtcompname" placeholder="Company Name " class="border-0 border-bottom form-control"/><br/><br/>
						<input type="text" name="txtcompweb" placeholder="Company Website " class="border-0 border-bottom form-control"/><br/><br/>
						<input type="text" name="txtloc" placeholder="Company Location " class="border-0 border-bottom form-control"/><br/><br/>
						<input type="text" name="txtfound" placeholder="Company Founded On " class="border-0 border-bottom form-control"/><br/><br/>
						<textarea type="text" name="txtadd" placeholder="Address " rows="3"class="border-0 border-bottom form-control"></textarea><br/><br/>
						<textarea type="text" name="txtcompdesc" placeholder="Company Details" rows="3"class="border-0 border-bottom form-control"></textarea><br/>
					
						<div class="d-grid">
							<button class="btn btn-primary mt-4 d-grid btn-default p-2" name="btnadd">Submit</button>
						</div>
						
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
ob_flush();
 include('footer.php'); ?>
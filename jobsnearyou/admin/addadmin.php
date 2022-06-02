<?php 
ob_start();
 include('header.php');

if(isset($_POST['btnedit']))
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	
	$pass=$_POST['txtpass'];
	
	
	$query_upd="insert into  admin (admin_name,admin_email,admin_pass) values('$name','$email','$pass')";
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:manageadmin.php");
	}
	else
	{
		echo "Error while updating data";
	}
}
?>
       
        
       <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Basic Form Elements</h3>
                                   
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Add Admin</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                            <div class="form-group">
                                                <label for="inputtext">Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtname" >
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Email</label>
                                                <input id="inputText4" type="email" class="form-control"  name="txtemail">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Password</label>
                                                <input id="inputPassword" type="password"  class="form-control" name="txtpass"  ?>
                                            </div>
                                            
                                          <input type="submit" value="Add" name="btnedit" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                      
                      
<?php  include('footer.php');
ob_flush();
?>

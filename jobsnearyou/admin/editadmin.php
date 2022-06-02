<?php 
ob_start();
include('header.php');  

$id=$_GET['id'];
$query="select * from admin where admin_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	
	$pass=$_POST['txtpass'];
	$id=$_GET['id'];
	$query_upd="update admin set admin_name='$name',admin_email='$email',admin_pass='$pass' where admin_id=$id";
	
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

                    
                       
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Basic Form Elements</h3>
                                   
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Edit Admin</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                            <div class="form-group">
                                                <label for="inputEmail">Name</label>
                                                <input id="inputEmail" type="text"  class="form-control" name="txtname" value="<?php echo $row['admin_name']; ?>">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Email</label>
                                                <input id="inputText4" type="email" class="form-control" value="<?php echo $row['admin_email']; ?>" name="txtemail">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Password</label>
                                                <input id="inputPassword" type="password"  class="form-control" name="txtpass" value="<?php echo $row['admin_pass']; ?>">
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
           
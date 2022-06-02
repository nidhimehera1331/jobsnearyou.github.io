<?php 
ob_start();
include('header.php'); ?> 
<?php
include('connect.php');
$id=$_GET['id'];
$query="select * from register where reg_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	$fname=$_POST['txtfname'];
	$email=$_POST['txtemail'];
	
	$phone=$_POST['txtphone'];
	$id=$_GET['id'];
	$query_upd="update register set name='$fname',email='$email',phone='$phone' where reg_id=$id";
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:manageregisters.php");
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
                                    <h5 class="card-header">Edit Registers</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                            <div class="form-group">
                                                <label for="inputEmail">Name</label>
                                                <input id="inputEmail" type="text"  class="form-control" name="txtfname" value="<?php echo $row['name']; ?>">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Email</label>
                                                <input id="inputText4" type="email" class="form-control" value="<?php echo $row['email']; ?>" name="txtemail">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Password</label>
                                                <input id="inputPassword" type="password"  class="form-control" name="txtpassword" value="<?php echo $row['password']; ?>">
                                            </div>
                                             <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Phone</label>
                                                <input id="inputText4" type="text" class="form-control" value="<?php echo $row['phone']; ?>" name="txtphone">
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
           
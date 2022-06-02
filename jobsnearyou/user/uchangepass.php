<?php 
ob_start();
 include('uheader.php');
include('connect.php');


if(isset($_POST['btnsubmit']))
{
	session_start();
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

?>
       

        <div class="content mt-3 ">
            <div class="animated fadeIn">


                <div class="row">
                    
                     <div class="col-lg-12">
                                                <div class="card col-lg-6 mx-auto">
                                                    <div class="card-header">
                                                        <strong>Change Password
													</div>
                                                    <div class="card-body card-block text-center">
                                                        <form method="post" class="form-horizontal ">
                                                            
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"  >Old Password</label></div>
                                                                <div class="col-12 col-md-9"><input type="password" id="text-input" name="txtoldpass" class="form-control"></div>
                                                            </div><br/>
       <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"  >New Password</label></div>
                                                                <div class="col-12 col-md-9"><input type="password" id="text-input" name="txtnewpass" class="form-control"></div>
                                                            </div> <br/>                                                    
                                                
                                                          
                                                              
                                                                 <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Confirm Password</label></div>
                                                                <div class="col-10 col-md-9"><input type="password" id="text-input" class="form-control"></div>
                                                            </div><br/>
                                                       
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm mx-auto" name="btnsubmit">
                                                           Change Password
                                                        </button>
                                                        
    </form>                                                 </div>
                                                </div>
                                          
                                            </div>

                                           

                                                                               </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                              

<?php  include('footer.php');
ob_flush();
?>

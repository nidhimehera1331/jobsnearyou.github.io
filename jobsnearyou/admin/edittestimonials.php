
<?php 
ob_start();
include('header.php'); 
$id=$_GET['id'];
$query="select * from testimonials where test_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	
	
	$emp=$_POST['txtemp'];
	$postedby=$_POST['txtpostedby'];
	$postedon=$_POST['txtpostedby'];
	$testimonials=$_POST['txttestimonials'];
	
	
	$id=$_GET['id'];
	$query_upd="update testimonials set emp_id='$emp',testimonial='$testimonials',postedby='$postedby',postedon='$postedon'where test_id=$id";
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:managetestimonials.php");
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
                                    <h5 class="card-header">Edit Testimonials</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                           
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Employer Id</label>
                                                <input id="inputText4" type="text" class="form-control" value="<?php echo $row['emp_id']; ?>" name="txtemp">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Testimonial</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txttestimonials" value="<?php echo $row['testimonial']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext"> Postedby</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtpostedby" value="<?php echo $row['postedby']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext"> Postedon</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtpostedon" value="<?php echo $row['postedon']; ?>">
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
           
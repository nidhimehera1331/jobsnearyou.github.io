
<?php 
ob_start();
include('header.php'); ?> 
<?php
include('connect.php');
$id=$_GET['id'];
$query="select * from userreviews where review_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	
	$reviewheading=$_POST['txtheading'];
	
	$reviewdetails=$_POST['txtdetails'];
	$reviewpostedby=$_POST['txtpostedby'];
	$reviewpostedon=$_POST['txtpostedby'];
	$rating=$_POST['txtrating'];
	
	
	$id=$_GET['id'];
	$query_upd="update userreviews set review_heading='$reviewheading',review_details='$reviewdetails',review_postedby='$reviewpostedby',review_postedon='$reviewpostedon',rating='$rating'where review_id=$id";
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:manageuserreviews.php");
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
                                    <h5 class="card-header">Edit UserReviews</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                            <div class="form-group">
                                                <label for="inputtext">Review Heading</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtheading" value="<?php echo $row['review_heading']; ?>">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Review Details</label>
                                                <input id="inputText4" type="password" class="form-control" value="<?php echo $row['review_details']; ?>" name="txtdetails">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext">Review Postedby</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtpostedby" value="<?php echo $row['review_postedby']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Review Postedon</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtpostedon" value="<?php echo $row['review_postedon']; ?>">
                                            </div>
											 
											 <div class="form-group">
                                                <label for="inputtext">Rating</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtrating" value="<?php echo $row['rating']; ?>">
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
           
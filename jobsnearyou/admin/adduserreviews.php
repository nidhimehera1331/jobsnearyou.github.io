<?php 
ob_start();
include('header.php');
include('connect.php');

 ?> 
<?php
if(isset($_POST['btnedit']))
{
	$reviewheading=$_POST['txtheading'];
	
	$reviewdetails=$_POST['txtdetails'];
	$reviewpostedby=$_POST['txtpostedby'];
	$reviewpostedon=$_POST['txtpostedon'];
	$rating=$_POST['txtrating'];
	
	
	$query_upd="insert into  userreviews (review_heading,review_details,review_postedby,review_postedon,rating) values('$reviewheading','$reviewdetails','$reviewpostedby','$reviewpostedon','$rating')";

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
                                    <h5 class="card-header">Add UserReviews</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                           
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Review Heading</label>
                                                <input id="inputText4" type="text" class="form-control" name="txtheading">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Review Details</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtdetails">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext4" class="col-form-label">Review Postedby</label>
                                                <input id="inputText4" type="text" class="form-control" name="txtpostedby">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Review Postedon</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtpostedon">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Rating</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtrating">
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
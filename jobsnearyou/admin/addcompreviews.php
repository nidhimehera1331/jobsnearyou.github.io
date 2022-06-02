<?php 
ob_start();
include('header.php');
include('connect.php');

 ?> 
<?php
if(isset($_POST['btnedit']))
{
	
	$heading=$_POST['txtheading'];
	$reviewdetails=$_POST['txtreviewdetails'];
	$postedby=$_POST['txtpostedby'];
	$postedon=$_POST['txtpostedon'];
	$rating=$_POST['txtrating'];
	
	
	$query_upd="insert into  compreviews (creview_heading,creview_details,creview_postedby,creview_postedon,c_rating) values('$heading','$reviewdetails','$postedby','$postedon','$rating')";

	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:managecompreviews.php");
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
                                    <h5 class="card-header">Add Company Reviews</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                           
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Creview Heading</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtheading">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext">Creview Details </label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtreviewdetails" >
                                            </div>
											
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Creview Postedby</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtpostedby">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Creview Postedon</label>
                                                <input id="inputText4" type="text" class="form-control" name="txtpostedon">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Rating</label>
                                                <input id="inputText4" type="text" class="form-control" name="txtrating">
                                            </div>
											
											    <input type="submit" value="Add" name="btnedit" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                      
                        <!-- end basic form  -->
           <?php 
		   ob_flush();
		   include('footer.php'); ?>  
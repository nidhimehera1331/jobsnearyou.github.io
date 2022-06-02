
<?php 
ob_start();
include('header.php'); ?> 
<?php
include('connect.php');
$id=$_GET['id'];
$query="select * from compreviews where creview_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	
	$heading=$_POST['txtheading'];
	
	$reviewdetails=$_POST['txtreviewdetails'];
	$postedby=$_POST['txtpostedby'];
	$postedon=$_POST['txtpostedon'];
	$rating=$_POST['txtrating'];
	
	
	$id=$_GET['id'];
	$query_upd="update compreviews set creview_heading='$heading',creview_details='$reviewdetails',creview_postedby='$postedby',creview_postedon='$postedon',c_rating='$rating' where creview_id=$id";
	
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
                                    <h5 class="card-header">Edit Company Review</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                            <div class="form-group">
                                                <label for="inputtext">Creview Heading </label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtheading" value="<?php echo $row['creview_heading']; ?>">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Creview Details</label>
                                                <input id="inputText4" type="text" class="form-control" value="<?php echo $row['creview_details']; ?>" name="txtreviewdetails">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext">Creview Postedby </label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtpostedby" value="<?php echo $row['creview_postedby']; ?>">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Creview Postedon</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtpostedon" value="<?php echo $row['creview_postedon']; ?>">
                                            </div>
											 
											 <div class="form-group">
                                                <label for="inputtext"> Rating</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtrating" value="<?php echo $row['c_rating']; ?>">
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
           
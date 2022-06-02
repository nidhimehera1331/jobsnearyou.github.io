<?php 
ob_start();
include('header.php'); ?> 
<?php
include('connect.php');
$id=$_GET['id'];
$query="select * from companies where comp_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	
	$name=$_POST['txtcomp_name'];
	
	$location=$_POST['txtcomplocation'];
	
	$size=$_POST['txtsize'];
	
	$desc=$_POST['txtdesc'];
	$website=$_POST['txtwebsite'];
	
	$id=$_GET['id'];
	$query_upd="update companies set comp_name='$name',comp_location='$location',comp_size='$size',comp_desc='$desc',comp_website='$website' where comp_id=$id";
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:managecompany.php");
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
                                    <h5 class="card-header">Edit Companies</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                            <div class="form-group">
                                                <label for="inputtext">Comp Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcomp_name" value="<?php echo $row['comp_name']; ?>">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Comp Location</label>
                                                <input id="inputText4" type="text" class="form-control" value="<?php echo $row['comp_location']; ?>" name="txtcomplocation">
                                            </div>
                                           
											
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Comp Size</label>
                                                <input id="inputText4" type="text" class="form-control" value="<?php echo $row['comp_size']; ?>" name="txtsize">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Comp Description</label>
                                                <input id="inputText4" type="text" class="form-control" value="<?php echo $row['comp_desc']; ?>" name="txtdesc">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Comp Website</label>
                                                <input id="inputText4" type="text" class="form-control" value="<?php echo $row['comp_website']; ?>" name="txtwebsite">
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
           
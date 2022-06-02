<?php 
ob_start();
include('header.php');
include('connect.php');
 ?> 
<?php
if(isset($_POST['btnedit']))
{
	
	
	$name=$_POST['txtname'];
	$location=$_POST['txtlocation'];
	
	$size=$_POST['txtsize'];
	$desc=$_POST['txtdesc'];
	$web=$_POST['txtwebsite'];
	
	
	$query_upd="insert into  companies(comp_name,comp_location,comp_size,comp_desc,comp_website) values('$name','$location','$size','$desc','$web')";

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
                                    <h5 class="card-header">Add Company</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                            <div class="form-group">
                                                <label for="inputtext">Comp Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtname" >
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Comp Location</label>
                                                <input id="inputText4" type="text" class="form-control" name="txtlocation">
                                            </div>
                                           
											
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Comp Size</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtsize">
                                            </div>
											
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Comp Description</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtdesc">
                                            </div>
											<div class="form-group">
                                                <label for="inputText4" class="col-form-label">Comp Website</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtwebsite">
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
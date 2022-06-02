<?php 
ob_start();
include('header.php');


if(isset($_POST['btnedit']))
{
	$emp=$_POST['txtemp'];
	$postedby=$_POST['txtpostedby'];
	$postedon=$_POST['txtpostedby'];
	$testimonials=$_POST['txttestimonials'];
	
	
	
	
	$query_upd="insert into  testimonials (emp_id,testimonial,postedby,postedon) values('$emp','$testimonials','$postedby','$postedon')";

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
                                    <h5 class="card-header">Add Testimonials</h5>
                                    <div class="card-body">
                                        <form method="post">
                                            
                                           
											 <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Employer Id</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtemp">
                                            </div>
											<div class="form-group">
                                                <label for="inputtext">Testimonial</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txttestimonials" >
                                            </div>
                                            <div class="form-group">
                                                <label for="inputtext"> Postedby</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtpostedby" >
                                            </div>
											<div class="form-group">
                                                <label for="inputtext"> Postedon</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtpostedon" >
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
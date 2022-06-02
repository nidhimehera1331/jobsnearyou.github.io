<?php include('header.php'); ?>
        <div class="container-fluid mb-5 wow fadeIn bg-white" data-wow-delay="0.1s" style="padding: 35px;">
	<div class="text-center mb-5 pb-3">	
<h2 >Find A Jobs</h2>
</div>

            <div class="container">
			<form method="post" >
                <div class="row g-2">
                    <div class="col-md-10 ps-5">
                        <div class="row g-2 justify-content-center ms-5 ps-5">
						 
                            <div class="col-md-5">
                                <input type="text" class="form-control bg-light" name="txtsearch" placeholder="Find Jobs" />
                            </div>
                          <div class="col-md-5">
                                <input type="text" class="form-control bg-light" name="txtlocation" placeholder="Location" />
                            </div>
                            <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100"  name="btnsearch">Search</button>
                    </div>
                        </div>
                    </div>
                    
                </div>
				</form>
            </div>
			<div class="container-xxl py-5">
            <div class="container">
             
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    
                    <div class="tab-content">
					
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row">
				<?php
					if(isset($_POST['btnsearch']))
					{
						$searchtxt=$_POST['txtsearch'];
						$location=$_POST['txtlocation'];
							if(isset($_POST['txtsearch']) && !empty($_POST['txtsearch']))
							{
					 $query="select * from jobs where job_name like '%$searchtxt%'";
							}else if(isset($_POST['txtlocation']))
							{
								$query="select * from jobs where job_location like '%$location%'";
							}
					 $res=mysqli_query($con,$query) ;
					while( $row=mysqli_fetch_array($res))
					{
					?>
			
							
							<div class="job-item p-4 mb-4">
							
                                <div class="row g-4">
								
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        
                                        <div class="text-start ps-4">
											<h5 class="mb-3 text-start"><a href="jobdetail.php?id=<?php echo $row['job_id']; ?>"><?php echo $row['job_name']; ?></a></h5>
											
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['job_location']; ?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['job_type']; ?></span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['salary']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            
                                            <a class="btn btn-primary" href="">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i><?php echo $row['job_postedon']; ?></small>
                                    </div>
                                </div>
								
                            </div>
							<?php
					}
					}
					?>
                            </div>
                          
                            
                            
                                   
                                </div>
                            </div>
							
                         
                            
                        </div>
                        
                                </div>
                            </div>
							
                          
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
		
     <?php include('footer.php'); ?>

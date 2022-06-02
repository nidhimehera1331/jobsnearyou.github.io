<?php include('header.php');

function timeAgo($time_ago){
$cur_time 	= time();
$time_elapsed 	= $cur_time - $time_ago;
$seconds 	= $time_elapsed ;
$minutes 	= round($time_elapsed / 60 );
$hours 		= round($time_elapsed / 3600);
$days 		= round($time_elapsed / 86400 );
$weeks 		= round($time_elapsed / 604800);
$months 	= round($time_elapsed / 2600640 );
$years 		= round($time_elapsed / 31207680 );
// Seconds
if($seconds <= 60){
	echo "$seconds seconds ago";
}
//Minutes
else if($minutes <=60){
	if($minutes==1){
		echo "one minute ago";
	}
	else{
		echo "$minutes minutes ago";
	}
}
//Hours
else if($hours <=24){
	if($hours==1){
		echo "an hour ago";
	}else{
		echo "$hours hours ago";
	}
}
//Days
else if($days <= 7){
	if($days==1){
		echo "yesterday";
	}else{
		echo "$days days ago";
	}
}
//Weeks
else if($weeks <= 4.3){
	if($weeks==1){
		echo "a week ago";
	}else{
		echo "$weeks weeks ago";
	}
}
//Months
else if($months <=12){
	if($months==1){
		echo "a month ago";
	}else{
		echo "$months months ago";
	}
}
//Years
else{
	if($years==1){
		echo "one year ago";
	}else{
		echo "$years years ago";
	}
}
}?>
        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
			<?php 							$id=$_GET['id'];
											$queryp="select * from category where cat_id=$id";
											$resp=mysqli_query($con,$queryp);
											$rowp=mysqli_fetch_array($resp);
											?>
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s"><?php echo $rowp['cat_name']; ?> Jobs</h1>
				<?php
					$id=$_GET['id'];
					 $queryc="select * from jobs where cat_id=$id";
					 $resc=mysqli_query($con,$queryc);
					 $countc=mysqli_num_rows($resc);
					 
				?>
					
					<h5><?php echo $countc; ?> Results Found  in  <span class="text-primary"> <?php  echo $rowp['cat_name'];  ?> </span></h5>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    
                    <div class="tab-content">
					<div class="row ">
								<div class="col-lg-3 shadow-sm">
				
				 <?php  include('sidebar.php');?>
				 
				</div>
				<div class="col-lg-9 ">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row">
							<?php
					$id=$_GET['id'];
				$query="select * from jobs where cat_id=$id";
				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res))
				{
				?>
                            
							
							
							
							<div class="job-item p-4 mb-4 shadow">
							
                                
                                
                                
                                <div class="row g-4">
								
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        
                                        <div class="text-start ps-4">
											<h5 class="mb-3 text-start"><a href="jobdetail.php?id=<?php echo $row['job_id']; ?>"><?php echo $row['job_name']; ?></a></h5>
											
											<span><b>Category:</b> <?php echo $rowp['cat_name']; ?></span><br/><br/>
											

											
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['job_location']; ?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['job_type']; ?></span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['salary']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            
						<?php 
						$vac=$row['vacancy'];
						
						if( $vac==0){ ?>
						
						
						<p><button class="btn-outline-success p-1" type="button">No Vacancy Available Here</button></p>
						<?php
						}
					else
							{
						?>
                                            <a class="btn btn-primary" href="applyjob.php?id=<?php echo $row['job_id'] ?>">Apply Now</a>
											<?php 
												}
					?>
                                        </div>
										<?php  $start=$row['job_postedon'];?>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i><?php $time_ago =strtotime($start);
  echo timeAgo($time_ago);  ?></small>
                                    </div>
                                </div>
                                </div>
								<?php
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
            </div>
        </div>
        <!-- Jobs End -->
<?php include('footer.php');?>


        
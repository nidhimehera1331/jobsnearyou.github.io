
<?php 
ob_start();
include('header.php'); 
$id=$_GET['id'];
$query="select * from jobs where job_id=$id";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
$catid=$row['cat_id'];

$empid=$row['job_postedby'];

$queryc="select * from companies where comp_id=(select comp_id from employer where emp_id=$empid)";
$resc=mysqli_query($con,$queryc);
$rowc=mysqli_fetch_array($resc);



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

?>

        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row ">
                
                <div class="col-lg-3 shadow-sm">
				
				 <?php  include('sidebar.php');?>
				 
				</div>
                <div class="col-lg-9 shadow-sm">
				<div class="row ">
                        <div class="col-lg-6 mb-5">
                    
                        <div class="d-flex  mb-5">
                           
                            <div class="">
							
                              
                                											<h5 class="mb-3 text-start"><a href="jobdetail.php?id=<?php echo $row['job_id']; ?>"><?php echo $row['job_name']; ?></a></h5>
											<span><b>Company:</b> <?php echo $rowc['comp_name']; ?></span><br/><br/>
											<?php
											$postedby=$row['job_postedby'];
											$querye="select * from employer where emp_id=$postedby";
											$rese=mysqli_query($con,$querye);
											$rowe=mysqli_fetch_array($rese);
											?>
											
											<a href="empdetails.php?id=<?php echo $rowe['emp_id']; ?>"><span><b>Postedby:</b> <?php echo $rowe['first_name']; ?> <?php echo $rowe['last_name']; ?></span></a><br/><br/>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['job_location']; ?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['job_type']; ?></span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['salary']; ?></span>
                            </div>
                        </div>

                        
                            <h4 class="mb-3">Job description</h4>
                            <p><?php echo $row['job_desc'];  ?></p>
                            <h4 class="mb-3">Job Benefits</h4>
                           <p><?php echo $row['job_benefits'];  ?></p>
                            
                            <h4 class="mb-3">Qualifications</h4>
                                                      <p><?php echo $row['qualification'];  ?></p>
                           
                        </div>
						
						<div class="col-lg-6">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Schedule</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: <?php echo $row['job_postedon'];  ?></p>
                            
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: <?php echo $row['job_type'];  ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: <?php echo $row['salary'];  ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: <?php echo $row['vacancy'];  ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location:<?php echo $row['job_location'];  ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Experience:<?php echo $row['experience'];  ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Plan Date:<?php echo $row['plan_date'];  ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Schedule:<?php echo $row['job_schedule'];  ?></p>
                            
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
							
                            <h5 class="mb-3 text-start"><a href="compdetail.php?id=<?php echo $rowc['comp_id']; ?>"><?php echo $rowc['comp_name']; ?></a></h5>
                            <p class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $rowc['comp_location'];?> </p> 
							<p><b>About:</b> <?php echo substr($rowc['comp_desc'],0,200);  ?>...</P>
							</p>
                        </div>
						</div>
						</div>
						</div>
						</div>
                    
              
          
        </div>
		</div>
		
		
		</section>
		
		<?php 							$id=$_GET['id'];
											$queryp="select * from category where cat_id=$id";
											$resp=mysqli_query($con,$queryp);
											$rowp=mysqli_fetch_array($resp);
											?>
			<div class="row m-5">
			<div class="col-lg-7 text-start">
                <h1 class="wow fadeInUp" data-wow-delay="0.1s" > Related Jobs</h1>
			</div>
			<div class="col-lg-5 text-end">
				<form method="post"><button class="btn btn-primary btn-lg fs-4" name="btnjob">+</button></form>
				</div><hr/>
				</div>
				<?php
                    if(isset($_POST['btnjob']))	
					{					
				?>
						<div class="col-lg-11 mx-auto">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row">
							<?php
					$catid=$row['cat_id'];
				$querym="select * from jobs where cat_id=$catid";
				$resm=mysqli_query($con,$querym);
				while($rowm=mysqli_fetch_array($resm))
				{
				?>
                            
							
							
							
							<div class="job-item p-4 mb-4 shadow">
							
                                
                                
                                
                                <div class="row g-4">
								
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        
                                        <div class="text-start ps-4">
											<h5 class="mb-3 text-start"><a href="jobdetail.php?id=<?php echo $rowm['job_id']; ?>"><?php echo $rowm['job_name']; ?></a></h5>
											
											

											
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $rowm['job_location']; ?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $rowm['job_type']; ?></span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $rowm['salary']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            
                                            <a class="btn btn-primary" href="applyjob.php?id=<?php echo $rowm['job_id'] ?>">Apply Now</a>
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
							<?php
					}
							?>



        <!-- Job Detail End -->
<?php include('footer.php');
ob_flush();
 ?>



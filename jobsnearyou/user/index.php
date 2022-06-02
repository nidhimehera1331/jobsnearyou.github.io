<?php include('header.php'); 

function timeAgo($time_ago)
{
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
}
?>


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That You Deserved</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">We're looking to grow our teams with people who share our energy and enthusiasm for creating the best experience for job seekers and employers.</p>
                                    <a href="searchjobs.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">We're looking to grow our teams with people who share our energy and enthusiasm for creating the best experience for job seekers and employers.</p>
                                    <a href="searchjobs.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Search Start -->
        <div class="container-fluid bg-white pt-3  wow fadeIn" data-wow-delay="0.1s" >
                   <div class=" wow fadeIn" data-wow-delay="0.1s">
	<div class="text-center">	

</div>

            
            <div class="container">
			<form method="post" >
                <div class="row g-2">
                    <div class="col-md-10 ps-5 ms-3">
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
			<div class="container-xxl py-2">
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
                                            
                                            <a class="btn btn-primary" href="applyjob.php">Apply Now</a>
                                        </div>
                                        <?php  $start=$row['job_postedon'];?>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i><?php $time_ago =strtotime($start);
  echo timeAgo($time_ago);  ?></small>
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
        <!-- Search End -->


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
                <div class="ps-5 ">
                <div class="row g-4 ps-5 ">
				<?php
				$query="select * from category";
				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res))
				{
				?>
			
                    <div class="col-lg-2 col-sm-6 shadow-sm me-2 ms-5 rounded p-4 text-center" data-wow-delay="0.1s">
                      
                           <a href="joblist.php?id=<?php echo $row['cat_id']; ?>"><img  src="<?php echo $row['cat_image']; ?>" class="img-fluid rounded-circle mb-3" style="width:70px;height:70px;"/>

                            
                        </a>
						<h6 class="mb-3 "><a href="joblist.php?id=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a></h6>
                    </div>
                   
                    <?php
				}
				?>
                </div>
				
            </div>
            </div>
        </div>
        <!-- Category End -->


       

        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                
                     <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Jobs</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    
                    <div class="tab-content">
					
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row">
							<?php
					
				$query="select * from jobs";
				$res=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($res))
				{
				?>
                            
							
							
							
							<div class="job-item p-4 mb-4 shadow">
							
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
        <!-- Jobs End -->


        <!-- Testimonial Start -->
      <div class="container-xxl py-5 wow fadeInUp bg-white" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="text-center mb-5">Our Users Say!!!</h1>
                <div class="owl-carousel testimonial-carousel">
				<?php
					$query="select t.*,u.* from testimonials t join users u on t.postedby=u.reg_id";
					 $res=mysqli_query($con,$query);
					while( $row=mysqli_fetch_array($res))
					{
					?>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p><?php echo substr($row['testimonial'],0,150) ?></p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="<?php echo $row['user_profile'] ?>" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1"><?php echo $row['first_name']; ?></h5>
                                <small><?php echo $row['postedon']; ?></small>
                            </div>
                        </div>
                    </div>
                 <?php 
					}
					?> 

                </div>
				
            </div>
        </div>
        <!-- Testimonial End -->
   <?php include('footer.php'); ?>     

  
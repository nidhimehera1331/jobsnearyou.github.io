  <?php 
  ob_start();
  include('header.php');
 $cid=$_GET['id'];
$query="select * from companies where comp_id=$cid";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);

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
} 
?>
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container ">
                <div class="row">
                        
						<div class="col-lg-6">
                       
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
							
                            <h3 class="mb-3 text-start"><?php echo $row['comp_name']; ?></h3>
                            <p class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['comp_location'];  ?></p><br/>
                           
                            <p class="m-0"><b>Company Size: </b><?php echo $row['comp_size'];  ?></p><br/>
							 <p class="m-0"><b>Founded On: </b><?php echo $row['comp_foundedon'];  ?></p><br/>
                            <p class="m-0"><b>Our Website: </b><a href="#"><?php echo $row['comp_website'];  ?></a></p><br/>
							<h3>About Company</h3><hr/>
                            <p class="m-0"><?php echo $row['comp_desc'];  ?></p>
                        </div>
										
						</div>
						
						
							<div class="col-lg-6"  >
								<h3 class="tab-title pb-4">Company Review <a href="reviewform.php?id=<?php echo $row['comp_id']; ?>" class="btn btn-primary ms-3"> +Add Your Review</a>
</h3>
								<div class="product-review">
	<?php
					$id=$_GET['id'];
					 $queryp="select r.* ,u.* from compreviews r join users u on r.creview_postedby=u.reg_id where comp_id=$id";
					 $resp=mysqli_query($con,$queryp);
					while( $rowp=mysqli_fetch_array($resp))
					{
						
$rating=$rowp['c_rating'];
					?>
									<div class="row mb-4">
									<div class="col-lg-3 text-center">
										<!-- Avater -->
										<img src="<?php echo $rowp['user_profile']; ?>" alt="avater" style="height:80px;width:80px; " class="rounded-circle img-fluid">
																						<h5><?php echo $rowp['first_name']; ?> <?php echo $rowp['last_name']; ?></h5>
<?php  $start=$rowp['creview_postedon'];?>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i><?php $time_ago =strtotime($start);
  echo timeAgo($time_ago);  ?></small>
							
											</div>
										<div class="col-lg-9">
															<!-- Ratings -->
											<div class="ratings">
												<ul class="list-inline">
													<?php  
for($i=1;$i<=$rating;$i++)
{ 

?>
												<li class="list-inline-item">
				
				<i class="fa fa-star text-danger"></i>
													</li>

<?php
}
?>
												</ul>
											</div>
												
											
												
											

												<span >Interview Difficulty Level:<?php echo $rowp['int_difficulty']; ?>/5</span><br/>
											
												
												 <span><?php echo $rowp['int_processtime']; ?> takes from the beginning of the interview process until received a job offer</span><br/>
												
											
													 <span>Interview Activity: <?php echo $rowp['int_activity']; ?></span>
													 <br/>
												
											</div>
										</div>
									
<?php

}
?>

									</div><hr/>
								</div>
							</div>
						</div>
                    
               
          
        </div>
		
		
<?php 
ob_flush();
include('footer.php'); 
  

?>
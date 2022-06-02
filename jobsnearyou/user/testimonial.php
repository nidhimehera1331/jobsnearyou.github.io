
        

<?php
 include('header.php');
ob_start(); ?>
        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
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

 <?php include('footer.php');
ob_flush();
 ?>
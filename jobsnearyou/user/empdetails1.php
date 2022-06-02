
<?php include('header.php');
ob_start();
$id=$_GET['id'];
$query="select * from employer where emp_id=$id";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
?>
<div class="container">
    <div class="team-single">
        <div class="row">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img text-center">
                    <img src="<?php echo $row['emp_profile'];?>" class="rounded-circle mt-5 " width="150px"  alt="">
                </div>
                <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600" > <?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h4>
                    <p class="sm-width-95 sm-margin-auto"> <?php echo $row['email_id'];?></p>
                  
                </div>
            </div>
		
            <div class="col-lg-8 col-md-7 mt-5">
                <div class="team-single-text padding-50px-left sm-no-padding-left">
                    <h4 class="font-size38 sm-font-size32 xs-font-size30"> Employer Details</h4>
                   
                    <div class="contact-info-section margin-40px-tb ">
					<div class="">
                                  
                                        <p class="margin-10px-left text-yellow"><?php echo $row['about'];?></p>
                                    </div>
                        <ul class="list-style9 no-margin">
                            
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-gem text-yellow"></i>
                                        <strong class="margin-10px-left text-yellow">Experience:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $row['experience'];?></p><br/>
                                    </div>
                                </div>

                            </li>
                            
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-map-marker-alt text-green"></i>
                                        <strong class="margin-10px-left text-green">Address:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $row['address'];?></p><br/>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-mobile-alt text-purple"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-purple">Phone:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $row['phone'];?></p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-envelope text-pink"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $row['email_id'];?></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                   
                    </div>

                </div>
            </div>

            
					<div class="shadow-sm p-3">
								<h3 class="tab-title text-uppercase text-primary text-decoration-underline mb-4">Testimonials<a href="patienttest.php?id=<?php echo $row['doctorid']; ?>" class="btn btn-primary ms-4">+ Add Your Testimonial</a></h3><hr/>
								<div class="p-3">
								<div class="row">
								<div class="col-lg-8">
								
	<?php
					$id=$_GET['id'];
					 $queryp="select r.* ,p.* from testimonials r join users p on r.postedby=p.reg_id where emp_id=$id";
					 $resp=mysqli_query($con,$queryp);
					while( $rowp=mysqli_fetch_array($resp))
					{
						

					?>
									<div class="row ">
									<div class="col-lg-2">
										
										<img src="<?php echo $rowp['user_profile']; ?>" alt="avater" class="img-fluid rounded-circle " style="width:100px;height:100px;">
									</div>
										<div class="col-lg-9">
											
											
											<div class="name">
												<h5><?php echo $rowp['first_name']; ?></h5>
											</div>
											<div class="date">
												<p>	<?php echo $rowp['postedon']; ?></p>
											</div>
										
											<div class="review-comment">
												<p>
													<?php echo $rowp['testimonial']; ?>
												</p>
											</div>
										</div>
									</div><br/>

									<?php

									}
									?>
									</div>
									
									</div>
								</div>
							</div>
	</div>
	<!-- Container End -->
</section>
<?php include('footer.php'); ?>
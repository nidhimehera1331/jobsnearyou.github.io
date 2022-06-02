<?php
ob_start();
 include('uheader.php');

session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
{
	header("location:login.php");
}


 ?>

<div class="container">


				<div class="p-3">
								<div class="row">
								<h3 class="mt-3 text-primary text-uppercase text-decoration-underline">Messages</h3>
								<div class="col-lg-6">
								<h4 class="mt-3 mb-3 text-primary ">My Messages</h4>
					<?php
					$uid=$_SESSION['id'];
					  $querye="select msg.*,emp.* from user_msg msg join employer emp on msg.msg_sender=emp.emp_id where msg_receiver=$uid" ;
					 $rese=mysqli_query($con,$querye);
					while( $rowe=mysqli_fetch_array($rese))
					{
						

					?>
									<div class="row">
									<div class="col-lg-2">
										
										<a href="umessage.php"><img src="<?php echo $rowe['emp_profile']; ?>" alt="avater" class="img-fluid rounded-circle ms-2" style="width:80px;height:80px;"></a>
									</div>
										<div class="col-lg-6">
											
											
											<div class="name">
												<h5><?php echo $rowe['first_name']; ?> <?php echo $rowe['last_name']; ?></h5>
											</div>
											
											<div class="review-comment">
												
													<?php echo $rowe['subject']; ?>
												
											</div>
											<div class="review-comment">
												
													<?php echo $rowe['msg']; ?>
																							</div>
											<div class="date">
													<?php echo $rowe['msg_postedon']; ?>
											</div>
						<a href="userreply.php?id=<?php echo $rowe['msg_sender'] ?>" class="mb-3">Reply</a>
					</div>
					</div><br/>
					<?php
					}?>
					</div>
						<div class="col-lg-6 ps-5">
								<h4 class="mt-3 mb-3 text-primary">My Replies</h4>
					<?php
					$uid=$_SESSION['id'];
					$querys="select m.*,e.* from emp_msg m join employer e on m.msg_receiver=e.emp_id where msg_sender=$uid order by emp_msgid desc" ;
					
					 $ress=mysqli_query($con,$querys);
					while($rows=mysqli_fetch_array($ress))
					{
						

					?>
					
									<div class="row">
									
										<div class="col-lg-12">
											
											
											<div class="name">
												<h5>My Reply to <?php echo $rows['first_name']; ?> <?php echo $rows['last_name']; ?></h5>
											</div>
											
											<div class="review-comment">
												
													<?php echo $rows['subject']; ?>
												
											</div>
											<div class="review-comment">
												
													<?php echo $rows['msg']; ?>
																							</div>
											<div class="date">
												<p>	<?php echo $rows['msg_postedon']; ?></p>
											</div>
						
					</div>
					</div><br/>
					<?php
					}?>
					</div>
					</div>
					</div>
					

</div>
<?php include('footer.php'); 
ob_flush();
?>

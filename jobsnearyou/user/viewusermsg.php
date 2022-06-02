<?php
ob_start();
 include('eheader.php');

session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
{
	header("location:login.php");
}
if(isset($_POST['btnadd'])) 
{

	$msg=$_POST['txtmsg'];
	$sub=$_POST['txtsub'];
	$id=$_GET['id'];
	$msgr=$_GET['id'];
	$id=$_SESSION['id'];
	
	$query_upd="insert into message(msg_sender,msg_receiver,subject,msg) values($id,'$msgr','$sub','$msg')";
	
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:msg.php?id=$msgr");
	}
	else
	{
		echo "Error while adding data".mysqli_error($con);
	}
}

 ?>

<div class="row">


				<div class="p-3">
								<div class="row">
								<div class="col-lg-6">
								
					<?php
					$id=$_GET['id'];
					 $querye="select m.* ,u.* from message m join users u on m.msg_sender=u.reg_id" ;
					 $rese=mysqli_query($con,$querye);
					while( $rowe=mysqli_fetch_array($rese))
					{
						

					?>
									<div class="row">
									<div class="col-lg-2">
										
										<a href="employermsg.php"><img src="<?php echo $rowe['user_profile']; ?>" alt="avater" class="img-fluid rounded-circle ms-2" style="width:80px;height:80px;"></a>
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
												<p>	<?php echo $rowe['msg_postedon']; ?></p>
											</div>
						
					</div>
					</div>
					<?php
					}?>
					</div>
					</div>
					

</div>
<?php include('footer.php'); 
ob_flush();
?>

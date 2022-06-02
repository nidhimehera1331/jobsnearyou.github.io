<?php 
ob_start();
include('header.php'); 
$id=$_GET['id'];
$query="select * from products where pro_id=$id";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
$catid=$row['pro_catid'];

session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
{
	
}
$msg="";
if(isset($_POST['btnreview']))
{
	

	$rating=$_POST['ddlrating'];
	$subject=$_POST['txtsubject'];
	$review=$_POST['txtreview'];
	$pid=$_GET['id'];
	$uid=$_SESSION['id'];
	
	

	$query="insert into reviews(subject,review,rating,posted_by,productid) values('$subject','$review',$rating,$uid,$pid)";

	$res=mysqli_query($con,$query);//True/False
	if($res)
	{
		$msg= "reveiwe Posted successfully";
	}
	else
	{
		$msg= "Error while posting review.Pls try again later".mysqli_error($con);
	}

}
if(isset($_POST['btncart']))
{
	session_start();
	$id=$_SESSION['id'];
	$pid=$_GET['id'];
	if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
	{
		header("location:login.php");
	}
	$querys="select * from cart where user_id=$id  and product_id=$pid";
	$resc=mysqli_query($con,$querys);
	$count=mysqli_num_rows($resc);
	
	$qty=$_POST['txtqty'];
	$pid=$_GET['id'];
	$userid=$_SESSION['id'];
	$price=$row['pro_price'];
	$total=$row['pro_price'] * $qty;
	
	if($count==0)
	{
		$query="insert into cart(quantity,total_price,price,user_id,product_id) values($qty,$total,$price,$userid,$pid)";

		$res=mysqli_query($con,$query);//True/False
		if($res)
		{
		
			header("location:cart.php");
		}
		else
		{
			$msg= "Error while posting product.Pls try again later".mysqli_error($con);
			echo $msg;
		}
	}else
	{
		echo "bye";
		$query="update  cart set quantity=quantity+$qty,total_price=$total where user_id=$id  and product_id=$pid ";

		$res=mysqli_query($con,$query);//True/False
		if($res)
		{
			header("location:cart.php");
		}
		else
		{
			$msg= "Error while posting product.Pls try again later".mysqli_error($con);
			echo $msg;
		}
	}
}



?>
<style>
.product-slider .slick-dots li img {
    width: 120px;
    height: 97px;
    margin-bottom: 60px;
}
.product-slider .slick-dots li {
    display: inline-block;
    width: 22% !important;
    height: 100%;
    padding-left: 0;
    margin-right: 10px;
}
.product-slider .slick-dots {
    display: flex;
    bottom: -113px;
    left: 98px;
}


.product-review .media-body {
padding:0 !important;
}
</style>

<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title"><?php echo $row['pro_name'];  ?></h1>
					<div class="product-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">Andrew</a></li>
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="">Electronics</a></li>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="">Dhaka Bangladesh</a></li>
						</ul>
					</div>

					<!-- product slider -->
					<div class="product-slider">
						<div class="product-slider-item my-4" data-image="<?php echo $row['pro_img1'];  ?>">
							<img class="img-fluid w-100" src="<?php echo $row['pro_img1'];  ?>" alt="product-img" style="">
						</div>
						<div class="product-slider-item my-4" data-image="<?php echo $row['pro_img2'];  ?>">
							<img class="d-block img-fluid w-100" src="<?php echo $row['pro_img2'];  ?>" alt="Second slide">
						</div>
						<div class="product-slider-item my-4" data-image="<?php echo $row['pro_img3'];  ?>">
							<img class="d-block img-fluid w-100" src="<?php echo $row['pro_img3'];  ?>" alt="Third slide">
						</div>
						
					</div>
					<!-- product slider -->

					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">Product Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
								 aria-selected="false">Specifications</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
								 aria-selected="false">Reviews</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Description</h3>
								<p><?php echo $row['pro_desc'];  ?></p>

								
								
							</div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Product Specifications</h3>
								<table class="table table-bordered product-table">
									<tbody>
										<tr>
											<td>Seller Price</td>
											<td>$450</td>
										</tr>
										<tr>
											<td>Added</td>
											<td>26th December</td>
										</tr>
										<tr>
											<td>State</td>
											<td>Dhaka</td>
										</tr>
										<tr>
											<td>Brand</td>
											<td>Apple</td>
										</tr>
										<tr>
											<td>Condition</td>
											<td>Used</td>
										</tr>
										<tr>
											<td>Model</td>
											<td>2017</td>
										</tr>
										<tr>
											<td>State</td>
											<td>Dhaka</td>
										</tr>
										<tr>
											<td>Battery Life</td>
											<td>23</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Product Review</h3>
								<div class="product-review">
	<?php
					$id=$_GET['id'];
					 $queryp="select r.* ,u.* from reviews r join register u on r.posted_by=u.reg_id where productid=$id";
					 $resp=mysqli_query($con,$queryp);
					while( $rowp=mysqli_fetch_array($resp))
					{
						
$rating=$rowp['rating'];
					?>
									<div class="media">
										<!-- Avater -->
										<img src="<?php echo $rowp['profile_pic']; ?>" alt="avater">
										<div class="media-body">
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
											<div class="name">
												<h5><?php echo $rowp['first_name']; ?></h5>
											</div>
											<div class="date">
												<p>	<?php echo $rowp['posted_on']; ?></p>
											</div>
<div class="name">
												<h5><?php echo $rowp['subject']; ?></h5>
											</div>
											<div class="review-comment">
												<p>
													<?php echo $rowp['review']; ?>
												</p>
											</div>
										</div>
									</div>

<?php

}
?>
									<div class="review-submission">
										<h3 class="tab-title">Submit your review</h3>
										<!-- Rate -->
										<div class="rate">
											<div class="starrr"></div>
										</div>
										<div class="review-submit">
											<form method="post" class="row">
												<div class="col-lg-12">
													<select name="ddlrating" id="name" class="form-control">
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
</select></div>

<div class="col-lg-12">
													<input type="text" name="txtsubject" id="name" class="form-control" placeholder="Subject">
						</div>						
												<div class="col-12">
													<textarea name="txtreview" id="review" rows="6" class="form-control" placeholder="Review"></textarea>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-main" name="btnreview">Sumbit</button>
<?php
	if(!empty($msg)&& $msg!="")
{
	echo "<p class='alert alert-danger mt-3'>$msg</p>";
}
?>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center">
						<h4>Price</h4>
						<p>Rs.<?php echo $row['pro_price'];  ?></p>
					</div>
					<!-- User Profile widget -->
					<div class="widget user text-center">
					
					
						<ul class="list-inline mt-20">
							
							<li class="list-inline-item"><form method="post">
								<p>Qty: <input type="number" min="1" value="1" name="txtqty" class=" w-25 h-25 "/></p>
								<button type="submit"  class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3" name="btncart">Add To Cart</button>
</form></li>
						</ul>
					</div>
					
					<!-- Rate Widget -->
					<div class="widget rate">
						<!-- Heading -->
						<h5 class="widget-header text-center">What would you rate
							<br>
							this product</h5>
						<!-- Rate -->
						<div class="starrr"></div>
					</div>
					<!-- Safety tips widget -->
					<div class="widget disclaimer">
						<h5 class="widget-header">Safety Tips</h5>
						<ul>
							<li>Meet seller at a public place</li>
							<li>Check the item before you buy</li>
							<li>Pay only after collecting the item</li>
							<li>Pay only after collecting the item</li>
						</ul>
					</div>
					<!-- Coupon Widget -->
					<?php
						include('sidebar.php');
						?>

				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Similar Products</h2>
					
				</div>
			</div>
		</div>
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide">
					<?php
					 $queryp="select * from products where pro_catid=$catid";
					 $resp=mysqli_query($con,$queryp);
					while( $rowp=mysqli_fetch_array($resp))
					{
					?>
					<div class="col-sm-12 col-lg-4">
						<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="productdetail.php?id=<?php echo $rowp['pro_id'];  ?>">
				<img class="card-img-top img-fluid" src="<?php echo $rowp['pro_img1'];  ?>" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="productdetail.php?id=<?php echo $rowp['pro_id'];  ?>"><?php echo $rowp['pro_name'];  ?></a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="productdetail.php?id=<?php echo $rowp['pro_id'];  ?>"><i class="fa fa-folder-open-o"></i>Electronics</a>
		    	</li>
		    
		    </ul>
		   
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
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
</section>

<?php include('footer.php'); 
ob_flush();
?>
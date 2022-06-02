<?php include('header.php');?>
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
<?php include('footer.php');?>


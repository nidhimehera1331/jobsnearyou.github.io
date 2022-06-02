						<div class="widget category-list p-3">
	<h4 class="widget-header text-primary text-decoration-underline">All Categories</h4>
	<ul class="category-list list-unstyled">
		<?php
		 $querycat="select * from category";
		 $rescat=mysqli_query($con,$querycat);
			while( $rowcat=mysqli_fetch_array($rescat))
					{
						 $queryv="select * from jobs where cat_id=".$rowcat['cat_id'];
						 $resv=mysqli_query($con,$queryv);
						 $countv=mysqli_num_rows($resv)

				?>
			<li><div class="row  shadow-sm p-1">
			<div class="col-lg-9 text-start">
			<a href="joblist.php?id=<?php echo $rowcat['cat_id']; ?> "><?php echo $rowcat['cat_name']; ?> </a>
			</div>
			<div class="col-lg-2">
					<span >(<?php echo $countv;  ?>)</span>
			</div>
			</div>
			</li>
			<?php
			
					}
					?>
		
	</ul>
</div>
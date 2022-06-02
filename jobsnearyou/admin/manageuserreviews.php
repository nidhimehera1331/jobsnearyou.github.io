 <?php include('header.php'); ?> 
<?php
include('connect.php');
?>
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Manage UserReviews  (<a href="adduserreviews.php">+ Add UsersReviews</a>)</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                               
                                       
                                                <th>Review Heading</th>
                                                <th>Review Details</th>
                                                <th>Review Postedby</th>
                                                <th>Review Postedon</th>
                                                <th>Rating</th>
                                               
                                              								
                                                <th>Edit </th>
                                                <th>Delete </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query="select * from userreviews";
											$res=mysqli_query($con,$query);//data
											while($row=mysqli_fetch_array($res))
											{
										?>
                                            <tr>
                                          
												<td><?php echo $row['review_heading'];?></td>
												<td><?php echo $row['review_details'];?></td>
												<td><?php echo $row['review_postedby'];?></td>
												<td><?php echo $row['review_postedon'];?></td>
												<td><?php echo $row['rating'];?></td>
												
												<td><a href="edituserreviews.php?id=<?php echo $row['review_id'];?>">Edit</a> </td>
												
												<td><a href="deluserreviews.php?id=<?php echo $row['review_id'];?>">Delete</a> </td>
												
                                            </tr>
											<?php
											}
											?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
					<?php include('footer.php'); ?>
           
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
                            <h5 class="card-header">Manage Testimonials (<a href="addTestimonials.php">+ Add Testimonials</a>)</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                      
                                              
                                                <th>Employer Id</th>
												 <th>Testimonial</th>
                                                <th> Postedby</th>
                                                <th> Postedon</th>
                                               
                                               
                                              								
                                                <th>Edit </th>
                                                <th>Delete </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query="select * from testimonials";
											$res=mysqli_query($con,$query);//data
											while($row=mysqli_fetch_array($res))
											{
										?>
                                            <tr>
                                            
												<td><?php echo $row['emp_id'];?></td>
												<td><?php echo $row['testimonial'];?></td>
												<td><?php echo $row['postedby'];?></td>
												<td><?php echo $row['postedon'];?></td>
									
												
												<td><a href="edittestimonials.php?id=<?php echo $row['test_id'];?>">Edit</a> </td>
												
												<td><a href="deltestimonials.php?id=<?php echo $row['test_id'];?>">Delete</a> </td>
												
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
           
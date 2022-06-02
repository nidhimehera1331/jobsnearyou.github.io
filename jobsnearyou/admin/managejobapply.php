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
                            <h5 class="card-header">Manage JobApply  (<a href="addjobapply.php">+ Add JobApply</a>)</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                               
                                               
                                                <th>User Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Comp Id</th>
                                                <th>Apply Date</th>
                                                <th>Apply Status</th>
                                                <th>Resume Upload</th>
                                               
                                              								
                                                <th>Edit </th>
                                                <th>Delete </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query="select * from jobapply";
											$res=mysqli_query($con,$query);//data
											while($row=mysqli_fetch_array($res))
											{
										?>
                                            <tr>
                                    
												<td><?php echo $row['user_id'];?></td>
												<td><?php echo $row['name'];?></td>
												<td><?php echo $row['email'];?></td>
												<td><?php echo $row['password'];?></td>
												<td><?php echo $row['comp_id'];?></td>
												<td><?php echo $row['apply_date'];?></td>
												<td><?php echo $row['apply_status'];?></td>
												
												<td><?php echo $row['resume_upload'];?></td>
												
												<td><a href="editjobapply.php?id=<?php echo $row['apply_id'];?>">Edit</a> </td>
												
												<td><a href="deljobapply.php?id=<?php echo $row['apply_id'];?>">Delete</a> </td>
												
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
           
<?php include('header.php'); ?> 
<?php
include('connect.php');
?>
                <div class="row container-fluid">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Manage Users  (<a href="addusers.php">+ Add Users</a>)</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>User Profile</th>
                                                <th>City</th>
                                               
                                                <th>Phone</th>
                                                <th>Resume Upload</th>
                                                <th>Job Preferance</th>
                                                
                                              								
                                                <th>Edit </th>
                                                <th>Delete </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query="select * from users";
											$res=mysqli_query($con,$query);//data
											while($row=mysqli_fetch_array($res))
											{
										?>
                                            <tr>
                                          <td><?php echo $row['first_name'];?></td>
												<td><?php echo $row['last_name'];?></td>
												<td><?php echo $row['email_id'];?></td>
												<td><?php echo $row['password'];?></td>
												<td><img src="../user/<?php echo $row['user_profile']; ?>" style="width:80px;height:80px;"/></td>
												<td><?php echo $row['city'];?></td>
												
												<td><?php echo $row['phone'];?></td>
												<td><?php echo $row['resume_upload'];?></td>
												<td><?php echo $row['job_preference'];?></td>
												<td><a href="editusers.php?id=<?php echo $row['reg_id'];?>">Edit</a> </td>
												
												<td><a href="deluser.php?id=<?php echo $row['reg_id'];?>">Delete</a> </td>
												
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
           
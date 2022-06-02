<?php include('header.php'); ?> 

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Manage Admin(<a href="addadmin.php">+ Add Admin</a>)</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                
                                                <th>Admin Name</th>
                                               
                                                <th>Admin Email</th>
                                               <th>Admin Password</th>
                                                <th>Edit </th>
                                                
												
                                                <th>Delete </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query="select * from admin";
											$res=mysqli_query($con,$query);//data
											while($row=mysqli_fetch_array($res))
											{
										?>
                                            <tr>
                                               
												<td><?php echo $row['admin_name'];?></td>
												<td><?php echo $row['admin_email'];?></td>
												<td><?php echo $row['admin_pass'];?></td>
												
												<td><a href="editadmin.php?id=<?php echo $row['admin_id'];?>">Edit</a> </td>
												<td><a href="deleteadmin.php?id=<?php echo $row['admin_id'];?>">Delete</a> </td>
												
												
												
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
           
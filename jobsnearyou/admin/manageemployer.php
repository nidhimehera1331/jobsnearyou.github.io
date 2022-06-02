<?php include('header.php'); ?> 


                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Manage Employer  (<a href="addemployer.php">+ Add Employer</a>)</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                               
                                                 <th>First Name</th>
                                                <th>Last Name</th>
												<th>Email </th>
                                                <th>Password</th>
                                                <th>Phone</th>
												
                                                <th>Comp Id</th>
                                                
                                                <th>Total Employer</th>
                                                <th>Employer Profile</th>
                                                <th> Role</th>

                                                <th>Edit </th>
                                                <th>Delete </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query="select * from employer";
											$res=mysqli_query($con,$query);//data
											while($row=mysqli_fetch_array($res))
											{
										?>
                                            <tr>
                                          <td><?php echo $row['first_name'];?></td>
										  	
												<td><?php echo $row['last_name'];?></td>
												<td><?php echo $row['email_id'];?></td>
												<td><?php echo $row['password'];?></td>
												
												<td><?php echo $row['phone'];?></td>
													<td><?php echo $row['comp_id'];?></td>	
													<td><?php echo $row['total_emp'];?></td>
												<td><img src="../../user/<?php echo $row['emp_profile']; ?>" style="width:100px;height:100px;"/></td>
												<td><?php echo $row['role'];?></td>
											
											
												<td><a href="editemployer.php?id=<?php echo $row['emp_id'];?>">Edit</a> </td>
												
												<td><a href="deleteemployer.php?id=<?php echo $row['emp_id'];?>">Delete</a> </td>
												
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
           
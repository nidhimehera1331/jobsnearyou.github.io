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
                            <h5 class="card-header">Manage Jobs (<a href="addjobs.php">+ Add Jobs</a>)</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                            
                                               
                                                <th>Job Name</th>
												
                                             
                                                <th>Salary</th>
                                                <th>Job Type </th>
                                               
                                               
                                               
                                                <th>Job Location </th>
                                                <th>Job Benefits </th>
                                                <th>Job Schedule </th>
                                                <th>Plan Date </th>
                                                <th>Job Description </th>
                                                <th>Resume Upload </th>
                                                <th>Qualification </th>
                                                <th>Receive Application </th>
                                                <th>Vacancy </th>
                                                
                                                <th>Experience </th>
												
                                                <th>Edit </th>
                                                <th>Delete </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query="select * from jobs";
											$res=mysqli_query($con,$query);//data
											while($row=mysqli_fetch_array($res))
											{
										?>
                                            <tr>
                                          
												
												<td><?php echo $row['job_name'];?></td>
											
											
												<td><?php echo $row['salary'];?></td>
												<td><?php echo $row['job_type'];?></td>
												
											
											
												<td><?php echo $row['job_location'];?></td>
												<td><?php echo $row['job_benefits'];?></td>
												<td><?php echo $row['job_schedule'];?></td>
												<td><?php echo $row['plan_date'];?></td>
												<td><?php echo $row['job_desc'];?></td>
												<td><?php echo $row['resume_upload'];?></td>
												<td><?php echo $row['qualification'];?></td>
												<td><?php echo $row['receive_application'];?></td>
												<td><?php echo $row['vacancy'];?></td>
											
												<td><?php echo $row['experience'];?></td>
												<td><a href="editjobs.php?id=<?php echo $row['job_id'];?>">Edit</a> </td>
												<td><a href="deljobs.php?id=<?php echo $row['job_id'];?>">Delete</a> </td>
												
												
												
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
           
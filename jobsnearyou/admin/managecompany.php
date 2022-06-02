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
                            <h5 class="card-header">Manage companies  (<a href="addcompany.php">+ Add Companies</a>)</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                               
                                                <th>Comp Name</th>
												
                                                
                                                <th>Comp Size</th>
                                               <th>Comp Location</th>
                                               
                                                <th>Comp Desc</th>
                                                <th>Comp Website</th>
                                                
                                                
                                              								
                                                <th>Edit </th>
                                                <th>Delete </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query="select * from companies";
											$res=mysqli_query($con,$query);//data
											while($row=mysqli_fetch_array($res))
											{
										?>
                                            <tr>
                                                <td><?php echo $row['comp_name'];?></td>
									
												
												
												<td><?php echo $row['comp_size'];?></td>
												<td><?php echo $row['comp_location'];?></td>
												<td><?php echo $row['comp_desc'];?></td>
												<td><?php echo $row['comp_website'];?></td>
												
												<td><a href="compedit.php?id=<?php echo $row['comp_id'];?>">Edit</a> </td>
												
												<td><a href="compdelete.php?id=<?php echo $row['comp_id'];?>">Delete</a> </td>
												
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
           
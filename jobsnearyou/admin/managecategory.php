<?php include('header.php'); ?> 
<?php
include('connect.php');
$query="select * from "
?>
                <div class="row container-fluid">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Manage category(<a href="addcategory.php">+ Add Category</a>)</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                               
                                                <th>Cat Name</th>
                                                <th>Cat  Image</th>
                                                <th>Cat Status</th>
                                                
                                                <th>Edit </th>
												
                                                <th>Delete </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$query="select * from category";
											$res=mysqli_query($con,$query);//data
											while($row=mysqli_fetch_array($res))
											{
										?>
                                            <tr>
                                             
												<td><?php echo $row['cat_name'];?></td>
												<td><img src="../user/<?php echo $row['cat_image']; ?>" style="width:100px;height:100px;"/></td>
												<td><?php echo $row['cat_status'];?></td>
												
												<td><a href="catedit.php?id=<?php echo $row['cat_id'];?>">Edit</a> </td>
												<td><a href="catdelete.php?id=<?php echo $row['cat_id'];?>">Delete</a> </td>
												
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
           
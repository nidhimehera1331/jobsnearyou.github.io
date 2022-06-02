

<?php 
ob_start();
include('header.php'); ?> 
<?php
include('connect.php');
$id=$_GET['id'];
$query="select * from category where cat_id=$id";
$res=mysqli_query($con,$query);//data
$row=mysqli_fetch_array($res);
if(isset($_POST['btnedit']))
{
	
	$name=$_POST['txtcatname'];
	
	$imagepath="img/".$_FILES['catimage']['name'];
	$status=$_POST['txtcatstatus'];
	
	
	
	
	$id=$_GET['id'];
	$query_upd="update category set cat_name='$name',cat_image='$imagepath',cat_status='$status' where cat_id=$id";
	move_uploaded_file($_FILES['catimage']['tmp_name'],"../user/img/".$_FILES['catimage']['name']);
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:managecategory.php");
	}
	else
	{
		echo "Error while updating data";
	}
}
?>

                    
                       
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Basic Form Elements</h3>
                                   
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Edit Category</h5>
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                             <div class="form-group">
                                                <label for="inputtext">Cat Name</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcatname" value="<?php echo $row['cat_name']; ?>">
                                               
                                            </div>
											<div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Image</label></div>
                                                                    <div class="col-12 col-md-10"><input type="file" id="file-multiple-input" name="catimage" multiple="" class="form-control-file"></div>
                                                                </div>
                                             <div class="form-group">
                                                <label for="inputtext">Cat Status</label>
                                                <input id="inputtext" type="text"  class="form-control" name="txtcatstatus" value="<?php echo $row['cat_status']; ?>">
                                               
                                            </div>
											
                                          
                                          <input type="submit" value="Update" name="btnedit" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                      
                        <!-- end basic form  -->
           <?php 
		   ob_flush();
		   include('footer.php'); ?>        
            <!-- ============================================================== -->
           
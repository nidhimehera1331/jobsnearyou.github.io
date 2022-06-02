<?php 
ob_start();
 include('header.php');
include('connect.php');

if(isset($_POST['btnedit']))
{
	
	$name=$_POST['txtcatname'];
	
	$imagepath="img/".$_FILES['catimage']['name'];
	$status=$_POST['txtcatstatus'];
	
	
	
	$query_upd="insert into  category (cat_name,cat_image,cat_status) values('$name','$imagepath','$status')";
	move_uploaded_file($_FILES['catimage']['tmp_name'],"../../user/img/".$_FILES['catimage']['name']);
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:managecategory.php");
	}
	else
	{
		echo "Error while inserting data".mysqli_error($con);
	}
}
?>
       
        
       <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Basic Form Elements</h3>
                                   
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Add Category</h5>
                                    <div class="card-body">
                                          <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Cat Name</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtcatname">
                                            </div>
                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Image</label></div>
                                                                    <div class="col-12 col-md-10"><input type="file" id="file-multiple-input" name="catimage" multiple="" class="form-control-file"></div>
                                                                </div>
                                                       
                                             <div class="form-group">
                                                <label for="inputText4" class="col-form-label">Cat Status</label>
                                                <input id="inputText4" type="text" class="form-control"  name="txtcatstatus">
                                            </div>
                                          <input type="submit" value="Add" name="btnedit" class="btn btn-primary"/>
                                        </form>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                      
                      
<?php  include('footer.php');
ob_flush();
?>

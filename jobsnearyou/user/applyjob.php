
<?php
ob_start();
 include('header.php'); 

				
$msg="";

session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
{
	header("location:myjobs1.php");
}


if(isset($_POST['SubmitBtn'])) 
{
	
	$uname=$_SESSION['id'];
	
	$jobid=$_GET['id'];
	$catid=$_POST['txtcategory'];
	

	
	$query_upd="insert into jobapply (user_id,comp_id,job_id) values('$uname','$catid','$jobid')";
	
	
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		$msg= "Job Apply Successfully";
	}
	else
	{
		$msg= "Error while Apply data".mysqli_error($con);
	}
}




if(isset($_POST["SubmitBtn"])){

  $fileName=$_FILES["resume"]["name"];
  $fileSize=$_FILES["resume"]["size"]/1024;
  $fileType=$_FILES["resume"]["type"];
  $fileTmpName=$_FILES["resume"]["tmp_name"];  

  if($fileType=="application/msword"){
    if($fileSize<=200){

      //New file name
      $random=rand(1111,9999);
      $newFileName=$random.$fileName;

      //File upload path
      $uploadPath="testUpload/".$newFileName;

      //function for upload file
      if(move_uploaded_file($fileTmpName,$uploadPath)){
        echo "Successful"; 
        echo "File Name :".$newFileName; 
        echo "File Size :".$fileSize." kb"; 
        echo "File Type :".$fileType; 
      }
	  
	  $query_updx="update jobapply set resume_upload='$uploadPath' where user_id='$uname'";
	 $resx=mysqli_query($con,$query_updx);
	
    }
	
    else{
      echo "Maximum upload file size limit is 200 kb";
    }
  }
  else{
    echo "You can only upload a Word doc file.";
  }  
}

?>

  <div class=" col-lg-5 mx-auto shadow p-3 mt-5 bg-light">
  <?php
					if(!empty($msg)&& $msg!="")
								{
									echo "<p class='alert alert-success mt-3'>$msg</p>";
								}
				?>
                            <h4 class="mb-4 text-center">Apply For The Job</h4>
							
                            <form method="post" enctype="multipart/form-data">
                                
                                    
                                    
                                        <select class="form-select bg-white"  name="txtcategory">
							
							<?php
							$jobid=$_GET['id'];
						$query="select c.*,j.* from category c join jobs j on c.cat_id=j.cat_id where job_id=$jobid";
						$res=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($res))
						{
						?>
							<option value="<?php echo $row['cat_id'];   ?>"><?php echo $row['cat_name'];   ?></option>
							<?php
						}
						?>
						</select><br/>
                                   
                                     
									
                                 
                                      <form method="post" enctype="multipart/form-data" class="form-horizontal">

			 <label class="labels ">Resume Upload </label><input type="file" class=" mx-auto" value="<?php echo $row['resume_upload'];?>"name="resume" id="resume">
			 
                                                      
														
														
                                    
                                   
                                    <div class="d-grid">
							<button class="btn btn-primary mt-2 mb-3 d-grid btn-default p-2" name="SubmitBtn">Submit</button>
						</div>
                                </div>
                            </form>
                        
<?php
ob_flush();
 include('footer.php'); ?>

<?php
ob_start();
 include('uheader.php'); 

				
$msg="";
session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
{
	header("location:login.php");
}
if(isset($_POST['btnadd'])) 
{
	
	$uname=$_SESSION['id'];
	
	
$resume=$_POST['txtresume'];
	$catid=$_POST['ddlcategory'];
	$jobid=$_GET['id'];
	
	
	$query_upd="insert into jobapply (user_id,comp_id,job_id,resume_upload) values('$uname','$catid','$jobid','$resume')";
	
	
	
	$res=mysqli_query($con,$query_upd);
	if($res)
	{
		header("location:myjobs1.php");
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

  <div class=" col-lg-6 mx-auto">
                            <h4 class="mt-5 text-center">Apply For The Job</h4>
							
                            <form method="post" enctype="multipart/form-data">
                                
                                    
                                    
                                        <select class="form-select bg-white "  name="ddlcategory" style="height: 55px;">
							<option selected>Choose Category</option>
							<?php
						$query="select * from category";
						$res=mysqli_query($con,$query);
						while($row=mysqli_fetch_array($res))
						{
						?>
							
							<option value="<?php echo $row['cat_id'];   ?>"><?php echo $row['cat_name'];   ?></option>
							<?php
						}
						?>
						</select><br/>
						 <select class="form-select bg-white "  name="ddljobs" style="height: 55px;">
							<option selected>Choose Jobs</option>
							<?php
						$queryw="select * from jobs";
						$resw=mysqli_query($con,$queryw);
						while($roww=mysqli_fetch_array($resw))
						{
						?>
							
							<option value="<?php echo $roww['job_id'];   ?>"><?php echo $roww['job_name'];   ?></option>
							<?php
						}
						?>
						</select><br/>
                                    <select class="form-select bg-white"  name="ddlcategory" style="height: 55px;">
							<option selected>Choose Job Type</option>
							<option >Full Time</option>
							<option >Part Time</option>
							<option >Fresher</option>
							<option >Internship</option>
							<option >Regular/Permanent</option>
							
						</select><br/>
                                     
									
                                       
                                    
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">

			 <label class="labels ">Resume Upload </label><input type="file" class=" mx-auto" value="<?php echo $row['resume_upload'];?>"name="resume" id="resume">
			 <button type="submit" class="btn btn-primary btn-sm mt-3 p-2 ms-5 mx-auto" name="SubmitBtn">
                                                           Upload Resume
                                                        </button>
														
                                    
                                   
                                    <div class="d-grid">
							<button class="btn btn-primary mt-2 mb-3 d-grid btn-default p-2" name="btnadd">Submit</button>
						</div>
                                </div>
                            </form>
                        
<?php
ob_flush();
 include('footer.php'); ?>
<?php
ob_start();
 include('eheader.php');
 session_start();
if(!isset($_SESSION['eid']) && empty($_SESSION['eid'])) 
{
	header("location:emplogin.php");
}

$id=$_SESSION['eid'];

$query="select j.*,b.* from jobapply j join jobs b on j.job_id=b.job_id where b.job_postedby=$id";
$res=mysqli_query($con,$query);
$count=mysqli_num_rows($res);
?>

        <!-- Header-->
<style>
.ps-5 {
  padding-left: 7rem !important;
}
</style>
        
<div class="container mt-3">
	<div class="animated fadeIn">
		<div class="row p-5  shadow m-5">
		<h3 class=" main text-primary text-uppercase text-decoration-underline mb-5 ps-5 ms-5">My Jobs</h3>
		<?php
		if($count==0)
		{
			?>
				<h4 class="ps-5">No Jobs Applied</h4>
				<?php
		}
		else
		{
		?>
			<div class="col-md-9 mx-auto table-responsive">
			<table id="bootstrap-data-table-export" class="table table-striped table-bordered text-center">
				<thead>
					<tr>
						
						<th>Username</th>
						<th>Job Type</th>
						<th>Job Name</th>
						<th>Job Schedule</th>
						
						
						<th>Apply Date</th>
						<th>Resume Upload</th>
					
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				while($row=mysqli_fetch_array($res))
				{
				?>
					<tr>
					<?php
					$uid=$row['user_id'];
						$querys="select * from users where reg_id=$uid";
						$ress=mysqli_query($con,$querys);
						$rows=mysqli_fetch_array($ress);
						?>
						<td><?php echo $rows['first_name']; ?> <?php echo $rows['last_name']; ?></td>
						<td><?php echo $row['job_type']; ?></td>
						<td><?php echo $row['job_name']; ?></td>
						<td><?php echo $row['job_schedule']; ?> </td>
						<td><?php echo $row['apply_date']; ?> </td>
						<td><a href="<?php echo $rows['resume_upload']; ?>"><?php echo $rows['resume_upload']; ?></a>
						 </td>
						
						
						
						<td><?php echo $row['apply_status']; ?> </td>
						
						
						</td>
						
					</tr>
				<?php
				}
				?>
				</tbody>
                </table>    


		</div>
			<?php
				}
				?>
	</div><!-- .animated -->
</div><!-- .content -->


    </div><!-- /#right-panel -->

<?php include('footer.php');
ob_flush();
 ?>

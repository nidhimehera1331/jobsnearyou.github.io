<?php
ob_start();
 include('eheader.php');
 session_start();
if(!isset($_SESSION['eid']) && empty($_SESSION['eid'])) 
{
	header("location:emplogin.php");
}

$eid=$_SESSION['eid'];

$query="select j.*,e.*,c.* from jobs j join employer e on j.job_postedby=e.emp_id join companies c on e.comp_id=c.comp_id where job_postedby=$eid";
$res=mysqli_query($con,$query);
$count=mysqli_num_rows($res);
?>

 <style>      
.ps-5 {
  padding-left: 7.6rem !important;
}
</style>       
<div class="container mt-3">
	<div class="animated fadeIn">
		<div class="row">
		<h3 class="text-primary text-uppercase text-decoration-underline mb-5 mt-3 ps-5">View Posted Jobs</h3>
		<?php
		if($count==0)
		{
			?>
				<h4 class="ps-5">No Jobs Posted</h4>
				<?php
		}
		else
		{
		?>
			<div class="col-md-12 table-responsive mx-auto">
			<table id="bootstrap-data-table-export" class="table table-striped  table-bordered text-center ">
				<thead>
					<tr>
						
						<th>Job Name</th>
						<th>Job Type</th>
						<th>Job Schedule</th>
						<th>Qualification</th>
						<th>Job Benefits</th>
						<th>Experince</th>
						
						<th>Salary</th>
						<th>Job Location</th>
						<th>Action</th>
						
						
						
					</tr>
				</thead>
				<tbody>
				<?php 
				while($row=mysqli_fetch_array($res))
				{
				?>
					<tr>
						
						<td><?php echo $row['job_name']; ?></td>
							<td><?php echo $row['job_type']; ?></td>
						<td><?php echo $row['job_schedule']; ?> </td>
						<td><?php echo $row['qualification']; ?> </td>
						<td><?php echo $row['job_benefits']; ?> </td>
						<td><?php echo $row['experience']; ?> </td>
						
						
						
						<td><?php echo $row['salary']; ?></td>
						<td><?php echo $row['job_location']; ?> </td>
						<td>
						<div class="row">
						<div class="col-lg-5">
						<a href="editemployer.php?id=<?php echo $row['job_id'];?>" class="btn btn-primary rounded-circle"><i class="fas fa-pen " ></i></a>
</div>						
<div class="col-lg-5">
												<a href="deleteemployer1.php?id=<?php echo $row['job_id'];?>" class="btn btn-danger rounded-circle"><i class="fas fa-trash" ></i></a> 
												</div>
												</div>
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

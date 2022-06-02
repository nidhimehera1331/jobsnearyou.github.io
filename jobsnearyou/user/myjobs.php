<?php
ob_start();
 include('uheader.php');
 session_start();
if(!isset($_SESSION['id']) && empty($_SESSION['id'])) 
{
	header("location:login.php");
}

$id=$_SESSION['id'];
$query="select j.*,u.* from jobs j join users u on a.doctorid=p.doctorid where a.patientid=$id";
$res=mysqli_query($con,$query);

?>

        <!-- Header-->

        
<div class="container mt-3">
	<div class="animated fadeIn">
		<div class="row">
		<h3 class="text-primary text-uppercase text-decoration-underline mb-5">My Jobs</h3>
			<div class="col-md-12">
			<table id="bootstrap-data-table-export" class="table table-striped table-bordered text-center">
				<thead>
					<tr>
						
						<th>Appointment Type</th>
						<th>Doctor Name</th>
						<th>Appointment Date and Time</th>
						
						
						<th>Reason</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				while($row=mysqli_fetch_array($res))
				{
				?>
					<tr>
						
						<td><?php echo $row['appointmenttype']; ?></td>
						<td><?php echo $row['doctorname']; ?></td>
						<td><?php echo $row['appointmentdate']; ?> <?php echo $row['appointmenttime']; ?></td>
						
						
						<td><?php echo $row['app_reason']; ?></td>
						<td>
						<?php 
						$sts=$row['astatus'];
						
						if( $sts==0){ ?>
						
						
						<p>Pending</p>
						
					<?php	}
					else
					{
						echo "Confirmed";
					}
					?>
						</td>
						
					</tr>
				<?php
				}
				?>
				</tbody>
                </table>    


		</div>
	</div><!-- .animated -->
</div><!-- .content -->


    </div><!-- /#right-panel -->

<?php include('footer.php');
ob_flush();
 ?>

<?php 
		$con = mysqli_connect("localhost","root","","blogs");
		
 ?>

<?php include('../include/header.php');?>
 <div class="row ml-1 mb-2">
 	<a href="catagoryadd.php" class="btn btn-success">Add Catagory</a>
 </div>        	
<div class="row ">
	<div class="col-md-6">
		<table class="table table-bordered table-striped">
			<thead>
				<th>ID</th>
				<th>Catagories</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php 
				if (!$con) {
					die("connection Faild");
				}

				$query = "SELECT * FROM catagories";
				$results = mysqli_query($con,$query);
				while ($row = mysqli_fetch_assoc($results)) { ?>

					<tr>
						<td><?php echo $row['Id']; ?></td>
						<td><?php echo $row['Title']; ?></td>
						<td>
							<button type="button" class="btn btn-success" >Edit</button>
							<button type="button" class="btn btn-danger" >Delete</button>
						</td>
					</tr>
					
				<?php	}


				?>

				
			</tbody>
		</table>
	</div>
</div>

<?php include('../include/footer.php');?>
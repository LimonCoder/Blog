<?php include('../include/header.php');?>
<?php 
	
	$con = mysqli_connect("localhost","root","","blogs");
	$p = isset($_GET['page']) ? $_GET['page'] : 1 ;

 ?>

 <div class="row ml-1 mb-2">
 	<div class="col-md-3 ">
 		<a href="postadd.php" class="btn btn-success">Add Catagory</a>	
 	</div>
 	<div class="col-md-3 offset-md-6">
 		<button type="button" class="btn btn-primary">
 			Total Posts : <span class="badge badge-light">
 			<?php 
 				if ($con) {
 					$query = "SELECT COUNT(*) FROM posts";
 					$results = mysqli_query($con,$query);
 					$row = mysqli_fetch_assoc($results);
 					$totalpost =  $row['COUNT(*)'];
 					echo $totalpost;
 					$page = ceil($totalpost / 5);
 					
 				}
 			 ?>
 			</span>
 		</button>
 	</div>
 </div> 
 <div class="row">
 	<table class="table table-striped table-bordered" cellspacing="20">
 		<thead>
 			<th class="align-middle" >SL No</th>
 			<th class="align-middle">Tittle</th>
 			<th class="align-middle">Catagory</th>
 			<th class="align-middle">Description</th>
 			<th class="align-middle">Images</th>
 		</thead>
 		<tbody>
 			<?php

 				$skip = ($p*5)-5;
 				$take = 5;

 				if ($con) {
 					$quer = "SELECT posts.*, catagories.Title as CatagoryTittle 
							 FROM posts
							 JOIN catagories ON posts.catagoris_id = catagories.Id LIMIT $skip, $take";

					$results = mysqli_query($con,$quer);
					while ($row = mysqli_fetch_assoc($results)) { ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['Tittle']; ?></td>
							<td><?php echo $row['CatagoryTittle']; ?></td>
							<td><?php echo $row['Description']; ?></td>
							<td><img src="<?php echo $row['Images']; ?>" width="100" height="100" ></td>
						</tr>

				<?php	}
 				}


 			 ?>
 			
 			
 		</tbody>
 	</table>
 	
 </div>
 <!-- PaginationBar Add Start -->
  <p>showing page <?php echo $p ?> of  <?php echo $page ?> Pages</p>
 <div class="row justify-content-end">
 		<nav aria-label="Page navigation example">
 			<ul class="pagination">
 				<?php if ($p >1): ?>
 					<li class="page-item"><a class="page-link" href="piganiton.php?page=<?php echo ($p-1);?>">Previous</a></li>
 				<?php endif ?>
 				<?php for ($i=1; $i <=$page ; $i++): ?>
 					<li class="page-item "><a class="page-link" href="piganiton.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 				<?php endfor; ?>
 				<?php if ($p <$page): ?>
 					<li class="page-item"><a class="page-link" href="piganiton.php?page=<?php echo ($p+1);?>">Next</a></li>
 				<?php endif ?>
 			</ul>
 		</nav>
 	</div>
 <!-- PaginationBar Add Finished --> 	




<?php include('../include/footer.php');?>
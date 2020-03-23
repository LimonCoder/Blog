<?php 
	$con  = mysqli_connect("localhost","root","","blogs");
	if (!$con) {
		die("connection faild");
	}

	if (isset($_GET['page'])) {
		$pg = $_GET['page'];
	}

	$totalquery = "SELECT COUNT(id) FROM posts";

	$totalresults = mysqli_query($con,$totalquery);
	$totalrows = mysqli_fetch_assoc($totalresults);
	$totalpost = ceil($totalrows['COUNT(id)'] / 3);


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog with CSE</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


</head>
<body>

	<div class="container">
		<div class="jumbotron">
			<div class="row">
				<div class="col-md-12 bg-success">
					<h1 class="display-1 text-center text-light">Blog with CSE</h1>
				</div>
			</div>
			<div class="row  p-2">
				<?php 
				$start = ($pg - 1) * 3;
				$take = 3; 

				$query = "SELECT posts.*, catagories.Title as tit
							FROM posts
							JOIN catagories 
							ON posts.Catagoris_id = catagories.Id LIMIT $start, $take";

				$results =  mysqli_query($con, $query);
				while ($row = mysqli_fetch_assoc($results)) { ?>
					<div class="col-md-8 offset-md-3 bg-danger mb-3 mt-2">
						<h1 class="text-center p-3"><?php echo $row['Tittle']; ?></h1>
						<img src="admin/posts/<?php echo $row['Images']; ?>" class="float-left  m-2" alt="image" width="120" height="120">
						<p class="lead text-justify"><?php echo substr( $row['Description'],0, 150); ?></p>
						<div class="row p-2 justify-content-end">
							<a href="detailsblog.php?sid=<?php echo $row['id']; ?>" class="btn btn-success">Read more</a>
						</div>
					</div>
			<?php	}
				?>
				
			</div>
			<div class="row justify-content-end">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<?php if ($pg>1) { ?>
						<li class="page-item ">
							<a class="page-link" href="pagination.php?page=<?php echo $pg-1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
						</li>
					<?php	}else{ ?>
						<li class="page-item disabled">
							<a class="page-link" href="pagination.php?page=<?php echo $pg-1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
						</li>

					<?php	} ?>

					<?php for ($i=1; $i <=$totalpost; $i++) { 
						if($pg == $i ) { ?>
							<li class="page-item disabled"><a class="page-link" href="pagination.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
						<?php	}else{ ?>
							<li class="page-item"><a class="page-link" href="pagination.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>

						<?php	}

						
					} ?>

					<?php if ($pg< $totalpost) { ?>
						<li class="page-item">
							<a class="page-link" href="pagination.php?page=<?php echo $pg+1 ?>">Next</a>
						</li>
					<?php	}else{ ?>
						<li class="page-item disabled">
							<a class="page-link" href="pagination.php?page=<?php echo $pg+1 ?>">Next</a>
						</li>

					<?php	} ?>
					
					
					
				</ul>
			</nav>
		</div>
			
		</div>

		

	</div>







<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

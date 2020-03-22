<?php 
	$con  = mysqli_connect("localhost","root","","blogs");
	if (!$con) {
		die("connection faild");
	}

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
				$query = "SELECT posts.*, catagories.Title as tit
							FROM posts
							JOIN catagories 
							ON posts.Catagoris_id = catagories.Id";

				$results =  mysqli_query($con, $query);
				while ($row = mysqli_fetch_assoc($results)) { ?>
					<div class="col-md-8 offset-md-3 bg-danger mb-3 mt-2">
						<h1 class="text-center p-3"><?php echo $row['Tittle']; ?></h1>
						<img src="admin/posts/<?php echo $row['Images']; ?>" class="float-left  m-2" alt="image" width="120" height="120">
						<p class="lead text-justify"><?php echo substr( $row['Description'],0, 150); ?></p>
						<div class="row p-2 justify-content-end">
							<a href="" class="btn btn-success">Read more</a>
						</div>
					</div>
			<?php	}
				?>
				
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
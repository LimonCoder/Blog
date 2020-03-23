<?php 
	require_once('include/db_con.php');

	$id = $_GET['sid'];

	$query = "SELECT posts.*, catagories.Title as tit 
		FROM posts
		JOIN catagories
		ON posts.Catagoris_id = catagories.Id
		WHERE posts.id = $id";

	$results = mysqli_fetch_assoc(mysqli_query($con,$query));

	


	
 ?>



<!DOCTYPE html>
<html>
<head>
	<title><?php echo $results['tit'] ?></title>
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
					<div class="col-md-8 offset-md-3 bg-danger mb-3 mt-2">
						<h1 class="text-center p-3"><?php echo $results['Tittle'] ?></h1>
						<img src="admin/posts/<?php echo $results['Images']; ?>" class="float-left  m-2" alt="image" width="120" height="120">
						<p class="lead text-justify"><?php echo  $results['Description']; ?></p>
					</div>
			
				
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
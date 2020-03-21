<?php 

if (isset($_POST['Save'])) {

	if (!empty($_POST['tittle'])) {
		$utittle = $_POST['tittle'];
	}else{
		$errtittle = "empty";
	}


	if (isset($utittle)) {

		$con = mysqli_connect("localhost","root","","blogs");
		if (!$con) {
			die("connection Faild");
		}

		$query = "INSERT INTO catagories VALUES(null,'$utittle')";

		if (mysqli_query($con,$query)) {
			echo "Successfully";
			header("location: catagory.php");
		}else{
			echo "Inset Faild";
		}
		
	}


	

}

	

 ?>

 <?php include('../include/header.php');?>
 <div class="row ml-1 mb-2">
 	<a href="catagory.php" class="btn btn-success">Back</a>
 </div>        	
 <div class="row ">
 	<div class="col-md-6">
 		<div class="box" style="box-shadow: 1px 2px 2px 2px black; padding:10px; background-color: white;">
 			<form action="" method="POST">
 				<div class="form-group">
 					<label for="catagory">Catagory :</label>
 					<input type="text" class="form-control" placeholder="Enter tittle" id="catagory" name="tittle">
 					<?php if (isset($errtittle)) {
 						echo "<span style='color: red;'>$errtittle</span>";
 					} ?>
 					
 				</div>

 				<div class="row justify-content-end mr-2">
 					<input type="submit" name="Save" value="Save" class="btn btn-success mt-2">
 				</div>
 			</form>
 		</div>
 	</div>
 </div>

<?php include('../include/footer.php');?>
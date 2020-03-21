<?php 
$con = mysqli_connect("localhost","root","","blogs");


if (isset($_POST['Submit'])) {
  // title Cheacking...
  if (!empty($_POST['title'])) {
    $title = $_POST['title'];
  }else{
    $emptytitle = "*";
  }

  // Discription Checking...
  if (!empty($_POST['discription'])) {
    if (strlen($_POST['discription']) <500) {
        $userdiscription = $_POST['discription'];
    }else{
      $overdiscription = "must be less then 300 charecter";
    }
  }else{
    $emptydiscription = "*";
  }

  // Catagories Checking...

  if ($_POST['catagory'] != "select" ) {
     $usercatagory = $_POST['catagory'];
  }else{
    $emptycatagory = "*";
  }

  // Image Checking....
  if(!empty($_FILES['Image']['name'])) {

    $imagename = rand(11111,999999).$_FILES['Image']['name'];
    

    $imageextension = explode(".", $imagename);

    $extension = ["jpg","jpeg","png"];

    if (in_array($imageextension[1], $extension)) {
      $imagedestination = "images/".$imagename;
      $imagetemp = $_FILES['Image']['tmp_name'];
      move_uploaded_file($imagetemp, $imagedestination);



    }else{
      $invalidimage ="Only jpg, jpeg, png file Uploaded";
      

    }    
  }else{
    $emptyimages = "*";
  }


  // Sqli Insert Data.....
  if (!$con) {
    die("connection Faild");
  }

  if (isset($title) && isset($userdiscription) && isset($usercatagory) && isset($imagedestination)) {
   $quer = "INSERT INTO posts VALUES(NULL, '$title', '$userdiscription',$usercatagory, '$imagedestination')";

   if(mysqli_query($con,$quer)) {
     echo "Successfully Data Inserted";
   }else{
    echo "Inserted Faild";
   }
 }

  

}






?>
<?php include('../include/header.php');?>

<div class="row justify-content-center">
	<div class="col-md-6">
		<form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="tittle">Tittle :</label>
        <?php if (isset($emptytitle)) {
          echo "<span style='color: red;'>$emptytitle</span>";
        } ?>
        <input type="text" class="form-control" name="title" id="tittle"  placeholder="Tittle Here">

      </div>
      <div class="form-group">
        <label for="discription">Description :</label>
        <?php if (isset($emptydiscription)) {
          echo "<span style='color: red;'>$emptydiscription</span>";
        }elseif (isset($overdiscription)) {
          echo "<span style='color: red;'>$overdiscription</span>";
        } ?>
        <textarea class="form-control" id="discription" name="discription" rows="7" cols="7" ></textarea>
        
      </div>

      <!-- Catagory added !-->
      <div class="form-group">
       <label for="catagory">Catagory :</label>
       <?php if (isset($emptycatagory)) {
          echo "<span style='color: red;'>$emptycatagory</span>";
        } ?>
       <select name="catagory" class="form-control" for="catagory">
         <?php 
         if (!$con) {
          die("connection Faild");
        }

        $query = "SELECT * FROM catagories";
        $results = mysqli_query($con,$query); ?>
        <option value="select" selected >Select Catagory</option>
        <?php	while ($row = mysqli_fetch_assoc($results)) { ?>

          <option value="<?php echo $row['Id']; ?>" ><?php echo $row['Title']; ?></option>

        <?php	}


        ?>

        ?>


      </select>
      

    </div>
    <div class="form-group">
      <label for="image">Image :</label>
      <?php if (isset($emptyimages)) {
          echo "<span style='color: red;'>$emptyimages</span>";
        }elseif (isset($invalidimage)) {
          echo "<span style='color: red;'>$invalidimage</span>";
        } ?>
      <input type="file"  id="image" name="Image">

    </div>
    <input type="submit" name="Submit" value="Submit" class="btn btn-primary mt-2"  />
     
  </form>
</div>
</div>



<?php include('../include/footer.php');?>
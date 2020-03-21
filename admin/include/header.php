<?php $url = "http://localhost/Projects/Blog/Admin/" ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $url?>css/style.css">

  <title>Blog Admin</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">BLOG WITH CSE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#">HOME <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">CATAGORY</a>
          <a class="nav-item nav-link" href="#">POST</a>
          <a class="nav-item nav-link" href="#">PROFILE</a>
          <a class="nav-item nav-link" href="#">ABOUT</a>

        </div>
      </div>
    </div>
  </nav>

  <div class="main_content">
    
    <div class="container bg">
      <div class="row">
        <div class="col-md-3">
         <ul class="list-group">
          <li class="list-group-item active"><a  href="../index.php">Home</a></li>
          <li class="list-group-item"><a href="<?php echo $url?>Catagory/catagory.php">Catagory</a></li>
          <li class="list-group-item"><a href="<?php echo $url?>posts/index.php">Total Post</a></li>
          <li class="list-group-item"><a href="#">Profile</a></li>
          <li class="list-group-item"><a href="#">About</a></li>
          <li class="list-group-item"><a href="#">About</a></li>
          <li class="list-group-item"><a href="#">About</a></li>
          <li class="list-group-item"><a href="#">About</a></li>
         
          
        </ul>
        </div>
        <div class="col-md-9">
         
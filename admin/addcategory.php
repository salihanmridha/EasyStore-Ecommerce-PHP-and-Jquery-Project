<?php
include "../db.php";
session_start();
if(!isset($_SESSION["uid"]) or ($_SESSION["role"] != 1)){
	header("location: ../index.php");
}
 ?>
 <?php
   if (isset($_POST['addcat_button'])) {
      $catName = $_POST['cat_name'];
      $sql = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '$catName')";

     if(mysqli_query($con, $sql)){
 			echo "<script type='text/javascript'>
        alert('Category Added Successfull');
      </script>";
 		}
   }
 ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Easy Store - Add Category</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<script src="../js/jquery2.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../main.js"></script>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="../index.php" class="navbar-brand">Easy Store</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="../index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="../index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Add Category</div>
					<div class="panel-body">

					<form method="post" action="">
            <div class="row">
							<div class="col-md-12">
								<label for="cat_name">Category name</label>
                <input type="text" id="cat_name" name="cat_name"  class="form-control" required="required" >
							</div>
						</div>


						<p><br/></p>
						<div class="row">
              <div class="col-md-12">
								<input style="width:100%;" value="Add New Category" type="submit" name="addcat_button"class="btn btn-success btn-lg">
							</div>
						</div>

					</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>

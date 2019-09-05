<?php
include "../db.php";
session_start();
if(!isset($_SESSION["uid"]) or ($_SESSION["role"] != 1)){
  header("location: ../index.php");
}

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
  $id = $_GET['id'];
} else {
  header("location: ../index.php");
}



 ?>
 <?php
  $sql = "SELECT * FROM `brands` WHERE brand_id = $id";
    $results = mysqli_query($con, $sql);
    foreach ($results as $result) {
      $brandTitle = $result['brand_title'];
      
    }

 ?>

 <?php
   if (isset($_POST['brand_name'])) {
      $brandName = $_POST['brand_name'];
   

    $sql = "UPDATE `brands` SET `brand_title`= '$brandName' WHERE `brands`.`brand_id` = $id";

     if(mysqli_query($con, $sql)){
 			echo "<script type='text/javascript'>
        alert('Brand Updated Successfull');
        window.location.href = 'editBrand.php?id=$id';
      </script>";
 		}
   }
 ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Easy Store - Edit Brand</title>
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
					<div class="panel-heading">Edit Brand</div>
					<div class="panel-body">

					<form method="post" action="">
            <div class="row">
							<div class="col-md-12">
								<label for="brand_name">Brand name</label>
                <input type="text" id="brand_name" value="<?php echo $brandTitle; ?>" name="brand_name"  class="form-control" required="required" >
							</div>
						</div>


						<p><br/></p>
						<div class="row">
              <div class="col-md-12">
								<input style="width:100%;" value="Update Brand" type="submit" name="edotDrand_button"class="btn btn-success btn-lg">
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

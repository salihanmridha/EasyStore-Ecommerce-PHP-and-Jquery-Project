<?php
include "../db.php";
session_start();
if(!isset($_SESSION["uid"]) or ($_SESSION["role"] != 1)){
	header("location: ../index.php");
}
 ?>
 <?php
   if (isset($_POST['addprod_button'])) {
      $prodName = $_POST['prod_name'];
      $prodPrice = $_POST['prod_price'];
      $prodCat = $_POST['select_category'];
      $prodBrand = $_POST['select_brand'];
      $prodDesc = $_POST['prod_desc'];
      $prodKeyw = $_POST['prod_keyw'];


       $file_name = $_FILES['prod_img']['name'];
       $file_size = $_FILES['prod_img']['size'];
       $file_temp = $_FILES['prod_img']['tmp_name'];

       $uniqueImg = substr(md5(time()), 0, 10);
       $prodImg = $uniqueImg.$file_name;
       $uploaded_image = "../product_images/".$prodImg;

       //$prodImg = $file_name;
       move_uploaded_file($file_temp, $uploaded_image);


     //$sql = "INSERT INTO 'products' ('product_cat', 'product_brand', 'product_title', 'product_price', 'product_desc', 'product_keywords') VALUES('$prodCat', '$prodBrand', '$prodName', '$prodPrice', '$prodDesc', '$prodKeyw')";

     /*$sql = "INSERT INTO `products`
 		(`product_cat`, `product_brand`, `product_title`, `product_price`,
 		`product_desc`, `product_keywords`, `product_image`)
 		VALUES ('$prodCat', '$prodBrand', '$prodName',
 		'$prodPrice', '$prodDesc', '$prodKeyw', 'image')";*/
    $sql = "INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES (NULL, '$prodCat', '$prodBrand', '$prodName', '$prodPrice', '$prodDesc', '$prodImg', '$prodKeyw')";

     if(mysqli_query($con, $sql)){
 			echo "<script type='text/javascript'>
        alert('Product Added Successfull');
      </script>";
 		}
   }
 ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Easy Store - Add Product</title>
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
					<div class="panel-heading">Add Product</div>
					<div class="panel-body">

					<form method="post" action="" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<label for="prod_name">Product Name</label>
								<input type="text" id="prod_name" name="prod_name" class="form-control" required="required">
							</div>
							<div class="col-md-6">
								<label for="prod_price">Product Price</label>
								<input type="number" id="prod_price" name="prod_price"class="form-control" required="required" >
							</div>
						</div>

            <div class="row">
							<div class="col-md-12">
								<label for="prod_desc">Product Description</label>
                <textarea name="prod_desc" rows="4" cols="80" class="form-control" required="required" ></textarea>
							</div>
						</div>

            <div class="row">
							<div class="col-md-12">
								<label for="prod_keyw">Product Keywords</label>
								<input type="text" id="prod_keyw" name="prod_keyw"class="form-control"  required="required" >
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="prod_img">Product Image</label>
								<input type="file" id="prod_img" value="Product Image" name="prod_img"class="form-control" required="required">
							</div>
						</div>

            <div class="row">
							<div class="col-md-12">
								<label for="address1">Product Category</label>
                <select class="form-control" name="select_category">
                  <?php
                    $category_query = "SELECT * FROM categories";
                    $run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
                    if(mysqli_num_rows($run_query) > 0){
                      while($row = mysqli_fetch_array($run_query)){
                        $cid = $row["cat_id"];
                        $cat_name = $row["cat_title"];
                        echo "
                            <option value='$cid'>$cat_name</option>
                        ";
                      }
                    } else {
                      echo "<option>No Category Found!!</option>
                      ";
                    }


                  ?>

                </select>
							</div>
						</div>


            <div class="row">
							<div class="col-md-12">
								<label for="address1">Product Brand</label>
                <select class="form-control" name="select_brand">
                  <?php
                    $brand_query = "SELECT * FROM brands";
                    $run_query = mysqli_query($con,$brand_query);
                    if(mysqli_num_rows($run_query) > 0){
                      while($row = mysqli_fetch_array($run_query)){
                        $bid = $row["brand_id"];
                  			$brand_name = $row["brand_title"];
                        echo "
                            <option value='$bid'>$brand_name</option>";
                      }
                    } else {
                      echo "<option>No Brand Found!!</option>";
                    }
                  ?>

                </select>
							</div>
						</div>

						<p><br/></p>
						<div class="row">
              <div class="col-md-12">
								<input style="width:100%;" value="Add New Product" type="submit" name="addprod_button"class="btn btn-success btn-lg">
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

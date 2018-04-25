<?php
	include_once 'controller/connect.php';

	session_start();
	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	date_default_timezone_set("Asia/Dhaka");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="description" content="Glamour Craze">
    <meta name="keywords" content="Glamour Craze, Glamour, Sylhet">
    <meta name="author" content="OrbsLab">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GlamourCraze | Your Trend Is Our Attitude</title>
    
    <link rel="icon" href="images/glamour.png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src='js/jquery.elevatezoom.js'></script>
</head>
<body>
	<!--=========-TOP_BAR============-->
	<nav class="topBar">
		<div class="container-fluid">
			<ul class="list-inline pull-left hidden-sm hidden-xs">
				<li><i class="fa fa-phone"></i> Call (+880) 1742-924545</li>
			</ul>
			<ul class="topBarNav pull-right">
				<li>
					<a href="#"><i class="fa fa-plane"></i> SubhaniGhat, Sylhet</a>
				</li>
			</ul>
		</div>
	</nav>

	<!--=========-TOP_BAR============-->

	<!--=========MIDDEL-TOP_BAR============-->

	<div class="middleBar m-top-10">
		<div class="container-fluid">
			<div class="row display-table">
				<div class="col-lg-3 col-md-3  col-sm-3 vertical-align hidden-xs">
					<a href="index.php"> <img src="images/glamour.png" alt="logo"></a>
				</div>
				<!-- end col -->
				<div class="col-lg-7 col-md-6 col-sm-6 vertical-align text-center">
					<form action="search.php">
						<div class="row">
							<div class="col-sm-9">
								<div class="input-group">
      								<div class="input-group-prepend">
      									<select class="form-control input-lg" name="category">
											<option value="" selected>All Categories</option>
											<?php
				                                try {
				                                    $op = $conn->prepare("SELECT * FROM category");
				                                    $op->execute();
				                                    while ($op_row = $op->fetch(PDO::FETCH_ASSOC)) {
				                            ?>
												<option value="<?php echo $op_row['cat_name'];?>"><?php echo $op_row['cat_name'];?></option>
											<?php
				                                    }
				                                } catch(PDOException $e) {
				                                  echo "Error: ".$e->getMessage();
				                                }
				                            ?>
										</select>
      								</div>
									<input type="text" name="keyword" class="form-control" required="1" placeholder="Looking For Something?">
								</div>
							</div>
							<!-- end col -->
							<div class="col-sm-3">
								<button type="submit" class="btn btn-default btn-block btn-md">Search</button>
							</div>
							<!-- end col -->
						</div>
					<!-- end row -->
					</form>
				</div>
				<!-- end col -->
				<div class="col-lg-2 col-md-3 col-sm-3 vertical-align header-items hidden-xs">
					<div class="header-item ml-3">
						<a href="cart.php" data-toggle="tooltip" data-placement="top" title="Go To Cart" data-original-title="Wishlist"><i class="fa fa-shopping-cart"></i> <sub><?php echo sizeof($_SESSION['cart']);?></sub> </a>
					</div>
				</div>
				<!-- end col -->
			</div>
			<!-- end  row -->
		</div>
	</div>

	<section class="main-nav">
		<nav class="navbar navbar-expand-md navbar-dark m-top-10">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse">
	                <span><i class="fa fa-th"></i></span>
	            </button>
				<div class="collapse navbar-collapse text-center clear" id="collapse">
					<ul class="navbar-nav p-l-50">
						<li class="nav-item">
							<a href="index.php" class="nav-link">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Categories<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<?php
	                                try {
	                                    $op1 = $conn->prepare("SELECT * FROM category");
	                                    $op1->execute();
	                                    while ($op1_row = $op1->fetch(PDO::FETCH_ASSOC)) {
	                            ?>
									<li class="dropdown-item">
										<a href="products.php?cat=<?php echo $op1_row['cat_name'];?>"><?php echo $op1_row['cat_name'];?></a>
									</li>
								<?php
	                                    }
	                                } catch(PDOException $e) {
	                                  echo "Error: ".$e->getMessage();
	                                }
	                            ?>	
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Services</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Contact us</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</section>
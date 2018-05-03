<?php
    session_start();
    if(isset($_SESSION['admin_name']) == NULL) {
        echo "<script>location.href = 'login.php';</script>";
    }

    include_once 'connect.php';
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
    
    <link rel="icon" href="../images/glamour.png">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src='../js/jquery.elevatezoom.js'></script>
</head>

<body>
    <header>
        <div class="admin-top-nav">
            <nav class="navbar navbar-expand-md navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">Glamour Craze</a>
                    <div class="options">
                        <a><i class="fa fa-photo"></i> Admin</a>
                        <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>
            </nav>
        </div>
        <section class="admin-sm-nav">
            <nav class="navbar navbar-expand-md navbar-dark m-top-10">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse">
                        <span><i class="fa fa-th"></i></span>
                    </button>
                    <div class="collapse navbar-collapse text-center clear" id="collapse">
                        <ul class="navbar-nav p-l-50">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Product List</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Add Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">New Order <span class="badge badge-pill badge-success"><?php echo $count;?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">New Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Category</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
	</header>
    <?php
        try {
            $st = $conn->prepare("SELECT * FROM order_list WHERE status=1");
            $st->execute();
            $count = $st->rowCount();

        } catch(PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
    ?>
    <div class="container-fluid m-top-50">
        <div class="row">
            <div class="col-sm-4 col-md-2 admin-lg-nav">
                <div class="sidenav">
                    <div class="pages">
                        <a href="index.php">Dashboard</a>
                        <a href="products.php">Product List</a>
                        <a href="addproduct.php">Add Product</a>
                        <a href="order.php">New Order <span class="badge badge-pill badge-success"><?php echo $count;?></span></a>
                        <a href="review.php">New Review</a>
                        <a href="category.php">Category</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-10">
                <div class="container-fluid">

    
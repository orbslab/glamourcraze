<?php 
	include_once 'header.php';
?>
	<!--  Slider  -->

	<div class="masthead">
		<div id="suds-carousel" class="carousel fade-carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#suds-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#suds-carousel" data-slide-to="1"></li>
				<li data-target="#suds-carousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<a href="#"><div class="slide-1"><img src="images/slide-1.jpg"></div></a>
				</div>
				<div class="carousel-item">
					<a href="#"><div class="slide-1"><img src="images/slide-2.jpg"></div></a>
				</div>
				<div class="carousel-item">
					<a href="#"><div class="slide-1"><img src="images/slide-3.jpg"></div></a>
				</div>	
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="block-policy2">
					<ul>
						<li class="item-1">
							<div class="item-inner">
								<div class="icon icon1"></div>
								<div class="content">
									<a>Free Delivery</a>
									<p>On Your Home</p>
								</div>
							</div>
						</li>
						<li class="item-2">
							<div class="item-inner">
								<div class="icon icon2"></div>
								<div class="content">
									<a>support 24/7</a>
									<p>Online 24 hours</p>
								</div>
							</div>
						</li>
						<li class="item-3">
							<div class="item-inner">
								<div class="icon icon3"></div>
								<div class="content">
									<a>free return</a>
									<p>365 a day</p>
								</div>
							</div>
						</li>
						<li class="item-4">
							<div class="item-inner">
								<div class="icon icon4"></div>
								<div class="content">
									<a>payment method</a>
									<p>Cash On Delivery</p>
								</div>
							</div>
						</li>
						<li class="item-5">
							<div class="item-inner">
								<div class="icon icon5"></div>
								<div class="content">
									<a>big saving</a>
									<p>weekend sales</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Product -->
	<section class="product">
		<!-- New Arrivel -->
		<div class="container-fluid">
			<div class="modtitle">
				<h3>New Arrivals</h3>
			</div>
			<div class="row best">
				<?php
                    try {
                        $new = $conn->prepare("SELECT * FROM product_list ORDER BY id DESC LIMIT 6"); 
                        $new->execute();

                        if($new->rowCount() > 0) {
                            while ($new_row = $new->fetch(PDO::FETCH_ASSOC)) {
                ?>
				<div class="col-md-2">
					<div class="column">
						<div class="post-module">
							<div class="thumbnail">
								<div class="date">
									<a href="productdetails.php?num=<?php echo $new_row['id'];?>">
										<div class="day"><i class="fa fa-cart-plus" aria-hidden="true"></i></div>
									</a>
								</div>
								<img src="controller/<?php echo $new_row['img']; ?>" class="img-responsive" alt="product">
							</div>
							<div class="post-content">
								<a href="productdetails.php?num=<?php echo $new_row['id'];?>">
									<?php if($new_row['status'] != '' && $new_row['status'] != 'sold out') {?>
										<div class="category">- <?php echo $new_row['status'];?>%</div>
									<?php	} else if($new_row['status'] != '' && $new_row['status'] == 'sold out') {?>
										<div class="category"><?php echo $new_row['status'];?></div>
									<?php } ?>
									<h2 class="sub_title text-center"><?php echo $new_row['name'];?></h2>
									<div class="post-meta text-center"><span class="timestamp">TK : <?php echo $new_row['price'];?></span></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php
                            }
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                ?>
			</div>
		</div>

		<!-- Most Rated -->
		<div class="container-fluid">
			<div class="modtitle">
				<h3>Most Rated</h3>
			</div>
			<div class="row best">
				<?php
                    try {
                        $most = $conn->prepare("SELECT * FROM product_list ORDER BY review DESC LIMIT 6"); 
                        $most->execute();

                        if($most->rowCount() > 0) {
                            while ($most_row = $most->fetch(PDO::FETCH_ASSOC)) {
                ?>
				<div class="col-md-2">
					<div class="column">
						<div class="post-module">
							<div class="thumbnail">
								<div class="date">
									<a href="productdetails.php?num=<?php echo $most_row['id'];?>">
										<div class="day"><i class="fa fa-cart-plus" aria-hidden="true"></i></div>
									</a>
								</div>
								<img src="controller/<?php echo $most_row['img'];?>" class="img-responsive" alt="product">
							</div>
							<div class="post-content">
								<a href="productdetails.php?num=<?php echo $most_row['id'];?>">
									<?php if($most_row['status'] != '' && $most_row['status'] != 'sold out') {?>
										<div class="category">- <?php echo $most_row['status'];?>%</div>
									<?php	} else if($most_row['status'] != '' && $most_row['status'] == 'sold out') {?>
										<div class="category"><?php echo $most_row['status'];?></div>
									<?php } ?>
									<h2 class="sub_title text-center"><?php echo $most_row['name'];?></h2>
									<div class="post-meta text-center"><span class="timestamp">TK : <?php echo $most_row['price'];?></span></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php
                            }
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                ?>
			</div>
			<div class="banner-img">
				<div class="row">
					<div class="container-fluid">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="banners">
								<a href="#"><img src="images/banner.jpg" alt="image" class="img-responsive"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Best Deals -->
		<div class="container-fluid modtitle">
			<h3>Best Deals By Category</h3>
		</div>

		<?php
			try {
	            $cat = $conn->prepare("SELECT cat_name FROM category"); 
	            $cat->execute();

	            if($cat->rowCount() > 0) {
	                while ($cat_row = $cat->fetch(PDO::FETCH_ASSOC)) {
		?>

		<div class="container-fluid">
			<div class="row">
				<div class="modtitle-b col-md-6">
					<a href="products.php?cat=<?php echo $cat_row['cat_name'];?>" class="text-decoration"><h4><?php echo $cat_row['cat_name'];?></h4></a>
				</div>
				<div class="col-md-6">
					<a href="products.php?cat=<?php echo $cat_row['cat_name'];?>" class="text-decoration"><span class="mod-s"><h4>See All</h4></span><a>
				</div>
			</div>
			<div class="row best">
				<?php
					$cat_name = $cat_row['cat_name'];

					try {
			            $p_cat = $conn->prepare("SELECT * FROM product_list WHERE category='$cat_name' ORDER BY id DESC LIMIT 6"); 
			            $p_cat->execute();

			            if($p_cat->rowCount() > 0) {
			                while ($p_cat_row = $p_cat->fetch(PDO::FETCH_ASSOC)) {
				?>
				<div class="col-md-2">
					<div class="column">
						<div class="post-module">
							<div class="thumbnail">
								<div class="date">
									<a href="productdetails.php?num=<?php echo $p_cat_row['id'];?>">
										<div class="day"><i class="fa fa-cart-plus" aria-hidden="true"></i></div>
									</a>
								</div>
								<img src="controller/<?php echo $p_cat_row['img']; ?>" class="img-responsive" alt="product">
							</div>
							<div class="post-content">
								<a href="productdetails.php?num=<?php echo $p_cat_row['id'];?>">
									<?php if($p_cat_row['status'] != '' && $p_cat_row['status'] != 'sold out') {?>
										<div class="category">- <?php echo $p_cat_row['status'];?>%</div>
									<?php	} else if($p_cat_row['status'] != '' && $p_cat_row['status'] == 'sold out') {?>
										<div class="category"><?php echo $p_cat_row['status'];?></div>
									<?php } ?>
									<h2 class="sub_title text-center"><?php echo $p_cat_row['name'];?></h2>
									<div class="post-meta text-center"><span class="timestamp">TK : <?php echo $p_cat_row['price'];?></span></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php
                            }
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                ?>
			</div>
		</div>

		<?php
                    }
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
        <div class="banner-img">
			<div class="row">
				<div class="container-fluid">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="banners">
							<a href="#"><img src="images/banner.jpg" alt="image" class="img-responsive"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
	include_once 'footer.php';
?>